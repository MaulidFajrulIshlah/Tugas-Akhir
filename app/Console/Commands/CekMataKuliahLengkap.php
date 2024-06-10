<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CekMataKuliahLengkap extends Command
{
    protected $signature = 'app:cek-mata-kuliah-lengkap {tahunAjaran} {prodi}';
    protected $description = 'Check completeness of courses: Visi dan Misi, Kontrak Kuliah, Rencana Pembelajaran Semester (RPS)';

    private $tokenApi = '7806baea3070ce31a56406264a241c4a';
    private $apiUrl = 'https://layar.yarsi.ac.id/webservice/rest/server.php';
    private $courseIds = [
        '2023/2024-Ganjil' => [
            'Teknik Informatika' => [8299, 8304, 8574, 8688, 8300, 8631, 8395, 8306, 8307, 8308, 8302, 8303, 8301, 8605, 8601, 8225, 8310, 8309, 8840, 8298, 7485],
            'Perpustakaan dan Sains Informasi' => [8259, 8268, 8269, 8263, 8265, 8266, 8260, 8253, 8264, 8285, 8258, 8273, 8287, 8276, 8267, 8288, 8270, 8251, 6970, 8246, 8254, 8255, 8281, 8284, 8272, 8282, 8279, 8266, 8261, 9023, 8252, 8275, 8271, 8256, 8257, 8278, 8280, 8834, 8277, 8286, 8274],
            'Hukum' => [9194, 9200, 9193, 9192, 9195, 9190, 9191, 9188, 9518, 9209, 9208, 9207, 9196, 9728, 9205, 9187, 9204, 9203, 9202, 9201, 9283, 9289, 9290, 9210, 9197, 9288, 9198, 9211, 9364, 9212, 9214, 9199, 9213, 9551, 9550, 9362,],
            'Psikolog' => [8238, 8239, 8240, 8241, 8318, 8319, 8320, 8321, 8322, 8323, 8324, 8325, 8326, 8327, 8328, 8329, 8330, 8331, 8332, 8333, 8334, 8335, 8336, 8337, 8338, 8392, 8393, 8404, 8603, 8874,],
        ],
        '2023/2024-Genap' => [
            'Teknik Informatika' => [9461, 9363, 9361, 9360, 9185, 9184, 9169, 9168, 9167, 9166, 9165, 9164, 9163, 9162, 9161, 9160, 9159, 105, 32, 34, 106],
            'Perpustakaan dan Sains Informasi' => [11002, 11001, 10988, 9548, 10987, 9376, 9310, 9299, 9313, 9303, 9296, 9307, 9304, 9314, 9302, 9305, 9297, 9301, 9295, 9306, 9298, 9292, 9291, 9308, 9312, 9366, 9294, 9300, 9311, 9293, 9309],
            'Hukum' => [8377, 8378, 8373, 8453, 8425, 8374, 8375, 8852, 8380, 8421, 8382, 8420, 8390, 8383, 8386, 8316, 8423, 8427, 8388, 8354, 8355, 8361, 8368, 8369, 8815, 8429, 8391, 8357, 8363, 8430, 8358, 8364, 8432, 8356, 8602, 8367, 8366,],
            'Psikolog' => [9070, 9071, 9072, 9073, 9074, 9075, 9076, 9077, 9078, 9079, 9080, 9081, 9082, 9083, 9084, 9085, 9086, 9087, 9088, 9089, 9090, 9091, 9092, 9093, 9094, 9095, 9096, 9365, 10986,],
        ],
        // Tambahkan tahun ajaran lain jika perlu
    ];

    private $requiredElements = [
        'visiMisi' => "Visi dan Misi",
        'kontrakKuliah' => "Kontrak Kuliah",
        'rps' => "Rencana Pembelajaran Semester (RPS)",
        'daftarTugas' => "Assignments",
        'kuis' => "Quizzes",
        'latihan' => "Latihan",
        'praktikum' => "Praktikum",
        'refleksi' => "Refleksi",
        'ujian' => ["Ujian", "UAS", "UTS"], // Tambahkan kata kunci ujian
        'videoPembelajaran' => "Video Pembelajaran",
        'dokumenTeksPembelajaran' => "Dokumen Teks Pembelajaran", // Tambahkan elemen untuk dokumen teks pembelajaran
    ];

    public function handle()
    {
        $tahunAjaran = $this->argument('tahunAjaran');
        $prodi = $this->argument('prodi');
        $courses = $this->courseIds[$tahunAjaran][$prodi] ?? [];
        $totalCoursesWithAllCriteria = 0;

        foreach ($courses as $courseId) {
            $result = $this->checkCourseContent($courseId);
            $this->logResult($tahunAjaran, $prodi, $courseId, $result);
            $this->logDebugResult($courseId, $result);

            if ($this->courseMeetsAllCriteria($result)) {
                $totalCoursesWithAllCriteria++;
            }
        }
        $expirationTime = now()->addHour(); // Cache berlaku selama 1 jam dari saat ini
        // Simpan nilai total ke cache
        Cache::put('totalCoursesWithAllCriteria', $totalCoursesWithAllCriteria, $expirationTime);

        // Log total mata kuliah yang memenuhi semua kriteria
        $this->logTotalCoursesWithAllCriteria($totalCoursesWithAllCriteria);
    }


    private function courseMeetsAllCriteria($result)
    {
        // Periksa apakah semua elemen dalam hasil pemeriksaan adalah true
        foreach ($result as $element) {
            if (!$element) {
                return false;
            }
        }
        return true;
    }

    private function checkCourseContent($courseId)
    {
        $result = [
            'visiMisi' => false,
            'kontrakKuliah' => false,
            'rps' => false,
            'daftarTugas' => false,
            'kuis' => false,
            'latihan' => false,
            'praktikum' => false,
            'refleksi' => false,
            'ujian' => false,
            'videoPembelajaran' => false,
            'dokumenTeksPembelajaran' => false,
        ];

        $response = Http::get($this->apiUrl, [
            'wstoken' => $this->tokenApi,
            'wsfunction' => 'core_course_get_contents',
            'moodlewsrestformat' => 'json',
            'courseid' => $courseId,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $section) {
                foreach ($this->requiredElements as $key => $element) {
                    if ($this->containsElement($section['name'], $element)) {
                        $result[$key] = true;
                    }
                }
                if (isset($section['modules'])) {
                    foreach ($section['modules'] as $module) {
                        if ($module['modname'] === 'assign' && $module['modplural'] === 'Assignments') {
                            $result['daftarTugas'] = true;
                        }
                        if ($module['modname'] === 'quiz' && $module['modplural'] === 'Quizzes') {
                            $result['kuis'] = true;
                        }
                        if ($module['modname'] === 'quiz' && $module['modplural'] === 'Quizzes') {
                            $result['latihan'] = true;
                        }
                        if ($module['modname'] === 'quiz' && $module['modplural'] === 'Quizzes') {
                            $result['praktikum'] = true;
                        }
                        if ($module['modname'] === 'label' && $module['modplural'] === 'Text and media areas' && $this->containsElement($module['name'], $this->requiredElements['refleksi'])) {
                            $result['refleksi'] = true;
                        }
                        if ($module['modname'] === 'quiz' && $module['modplural'] === 'Quizzes' && ($this->containsElement($module['name'], $this->requiredElements['ujian']) || $this->containsElement($module['description'] ?? '', $this->requiredElements['ujian']))) {
                            $result['ujian'] = true;
                        }
                        if ($module['modname'] === 'resource' && $module['modplural'] === 'Files' && isset($module['contents'][0]['mimetype']) && $module['contents'][0]['mimetype'] === 'video/mp4') {
                            $result['videoPembelajaran'] = true;
                        }
                        if ($module['modname'] === 'resource' && $module['modplural'] === 'Files' && isset($module['contents'][0]['mimetype']) && ($module['contents'][0]['mimetype'] === 'application/pdf' || $module['contents'][0]['mimetype'] === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $module['contents'][0]['mimetype'] === 'application/vnd.openxmlformats-officedocument.presentationml.presentation')) {
                            $result['dokumenTeksPembelajaran'] = true;
                        }
                        foreach ($this->requiredElements as $key => $element) {
                            if ($this->containsElement($module['name'], $element) || $this->containsElement($module['description'] ?? '', $element)) {
                                $result[$key] = true;
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }

    // Fungsi pengecekan elemen
    private function containsElement($text, $element)
    {
        if (is_array($element)) {
            foreach ($element as $el) {
                if (stripos($text, $el) !== false) {
                    return true;
                }
            }
            return false;
        } else {
            return stripos($text, $element) !== false;
        }
    }

    private function logResult($tahunAjaran, $prodi, $courseId, $result)
    {
        $logFilePath = storage_path('logs/cekmatakuliahlengkap.log');
        $logMessage = "Course ID: $courseId - Visi Misi: " . ($result['visiMisi'] ? 'Memiliki' : 'Tidak memiliki') . " - Kontrak Kuliah: " . ($result['kontrakKuliah'] ? 'Memiliki' : 'Tidak memiliki') . " - RPS: " . ($result['rps'] ? 'Memiliki' : 'Tidak memiliki') . " - Daftar Tugas: " . ($result['daftarTugas'] ? 'Memiliki' : 'Tidak memiliki') . " - Kuis: " . ($result['kuis'] ? 'Memiliki' : 'Tidak memiliki') . " - Latihan: " . ($result['latihan'] ? 'Memiliki' : 'Tidak memiliki') . " - Praktikum: " . ($result['praktikum'] ? 'Memiliki' : 'Tidak memiliki') . " - Refleksi: " . ($result['refleksi'] ? 'Memiliki' : 'Tidak memiliki') . " - Ujian: " . ($result['ujian'] ? 'Memiliki' : 'Tidak memiliki') . " - Video Pembelajaran: " . ($result['videoPembelajaran'] ? 'Memiliki' : 'Tidak memiliki') . " - Dokumen Teks Pembelajaran: " . ($result['dokumenTeksPembelajaran'] ? 'Memiliki' : 'Tidak memiliki') . PHP_EOL;
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }

    private function logTotalCoursesWithAllCriteria($total)
    {
        $logFilePath = storage_path('logs/cekmatakuliahlengkap.log');
        $logMessage = "Total courses with all criteria: $total\n";
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }

    private function logDebugResult($courseId, $result)
    {
        $logFilePath = storage_path('logs/cekmatakuliahlengkap_debug.log');
        $logMessage = "Debug Result - Course ID: $courseId - " . json_encode($result) . PHP_EOL;
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }
}
