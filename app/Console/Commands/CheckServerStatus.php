<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Log;

class CheckServerStatus extends Command
{
    protected $signature = 'app:check-server-status';

    protected $description = 'Check server status';

    public function handle()
    {
        usleep(1000000); // usleep dalam mikrodetik, setara dengan 1 detik

        $url = "https://ipinfo.io/json?token=11f826489233db";
        $response = file_get_contents($url);

        if (!$response) {
            $this->error("Failed to fetch IP address data");
            return;
        }

        $data = json_decode($response, true);

        $ipAddress = $data['ip'];

        $location = ($ipAddress === "103.78.212.10") ? "dalam" : "luar";
        $this->checkServerStatus($location);
    }

    // Di dalam method checkServerStatus()
    private function checkServerStatus($location)
    {
        $apiUrl = "https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=76debee2b62a3d38a48963f60b5c76ee&wsfunction=core_course_get_categories&moodlewsrestformat=json";

        try {
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            Log::info("HTTP Status: $httpStatus"); // Tambahkan log ini

            // Memasukkan hasil cek server ke database
            $this->saveToDatabase($location, $httpStatus);
            // Memasukkan hasil cek server ke txt
            $this->simpanHasilCekServerKeFile($httpStatus === 200 ? "Online" : "Offline", $location,);


            if ($httpStatus === 200) {
                $this->showPopup("online", "Server lancar banget!", $location);
            } else {
                $this->showPopup("offline", "Server lagi down nih. HTTP Status: $httpStatus", $location);
            }
            $this->setLastCheckedTime();
        } catch (Exception $exception) {
            Log::error("Error during fetch request: " . $exception->getMessage());
            $this->error($exception->getMessage());
            $this->showPopup("error", "Ada kesalahan saat cek status server.", $location);
            $this->setLastCheckedTime();
        }
    }

    // Method untuk menyimpan hasil cek server ke database
    private function saveToDatabase($location, $httpStatus)
    {
        // Ganti nama model dan kolom sesuai dengan struktur tabel yang sudah dibuat
        \App\Models\ServerStatus::create([
            'ip_address' => request()->ip(),
            'location' => $location,
            'status' => ($httpStatus === 200) ? 'online' : 'offline',
            'http_status' => $httpStatus,
            'checked_at' => now(),
        ]);
    }

    // Method untuk menyimpan hasil cek server ke txt
private function simpanHasilCekServerKeFile($status, $location)
{
    // Menyimpan hasil cek server ke dalam file.txt di dalam direktori public
    $filePath = public_path('hasil_cek_server.txt');
    $waktu = now()->format('Y-m-d H:i:s');
    $info = "Time: $waktu | Status: $status | Location: $location";
    $info .= PHP_EOL; // Tambahkan newline character

    // Buka berkas dengan mode append
    $fileHandle = fopen($filePath, 'r+');

    // Baca data lama
    $oldData = fread($fileHandle, filesize($filePath));

    // Geser kursor ke awal berkas
    fseek($fileHandle, 0);

    // Tulis data baru di awal berkas
    fwrite($fileHandle, $info . $oldData);

    // Tutup berkas
    fclose($fileHandle);
}

    private function setLastCheckedTime()
    {
        try {
            $lastCheckedTime = new DateTime();
            Log::info("Terakhir diperiksa pada: " . $lastCheckedTime->format('Y-m-d H:i:s'));
        } catch (Exception $exception) {
            Log::error("Error setting last checked time: " . $exception->getMessage());
            $this->error($exception->getMessage());
        }
    }

    private function showPopup($status, $message, $location)
    {
        Log::info("Status: " . $status);
        Log::info("Message: " . $message);
        Log::info("Location: " . $location);
    }

    private function getHttpStatus($headers)
    {
        if (is_array($headers)) {
            foreach ($headers as $header) {
                if (strpos($header, 'HTTP/') === 0) {
                    preg_match('/\s(\d+)$/', $header, $matches);
                    return isset($matches[1]) ? (int)$matches[1] : 0;
                }
            }
        }

        return 0;
    }
}
