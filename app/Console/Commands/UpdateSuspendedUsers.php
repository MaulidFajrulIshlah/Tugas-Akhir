<?php

namespace App\Console\Commands;
ini_set('max_execution_time', 0);

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateSuspendedUsers extends Command
{
    protected $signature = 'update:suspended-users';
    protected $description = 'Update suspended users dari API eksternal dan simpan ke file log';

    public function handle()
    {
        $tokenApi = '7806baea3070ce31a56406264a241c4a'; // Ganti dengan token API lo
        $totalUsers = 10382; // Jumlah total user yang ingin dicek
        $usersToLog = [];

        for ($i = 1; $i <= $totalUsers; $i++) {
            $response = Http::get('https://layar.yarsi.ac.id/webservice/rest/server.php', [
                'wstoken' => $tokenApi,
                'wsfunction' => 'core_user_get_users_by_field',
                'moodlewsrestformat' => 'json',
                'field' => 'id',
                'values[0]' => $i,
            ]);

            if ($response->successful()) {
                $userData = $response->json();

                // Pastikan $userData adalah array dan tidak kosong
                if (is_array($userData) && !empty($userData) && isset($userData[0])) {
                    $user = $userData[0]; // Ambil data user pertama (harusnya hanya ada satu user dengan id tertentu)

                    // Cek apakah user di-suspend atau tidak
                    if (isset($user['suspended']) && $user['suspended'] == 1) {
                        $usersToLog[] = [
                            'username' => $user['username'],
                            'fullname' => $user['fullname'],
                        ];
                    }
                }
            } else {
                Log::error('Gagal mengambil data untuk user ID: ' . $i);
            }
        }

        // Jika ada user yang di-suspend, simpan informasi mereka ke dalam file log
        if (!empty($usersToLog)) {
            $logMessage = 'Daftar pengguna yang disuspend:' . PHP_EOL;
            foreach ($usersToLog as $user) {
                $logMessage .= "Username: {$user['username']}, Nama Lengkap: {$user['fullname']}" . PHP_EOL;
            }

            file_put_contents(storage_path('logs/suspended_users.log'), $logMessage);

            $this->info('Pengguna yang disuspend berhasil diperbarui dan disimpan dalam file log!');
        } else {
            $this->info('Tidak ada pengguna yang disuspend.');
        }
    }
}
