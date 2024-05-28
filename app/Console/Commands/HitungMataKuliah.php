<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class HitungMataKuliah extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hitung-mata-kuliah {--kategori=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hitung jumlah mata kuliah berdasarkan kategori';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ambil nilai kategori dari opsi command
        $kategori = $this->option('kategori') ?? ''; // Defaultnya adalah 130, ganti sesuai kebutuhan jika perlu.

        // Panggil API dengan kategori yang dipilih
        $response = Http::get('https://layar.yarsi.ac.id/webservice/rest/server.php', [
            'wstoken' => '7806baea3070ce31a56406264a241c4a',
            'wsfunction' => 'core_course_get_courses_by_field',
            'moodlewsrestformat' => 'json',
            'field' => 'category',
            'value' => $kategori // Menggunakan nilai kategori yang dipilih
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $courses = $data['courses'] ?? [];

            // Inisialisasi array untuk menyimpan jumlah mata kuliah per categoryid
            $jumlahMataKuliahPerKategori = [];

            // Looping setiap mata kuliah dan menghitung jumlah mata kuliah per categoryid
            foreach ($courses as $course) {
                $categoryid = $course['categoryid'];
                if (!isset($jumlahMataKuliahPerKategori[$categoryid])) {
                    $jumlahMataKuliahPerKategori[$categoryid] = 0;
                }
                $jumlahMataKuliahPerKategori[$categoryid]++;
            }

            // Setelah menampilkan hasil perhitungan
            // Menyimpan hasil perhitungan ke dalam file log
            $logMessage = 'Total mata kuliah untuk setiap kategori:' . PHP_EOL;
            foreach ($jumlahMataKuliahPerKategori as $categoryid => $jumlah) {
                $logMessage .= "$jumlah mata kuliah." . PHP_EOL;
            }
            file_put_contents(storage_path('logs/matakuliah.log'), $logMessage, FILE_APPEND);


            // Menampilkan hasil perhitungan
            foreach ($jumlahMataKuliahPerKategori as $categoryid => $jumlah) {
                $this->info("$jumlah");
            }
        } else {
            $this->error('Gagal mengambil data mata kuliah.');
        }
    }
}
