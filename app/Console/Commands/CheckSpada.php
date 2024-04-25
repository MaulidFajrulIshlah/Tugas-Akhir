<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\DataSpada;

class CheckSpada extends Command
{
    protected $signature = 'app:check-spada';
    protected $description = 'Check SPADA data ';

    public function handle()
    {
        // URL halaman SPADA yang akan di-scraper
        $url = 'https://spada.kemdikbud.go.id/course/lldikti/lldikti-iii';

        // Request halaman SPADA
        $response = Http::get($url);
        $content = $response->body();

        // Cek apakah halaman berisi informasi tentang "Universitas Muhammadiyah Jakarta"
        if (strpos($content, 'Institut gak ada') !== false) {
            // Jika ditemukan, simpan status "Ditemukan" ke dalam database
            DataSpada::create(['universitas' => 'Institut gak ada', 'status' => 'Ditemukan']);
            $this->info('Data from SPADA has been migrated successfully.');
        } else {
            // Jika tidak ditemukan, simpan status "Tidak Ditemukan" ke dalam database
            DataSpada::create(['universitas' => 'Institut gak ada', 'status' => 'Tidak Ditemukan']);
            $this->info('Data from SPADA does not contain information about "Institut gak ada".');
        }
    }
}
