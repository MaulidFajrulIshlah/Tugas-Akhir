<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Spatie\SslCertificate\SslCertificate;
use Illuminate\Support\Facades\File;
use App\Models\DataSpada; // Import model DataSpada
use Illuminate\Support\Facades\Artisan; // Import class Artisan untuk menjalankan command
use Symfony\Component\Console\Output\BufferedOutput;


use App\Console\Commands\CheckSpada; // Import command CheckSpada

use App\Models\LatestStatus; // pastikan sesuai dengan namespace dan lokasi model lo

use App\Mail\SendEmail;
use Carbon\Carbon;
use App\Models\ServerStatus;



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
            return view('dashboard.card.dekanat_tendik');
        } else if (session('id_role') === 4 || session('id_role') === 5) {
            // Bagian ini untuk prodi
            Cache::forever('last_executed_time', now()); // Update waktu terakhir di sini
            return view('dashboard.card.prodi');
        }
    }

    public function CheckStatusServer(Request $request)
    {
        // Ambil input kategori dari request
        $kategori = $request->input('kategori');

        // Jalankan command HitungMataKuliah dengan kategori yang dipilih
        Artisan::call('app:hitung-mata-kuliah', ['--kategori' => $kategori]);

        // Mendapatkan output dari command jika diperlukan
        $output = Artisan::output();

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
        $lastServerStatus = ServerStatus::orderBy('checked_at', 'desc')->first();

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

        // Jalankan command dengan output buffering untuk menangkap hasil
        $outputQuiz = new BufferedOutput;
        Artisan::call('quiz:getdata', [
            'prodi' => $prodi
        ], $outputQuiz);

        // Tangkap hasil dari command
        $result = $outputQuiz->fetch();

        // Extract total quiz count from result
        $totalQuiz = intval(preg_replace('/[^0-9]/', '', $result));

        // Render view dashboard.blade.php sambil kirim data status server, informasi SSL, hasil SPADA, dan isi file.txt
        return view('dashboard/beranda', [
            'lastServerStatus' => $lastServerStatus,
            'daysUntilExpiration' => $daysUntilExpiration,
            'lastLine' => $lastLine, // Tambahkan baris terakhir ke data yang dikirim ke views
            'spadaResult' => $spadaResult, // Kirim hasil SPADA ke views
            'output' => $output, // Kirim output dari perhitungan mata kuliah ke views
            'totalQuiz' => $totalQuiz

        ]);
    }

    
}
