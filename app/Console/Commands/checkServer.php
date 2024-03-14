<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class checkServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check server status using Node.js script';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Log sebelum menjalankan perintah
        Log::info('Cron job akan dijalankan pada ' . now());

        // Ganti path ke file checkServerBackground.js dan ke node.js sesuai lokasi di proyek lo
        $nodePath = 'C:\Program Files\nodejs\node.exe';
        $scriptPath = base_path('public/js/checkServerBackground.js');
        $command = "cd " . base_path('public/js') . " && \"$nodePath\" \"$scriptPath\"";

        // Jalankan perintah
        $output = [];
        $returnVar = 0;
        exec($command, $output, $returnVar);

        // Log hasilnya
        Log::info('Output: ' . implode("\n", $output));
        Log::info('Return Var: ' . $returnVar);

        // Tambah detil
        if ($returnVar === 0) {
            Log::info('Cron job berhasil dijalankan tanpa kesalahan.');
        } else {
            Log::error('Cron job menghasilkan kesalahan. Silakan periksa log untuk informasi lebih lanjut.');
        }

        Log::info('Cron job berhasil dijalankan pada ' . now());
    }
}
