<?php

namespace App\Console\Commands;

ini_set('max_execution_time', 0);

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
        ],
        '2023/2024-Genap' => [
            'Teknik Informatika' => [9461, 9363, 9361, 9360, 9185, 9184, 9169, 9168, 9167, 9166, 9165, 9164, 9163, 9162, 9161, 9160, 9159, 105, 32, 34, 106],
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
        'ujian' => ["Ujian", "UAS", "UTS"],
        'videoPembelajaran' => "Video Pembelajaran",
        'dokumenTeksPembelajaran' => "Dokumen Teks Pembelajaran",
        'logKerja' => "Log Kerja",
        'kegiatanBelajarEksternal' => "Kegiatan Belajar Eksternal" // Elemen baru
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
            'logKerja' => false,
            'kegiatanBelajarEksternal' => false, // Elemen baru
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
                        if ($module['modname'] === 'questionnaire' && $module['modplural'] === 'Questionnaires' && $this->containsElement($module['name'], $this->requiredElements['logKerja'])) {
                            $result['logKerja'] = true;
                        }
                        if ($module['modname'] === 'url' && isset($module['contents']) && $this->containsElement($module['contents'][0]['type'] ?? '', 'url')) {
                            $result['kegiatanBelajarEksternal'] = true;
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
        $logMessage = "Course ID: $courseId - Visi Misi: " . ($result['visiMisi'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Kontrak Kuliah: " . ($result['kontrakKuliah'] ? 'Memiliki' : 'Tidak memiliki')
            . " - RPS: " . ($result['rps'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Daftar Tugas: " . ($result['daftarTugas'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Kuis: " . ($result['kuis'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Latihan: " . ($result['latihan'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Praktikum: " . ($result['praktikum'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Refleksi: " . ($result['refleksi'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Ujian: " . ($result['ujian'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Video Pembelajaran: " . ($result['videoPembelajaran'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Dokumen Teks Pembelajaran: " . ($result['dokumenTeksPembelajaran'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Log Kerja: " . ($result['logKerja'] ? 'Memiliki' : 'Tidak memiliki')
            . " - Kegiatan Belajar Eksternal: " . ($result['kegiatanBelajarEksternal'] ? 'Memiliki' : 'Tidak memiliki') // Elemen baru
            . PHP_EOL;
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
