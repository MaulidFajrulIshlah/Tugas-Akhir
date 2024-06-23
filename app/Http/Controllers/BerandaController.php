<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\SslCertificate\SslCertificate;
use Illuminate\Support\Facades\File;
use App\Models\DataSpada; // Import model DataSpada
use Illuminate\Support\Facades\Artisan; // Import class Artisan untuk menjalankan command
use Symfony\Component\Console\Output\BufferedOutput;
use App\Models\ServerStatus;
use App\Models\DataSpadaBulanan;




class BerandaController extends Controller
{
    public function index()
    {
        if (!session('id_role')) {
            return redirect('forbidden');
        } else if (session('id_role') === 1) {
            // Bagian ini untuk admin
            Cache::forever('last_executed_time', now()); // Update waktu terakhir di sini
            return view('dashboard.card.admin');
        } else if (session('id_role') === 2 || session('id_role') === 3) {
            // Bagian ini untuk dekanat_tendik
            Cache::forever('last_executed_time', now()); // Update waktu terakhir di sini
            return view('dashboard.beranda_dekanat');
        } else if (session('id_role') === 4 || session('id_role') === 5) {
            // Bagian ini untuk prodi
            Cache::forever('last_executed_time', now()); // Update waktu terakhir di sini
            return view('dashboard.card.prodi');
        }
    }

