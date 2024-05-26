<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CheckSpada; // Pastikan untuk mengimpor command CheckSpada

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('app:check-server')->everyMinute();
        // $schedule->command('app:check-server-status')->everyMinute();
        // $schedule->exec('php C:\CODINGAN\TugasAkhir\Tugas-Akhir\public\spada-yarsi.php')
        //     ->everyMinute()
        //     ->appendOutputTo(storage_path('logs/laravel.log'));
        // $schedule->command('app:check-spada')->everyMinute();
        // $schedule->command('app:hitung-mata-kuliah')->everyMinute();
        $schedule->command('quiz:getdata')->everyMinute();



    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
