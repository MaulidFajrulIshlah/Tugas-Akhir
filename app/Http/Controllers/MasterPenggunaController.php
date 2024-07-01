<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Mail\WelcomeEmail;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\Facades\DataTables;

class MasterPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // mengirim informasi halaman aktif ke tampilan
        $activePage = 'masterUser';

        if ($request->ajax()) {
            // mendapatkan data User
            // ambil data pengguna dengan role "Tim DPJJ" dan urutkan hasilnya
            $adminUsers = User::with('role')->whereHas('role', function ($query) {
                $query->where('nama', 'Tim DPJJ');
            })
                ->orderByDesc('created_at')
                ->get();

            // ambil data pengguna dengan role lain dan urutkan hasilnya
            $otherUsers = User::with('role')->whereDoesntHave('role', function ($query) {
                $query->where('nama', 'Tim DPJJ');
            })
                ->orderByDesc('created_at')
                ->get();

            // gabungkan hasil query
            $userData = $adminUsers->merge($otherUsers);

            return DataTables::of($userData)
                ->addColumn('action', function ($users) {
                    return '
                        <a class="btn btn-primary btn-edit me-1" href="' . route('updateUser', $users->id) . '">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a class="btn btn-danger btn-delete" href="' . route('deleteUser', $users->id) . '" onclick="return confirmDelete()" >
                            <i class="fa fa-trash"></i>
                        </a>  
                        ';
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.admin.masterPengguna.index', compact('activePage'));
    }

    public function showCreateUserForm()
    {
        // Logika untuk halaman pembuatan pengguna
        return view('dashboard.admin.masterPengguna.create-user'); // Gantilah 'nama_view_yang_diinginkan' dengan nama view yang sesuai
    }

    public function create()
    {
        // Logika untuk halaman pembuatan pengguna
        return view('dashboard.admin.masterPengguna.create-user'); // Gantilah 'nama_view_yang_diinginkan' dengan nama view yang sesuai
    }

    public function createUser(Request $request)
    {
        // Validasi input file Excel
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Ambil data dari file Excel
        $file = $request->file('file');
        $usersArray = Excel::toArray(new UsersImport, $file);

        // Ambil sheet pertama
        $users = $usersArray[0];

        // Proses untuk setiap baris di Excel
        foreach ($users as $index => $user) {
            // Skip baris header
            if ($index === 0) {
                continue;
            }

            $firstName = $user[0];
            $lastName = $user[1];

            // Menggabungkan firstName dan lastName untuk username
            $username = strtolower($firstName . '.' . $lastName);

            // Mengolah data nama untuk email
            $email = strtolower($username . '@yarsi.ac.id');

            // Generate random password
            $password = $this->generateRandomPassword();

            // Kirim data ke API Moodle dan ambil password yang dibuat
            $result = $this->sendToMoodle($firstName, $lastName, $email, $password, $username);

            // Jika berhasil dikirim ke Moodle, simpan ke log
            if ($result['success']) {
                Log::info('User berhasil dibuat di Moodle. Nama: ' . $firstName . ' ' . $lastName . ', Username: ' . $username . ', Email: ' . $email . ', Password: ' . $password);
            } else {
                Log::error('Gagal membuat user di Moodle. Nama: ' . $firstName . ' ' . $lastName . ', Email: ' . $email . '. Error: ' . $result['message']);
            }
        }

        // Redirect kembali ke halaman form dengan pesan sukses
        return redirect()->route('create.user.form')->with('success', 'Users berhasil dibuat!');
    }

    private function generateRandomPassword($length = 10)
    {
        // Karakter yang dibutuhkan untuk password
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';
        $specialChars = '*-#';

        // Menambah satu karakter dari masing-masing jenis yang dibutuhkan
        $password = $lowercase[rand(0, strlen($lowercase) - 1)] .
            $uppercase[rand(0, strlen($uppercase) - 1)] .
            $digits[rand(0, strlen($digits) - 1)] .
            $specialChars[rand(0, strlen($specialChars) - 1)];

        // Menggabungkan semua karakter untuk bagian sisa dari password
        $allChars = $lowercase . $uppercase . $digits . $specialChars;

        // Menambah karakter acak hingga mencapai panjang yang diinginkan
        for ($i = 4; $i < $length; $i++) {
            $password .= $allChars[rand(0, strlen($allChars) - 1)];
        }

        // Acak urutan password untuk memastikan tidak selalu dimulai dengan pola tertentu
        return str_shuffle($password);
    }

    private function sendToMoodle($firstName, $lastName, $email, $password, $username)
    {
        // Kirim data ke API Moodle
        $client = new Client();
        $url = 'https://layarstaging.yarsi.ac.id/webservice/rest/server.php';
        $params = [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'wstoken' => '9aea4a048e6570c9710249506bc76305',
                'wsfunction' => 'core_user_create_users',
                'moodlewsrestformat' => 'json',
                'users[0][username]' => $username,
                'users[0][auth]' => 'manual',
                'users[0][password]' => $password,
                'users[0][firstname]' => $firstName,
                'users[0][lastname]' => $lastName,
                'users[0][email]' => $email,
                'users[0][maildisplay]' => 1,
                'users[0][lang]' => 'en',
                'users[0][calendartype]' => 'gregorian',
                'users[0][mailformat]' => 1,
            ],
        ];

        try {
            Log::info('Mengirim permintaan ke Moodle API: ' . json_encode($params));
            $response = $client->post($url, $params);
            $data = json_decode($response->getBody(), true);
            Log::info('Respon dari Moodle API: ' . json_encode($data));

            // Handle response from Moodle
            if (!empty($data['errorcode'])) {
                // Jika ada kesalahan dari Moodle
                return ['success' => false, 'message' => $data['message']];
            }

            // Jika berhasil, kembalikan array dengan status sukses
            return ['success' => true];
        } catch (\Exception $e) {
            Log::error('Kesalahan saat mengirim permintaan ke Moodle API: ' . $e->getMessage());
            // Handle exception if API request fails
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mendapatkan data User
        $userData = User::with('role')->findOrFail($id);

        // mendapatkan data Role
        $role = Role::all();

        // mendapatkan data Fakultas
        $fakultas = Fakultas::all();

        // mendapatkan data Prodi
        $prodi = Prodi::all();

        // mengirim informasi halaman aktif ke tampilan
        $activePage = 'masterUser';

        return view('dashboard.admin.masterPengguna.edit', compact('userData', 'role', 'fakultas', 'prodi', 'activePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // tes data berhasil ditambahkan atau tidak
        try {
            // mendapatkan data user
            $user = User::findOrFail($request->id);

            // cek apakah user yang login memiliki id_role = 1 dan mencoba mengubah id_role
            if (Auth::id() === $user->id && $user->id_role === 1) {
                throw new \Exception("Anda tidak diizinkan mengubah peran Anda sendiri!");
            }

            // request dan validasi data
            $validasiData = $request->validate([
                'id_role' => 'required',
            ]);

            // cek apakah id_role diubah menjadi '1'
            if ($validasiData['id_role'] === '1') {
                // Set id_fakultas dan id_prodi menjadi null
                $user->id_fakultas = null;
                $user->id_prodi = null;
            } else if ($validasiData['id_role'] === '2' || $validasiData['id_role'] === '3') {
                $request->validate([
                    'id_fakultas' => 'required',
                ]);
                $user->id_fakultas = $request->id_fakultas;
                $user->id_prodi = null;
            } else {
                // validasi dan set id_fakultas dan id_prodi jika id_role bukan '1'
                $request->validate([
                    'id_fakultas' => 'required',
                    'id_prodi' => [
                        'required',
                        // tambahkan aturan validasi untuk memastikan id_prodi yang dipilih sesuai dengan id_fakultas
                        Rule::exists('prodis', 'id')->where(function ($query) use ($request) {
                            return $query->where('id_fakultas', $request->id_fakultas);
                        }),
                    ],
                ]);
                $user->id_fakultas = $request->id_fakultas;
                $user->id_prodi = $request->id_prodi;
            }

            $user->update($validasiData);


            session(['username' => $request->username]);

            // Kirim email ke alamat email pengguna yang login
            Mail::to($user->email)->send(new WelcomeEmail($user));

            return redirect('/masterdata/pengguna/edit/' . $request->id)->with('success', 'Data Pengguna Berhasil Disimpan');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect('/masterdata/pengguna/edit/' . $request->id)->with('failed', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // menghapus data pengguna
        $item = User::findorFail($id);

        $item->delete();

        return redirect('/masterdata/pengguna')->with('success', 'Data Pengguna telah dihapus');
    }
}