    public function CheckStatusServer(Request $request)
    {
        // Baca isi file.txt
        $filePath = public_path('hasil_cek_server.txt');
        $serverStatusData = File::exists($filePath) ? File::get($filePath) : "File.txt tidak ditemukan";

        // Ambil baris pertama dari isi file.txt
        $lastLine = '';

        if (File::exists($filePath)) {
            // Pisahkan data berdasarkan baris baru
            $lines = explode(PHP_EOL, $serverStatusData);

            // Ambil baris pertama (data terbaru)
            $lastLine = reset($lines);
        }

        // Ambil data status server terakhir dari DB PANDAY
        $lastServerStatus = ServerStatus::orderBy('checked_at', 'desc')->first(['location', 'status']);

        // Ambil informasi SSL certificate
        $url = 'https://layar.yarsi.ac.id/';
        $certificate = SslCertificate::createForHostName($url);
        $expirationDate = $certificate->expirationDate();
        $now = now();
        $daysUntilExpiration = $now->diffInDays($expirationDate);

        // Jalankan command CheckSpada
        Artisan::call('app:check-spada');

        // Ambil data dari SPADA
        $spadaResult = DataSpada::where('universitas', 'Universitas YARSI')->first();

        $prodi = $request->input('prodi');

        // Ambil input tahun ajaran dan prodi dari request
        $tahunAjaran = $request->input('tahunajaran');

        // Tentukan categoryid berdasarkan kombinasi tahun ajaran dan prodi
        $categoryid = null;

        if ($tahunAjaran == '2023/2024-Ganjil') {
            if ($prodi == 'Teknik Informatika') {
                $categoryid = 578; // Contoh categoryid untuk TI 2023/2024 Ganjil
            } elseif ($prodi == 'Perpustakaan dan Sains Informasi') {
                $categoryid = 582; // Contoh categoryid untuk Perpus 2023/2024 Ganjil
            } elseif ($prodi == 'Psikolog') {
                $categoryid = 580; // Contoh categoryid untuk Manajemen 2023/2024 Ganjil
            } elseif ($prodi == 'Akuntasi') {
                $categoryid = 605; // Contoh categoryid untuk Manajemen 2023/2024 Ganjil
            } elseif ($prodi == 'Manajemen') {
                $categoryid = 602 + 601; // Contoh categoryid untuk Manajemen 2023/2024 Ganjil
            }
        } elseif ($tahunAjaran == '2023/2024-Genap') {
            if ($prodi == 'Teknik Informatika') {
                $categoryid = 670; // Contoh categoryid untuk TI 2023/2024 Genap
            } elseif ($prodi == 'Perpustakaan dan Sains Informasi') {
                $categoryid = 676; // Contoh categoryid untuk Perpus 2023/2024 Genap
            } elseif ($prodi == 'Psikolog') {
                $categoryid = 652; // Contoh categoryid untuk Manajemen 2023/2024 Genap
            }
        }

        // Jalankan command HitungMataKuliah dengan kategori yang dipilih
        Artisan::call('app:hitung-mata-kuliah', ['--kategori' => $categoryid]);

        // Mendapatkan output dari command jika diperlukan
        $output = Artisan::output();

        // Baca file log yang berisi data pengguna yang di-suspend
        $logPath = storage_path('logs/suspended_users.log');
        $logData = file_get_contents($logPath);

        // Pisahkan baris-baris data dalam file log
        $logRows = explode(PHP_EOL, $logData);

        // Proses parsing data dan siapkan untuk ditampilkan dalam tabel
        $suspendedUsers = [];
        foreach ($logRows as $logRow) {
            // Pisahkan data berdasarkan koma dan spasi
            $userData = explode(', ', $logRow);

            // Pastikan data yang dibaca memiliki format yang sesuai
            if (count($userData) == 2) {
                // Pisahkan data username dan nama lengkap
                $username = explode(': ', $userData[0])[1];
                $fullname = explode(': ', $userData[1])[1];

                $suspendedUsers[] = [
                    'username' => trim($username),
                    'fullname' => trim($fullname),
                ];
            }
        }

        $tahunAjaran = $request->input('tahunajaran');
        $prodi = $request->input('prodi');

        // Jalanin command dengan argument dari form
        Artisan::call('cek:administrasi', [
            'tahunAjaran' => $tahunAjaran,
            'prodi' => $prodi,
        ]);

        // Ambil hasil dari cache atau proses selanjutnya
        $totalCourses = Cache::get('totalCourses');
        $courseNames = Cache::get('courseNames'); // Ambil nama mata kuliah dari cache


        Artisan::call('cek:kategori-monitoring', [
            'tahunAjaran' => $tahunAjaran,
            'prodi' => $prodi,
        ]);

        $totalTugasAutoGrading = Cache::get('totalTugasAutoGrading', 0);
        $totalTugasManualGrading = Cache::get('totalTugasManualGrading', 0);
        $totalKuisAutoGrading = Cache::get('totalKuisAutoGrading', 0);
        $totalLatihanManual = Cache::get('totalLatihanManual', 0);
        $totalLatihanAutoGrading = Cache::get('totalLatihanAutoGrading', 0);
        $totalPraktikumAutoGrading = Cache::get('totalPraktikumAutoGrading', 0);
        $totalPraktikumManualGrading = Cache::get('totalPraktikumManualGrading', 0);
        $totalUjianAutoGrading = Cache::get('totalUjianAutoGrading', 0);
        $totalUjianManualGrading = Cache::get('totalUjianManualGrading', 0);
        $totalVisiMisi = Cache::get('totalVisiMisi', 0);
        $totalKontrakKuliah = Cache::get('totalKontrakKuliah', 0);
        $totalRPS = Cache::get('totalRPS', 0);
        $totalRefleksi = Cache::get('totalRefleksi', 0);
        $totalLogKerja = Cache::get('totalLogKerja', 0); // Tambahkan ini untuk Log Kerja
        $totalVideoPembelajaran = Cache::get('totalVideoPembelajaran', 0); // Tambahkan ini untuk Video Pembelajaran
        $totalKegiatanBelajarEksternal = Cache::get('totalKegiatanBelajarEksternal', 0);

        $tahunAjaran = $request->input('tahunajaran');
        $prodi = $request->input('prodi');

        // Jalankan perintah dengan argumen dari formulir
        Artisan::call('app:cek-mata-kuliah-lengkap', [
            'tahunAjaran' => $tahunAjaran,
            'prodi' => $prodi,
        ]);

        // Ambil hasil dari cache atau proses selanjutnya
        $totalCoursesWithAllCriteria = Cache::get('totalCoursesWithAllCriteria');

        // Ambil semua data rangkuman
        $latestSummary = DataSpadaBulanan::latest('created_at')->first();

        // Ambil hasil dari cache atau proses selanjutnya
        $totalCourseSCL = Cache::get('totalCourses');
        $courseNamesSCL = Cache::get('courseNames'); // Ambil nama mata kuliah dari cache
        $totalCoursesWithAllCriteriaSCL = Cache::get('totalCoursesWithAllCriteria');
        $sclCourses = Cache::get('sclCourses'); // Ambil jumlah course yang memenuhi kriteria SCL




        // Render view dashboard.blade.php sambil kirim data status server, informasi SSL, hasil SPADA, dan isi file.txt
        return view('dashboard/beranda', [
            'lastServerStatus' => $lastServerStatus,
            'daysUntilExpiration' => $daysUntilExpiration,
            'lastLine' => $lastLine, //server setatus
            'spadaResult' => $spadaResult, // Kirim hasil SPADA ke views
            'output' => $output, // Kirim output dari perhitungan mata kuliah ke views
            'suspendedUsers' => $suspendedUsers, // Tambahkan data pengguna yang di-suspend ke array yang dikirimkan ke views
            'totalCourses' => $totalCourses, //matkul administrasi
            'courseNames' => $courseNames, // Kirim nama mata kuliah ke views
            'totalCoursesWithAllCriteria' => $totalCoursesWithAllCriteria, //matakuliah lengkap
            'latestSummary' => $latestSummary, //rekap spada
            'totalCoursesWithAllCriteriaSCL' => $totalCoursesWithAllCriteriaSCL, //matakuliah scl
            'totalTugasAutoGrading' => $totalTugasAutoGrading,
            'totalTugasManualGrading' => $totalTugasManualGrading,
            'totalKuisAutoGrading' => $totalKuisAutoGrading,
            'totalLatihanManual' => $totalLatihanManual,
            'totalLatihanAutoGrading' => $totalLatihanAutoGrading,
            'totalPraktikumAutoGrading' => $totalPraktikumAutoGrading,
            'totalPraktikumManualGrading' => $totalPraktikumManualGrading,
            'totalUjianAutoGrading' => $totalUjianAutoGrading,
            'totalUjianManualGrading' => $totalUjianManualGrading,
            'totalVisiMisi' => $totalVisiMisi,
            'totalKontrakKuliah' => $totalKontrakKuliah,
            'totalRPS' => $totalRPS,
            'totalRefleksi' => $totalRefleksi,
            'totalLogKerja' => $totalLogKerja,
            'totalVideoPembelajaran' => $totalVideoPembelajaran,
            'totalKegiatanBelajarEksternal' => $totalKegiatanBelajarEksternal,
        ]);
    }

