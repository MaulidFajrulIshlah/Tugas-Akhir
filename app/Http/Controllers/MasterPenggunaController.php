<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Mail\WelcomeEmail;

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
