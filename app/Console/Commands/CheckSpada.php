<?php

namespace App\Console\Commands;
ini_set('max_execution_time', 0);

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\DataSpada;
use App\Models\DataSpadaBulanan;
use Carbon\Carbon;

class CheckSpada extends Command
{
    protected $signature = 'app:check-spada';
    protected $description = 'Check SPADA data and summarize every 10 minutes for testing';

    public function handle()
    {
        $url = 'https://spada.kemdikbud.go.id/course/lldikti/lldikti-iii';
        $response = Http::get($url);
        $content = $response->body();
        $universitas = 'Universitas YARSI'; // Ganti dengan nama universitas yang sesuai

        $status = (strpos($content, $universitas) !== false) ? 'Ditemukan' : 'Tidak Ditemukan';

        // Buat entri bahkan jika data tidak ditemukan
        DataSpada::create([
            'universitas' => $universitas,
            'status' => $status,
            'created_at' => now()
        ]);


        $this->info('Data from SPADA has been checked and saved.');

        // Cek apakah perlu bikin rangkuman
        $lastSummary = DataSpadaBulanan::latest('created_at')->first();
        $now = Carbon::now();

        if (!$lastSummary || $now->diffInMinutes($lastSummary->created_at) >= 10) {
            $startTime = $now->copy()->subMinutes(10);

            $dataSpada = DataSpada::whereBetween('created_at', [$startTime, $now])->get();

            $hariDitemukan = $dataSpada->where('status', 'Ditemukan')->count();
            $hariTidakDitemukan = $dataSpada->where('status', 'Tidak Ditemukan')->count();

            DataSpadaBulanan::create([
                'bulan' => $now->format('F'),
                'tahun' => $now->year,
                'hari_ditemukan' => $hariDitemukan,
                'hari_tidak_ditemukan' => $hariTidakDitemukan,
                'created_at' => $now
            ]);

            $this->info('SPADA data has been summarized for the last 10 minutes.');
        }
    }
}