    public function DekanatTi(Request $request)
    {
        

        $prodi = $request->input('prodi');

        // Ambil input tahun ajaran dan prodi dari request
        $tahunAjaran = $request->input('tahunajaran');

        // Tentukan categoryid berdasarkan kombinasi tahun ajaran dan prodi
        $categoryid = null;

        if ($tahunAjaran == '2023/2024-Ganjil') {
            if ($prodi == 'Teknik Informatika') {
                $categoryid = 578; // Contoh categoryid untuk TI 2023/2024 Ganjil
            } elseif ($prodi == 'Perpustakaan dan Sains Informasi') {
                $categoryid = 582; // Contoh categoryid untuk Perpus 2023/2024 Ganjil
            } elseif ($prodi == 'Psikolog') {
                $categoryid = 580; // Contoh categoryid untuk Manajemen 2023/2024 Ganjil
            } elseif ($prodi == 'Akuntasi') {
                $categoryid = 605; // Contoh categoryid untuk Manajemen 2023/2024 Ganjil
            } elseif ($prodi == 'Manajemen') {
                $categoryid = 602 + 601; // Contoh categoryid untuk Manajemen 2023/2024 Ganjil
            }
        } elseif ($tahunAjaran == '2023/2024-Genap') {
            if ($prodi == 'Teknik Informatika') {
                $categoryid = 670; // Contoh categoryid untuk TI 2023/2024 Genap
            } elseif ($prodi == 'Perpustakaan dan Sains Informasi') {
                $categoryid = 676; // Contoh categoryid untuk Perpus 2023/2024 Genap
            } elseif ($prodi == 'Psikolog') {
                $categoryid = 652; // Contoh categoryid untuk Manajemen 2023/2024 Genap
            }
        }

        // Jalankan command HitungMataKuliah dengan kategori yang dipilih
        Artisan::call('app:hitung-mata-kuliah', ['--kategori' => $categoryid]);

        // Mendapatkan output dari command jika diperlukan
        $output = Artisan::output();

        $tahunAjaran = $request->input('tahunajaran');
        $prodi = $request->input('prodi');

        // Jalanin command dengan argument dari form
        Artisan::call('cek:administrasi', [
            'tahunAjaran' => $tahunAjaran,
            'prodi' => $prodi,
        ]);

        // Ambil hasil dari cache atau proses selanjutnya
        $totalCourses = Cache::get('totalCourses');
        $courseNames = Cache::get('courseNames'); // Ambil nama mata kuliah dari cache


        Artisan::call('cek:kategori-monitoring', [
            'tahunAjaran' => $tahunAjaran,
            'prodi' => $prodi,
        ]);

        $totalTugasAutoGrading = Cache::get('totalTugasAutoGrading', 0);
        $totalTugasManualGrading = Cache::get('totalTugasManualGrading', 0);
        $totalKuisAutoGrading = Cache::get('totalKuisAutoGrading', 0);
        $totalLatihanManual = Cache::get('totalLatihanManual', 0);
        $totalLatihanAutoGrading = Cache::get('totalLatihanAutoGrading', 0);
        $totalPraktikumAutoGrading = Cache::get('totalPraktikumAutoGrading', 0);
        $totalPraktikumManualGrading = Cache::get('totalPraktikumManualGrading', 0);
        $totalUjianAutoGrading = Cache::get('totalUjianAutoGrading', 0);
        $totalUjianManualGrading = Cache::get('totalUjianManualGrading', 0);
        $totalVisiMisi = Cache::get('totalVisiMisi', 0);
        $totalKontrakKuliah = Cache::get('totalKontrakKuliah', 0);
        $totalRPS = Cache::get('totalRPS', 0);
        $totalRefleksi = Cache::get('totalRefleksi', 0);
        $totalLogKerja = Cache::get('totalLogKerja', 0); // Tambahkan ini untuk Log Kerja
        $totalVideoPembelajaran = Cache::get('totalVideoPembelajaran', 0); // Tambahkan ini untuk Video Pembelajaran
        $totalKegiatanBelajarEksternal = Cache::get('totalKegiatanBelajarEksternal', 0);

        $tahunAjaran = $request->input('tahunajaran');
        $prodi = $request->input('prodi');

        // Jalankan perintah dengan argumen dari formulir
        Artisan::call('app:cek-mata-kuliah-lengkap', [
            'tahunAjaran' => $tahunAjaran,
            'prodi' => $prodi,
        ]);

        // Ambil hasil dari cache atau proses selanjutnya
        $totalCoursesWithAllCriteria = Cache::get('totalCoursesWithAllCriteria');

        // Ambil semua data rangkuman
        $latestSummary = DataSpadaBulanan::latest('created_at')->first();

        // Ambil hasil dari cache atau proses selanjutnya
        $totalCourseSCL = Cache::get('totalCourses');
        $courseNamesSCL = Cache::get('courseNames'); // Ambil nama mata kuliah dari cache
        $totalCoursesWithAllCriteriaSCL = Cache::get('totalCoursesWithAllCriteria');
        $sclCourses = Cache::get('sclCourses'); // Ambil jumlah course yang memenuhi kriteria SCL




        // Render view dashboard.blade.php sambil kirim data status server, informasi SSL, hasil SPADA, dan isi file.txt
        return view('dashboard/role/berandaTi', [
            'output' => $output, // Kirim output dari perhitungan mata kuliah ke views
            'totalCourses' => $totalCourses, //matkul administrasi
            'courseNames' => $courseNames, // Kirim nama mata kuliah ke views
            'totalCoursesWithAllCriteria' => $totalCoursesWithAllCriteria, //matakuliah lengkap
            'latestSummary' => $latestSummary, //rekap spada
            'totalCoursesWithAllCriteriaSCL' => $totalCoursesWithAllCriteriaSCL, //matakuliah scl
            'totalTugasAutoGrading' => $totalTugasAutoGrading,
            'totalTugasManualGrading' => $totalTugasManualGrading,
            'totalKuisAutoGrading' => $totalKuisAutoGrading,
            'totalLatihanManual' => $totalLatihanManual,
            'totalLatihanAutoGrading' => $totalLatihanAutoGrading,
            'totalPraktikumAutoGrading' => $totalPraktikumAutoGrading,
            'totalPraktikumManualGrading' => $totalPraktikumManualGrading,
            'totalUjianAutoGrading' => $totalUjianAutoGrading,
            'totalUjianManualGrading' => $totalUjianManualGrading,
            'totalVisiMisi' => $totalVisiMisi,
            'totalKontrakKuliah' => $totalKontrakKuliah,
            'totalRPS' => $totalRPS,
            'totalRefleksi' => $totalRefleksi,
            'totalLogKerja' => $totalLogKerja,
            'totalVideoPembelajaran' => $totalVideoPembelajaran,
            'totalKegiatanBelajarEksternal' => $totalKegiatanBelajarEksternal,
        ]);
    }
}
