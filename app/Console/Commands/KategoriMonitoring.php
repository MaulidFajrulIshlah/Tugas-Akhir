<?php

namespace App\Console\Commands;

ini_set('max_execution_time', 0);

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class KategoriMonitoring extends Command
{
    protected $signature = 'cek:kategori-monitoring {tahunAjaran} {prodi}';
    protected $description = 'Command description';
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

    public function handle()
    {
        $tahunAjaran = $this->argument('tahunAjaran');
        $prodi = $this->argument('prodi');
        $courses = $this->courseIds[$tahunAjaran][$prodi] ?? [];

        $totalManualGrading = 0;
        $totalKuisAutoGrading = 0;
        $totalLatihanManual = 0;
        $totalLatihanAutoGrading = 0; // Tambahkan ini untuk total latihan dengan autograding
        $totalPraktikumAutoGrading = 0;
        $totalPraktikumManualGrading = 0;
        $totalUjianAutoGrading = 0;
        $totalUjianManualGrading = 0;

        foreach ($courses as $courseId) {
            $result = $this->checkCourseContent($courseId);
            $totalManualGrading += $result['totalTugasManual'];
            $totalKuisAutoGrading += $result['totalKuisAutoGrading'];
            $totalLatihanManual += $result['totalLatihanManual'];
            $totalLatihanAutoGrading += $result['totalLatihanAutoGrading']; // Tambahkan ini
            $totalPraktikumAutoGrading += $result['totalPraktikumAutoGrading'];
            $totalPraktikumManualGrading += $result['totalPraktikumManualGrading'];
            $totalUjianAutoGrading += $result['totalUjianAutoGrading'];
            $totalUjianManualGrading += $result['totalUjianManualGrading'];
            $this->logResult($tahunAjaran, $prodi, $courseId, $result, 'detail');
        }

        $this->logResult($tahunAjaran, $prodi, null, [
            'totalTugasAutoGrading' => 0,
            'totalTugasManual' => $totalManualGrading,
            'totalKuisAutoGrading' => $totalKuisAutoGrading,
            'totalLatihanManual' => $totalLatihanManual,
            'totalLatihanAutoGrading' => $totalLatihanAutoGrading, // Tambahkan ini
            'totalPraktikumAutoGrading' => $totalPraktikumAutoGrading,
            'totalPraktikumManualGrading' => $totalPraktikumManualGrading,
            'totalUjianAutoGrading' => $totalUjianAutoGrading,
            'totalUjianManualGrading' => $totalUjianManualGrading,
        ], 'total');
    }

    private function checkCourseContent($courseId)
    {
        $result = [
            'totalTugasAutoGrading' => 0,
            'totalTugasManual' => 0,
            'totalKuisAutoGrading' => 0,
            'totalLatihanManual' => 0,
            'totalLatihanAutoGrading' => 0,
            'totalPraktikumAutoGrading' => 0,
            'totalPraktikumManualGrading' => 0,
            'totalUjianAutoGrading' => 0,
            'totalUjianManualGrading' => 0,
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
                if (isset($section['modules'])) {
                    foreach ($section['modules'] as $module) {
                        if ($this->isAutoGradingTask($module)) {
                            $result['totalTugasAutoGrading']++;
                        }

                        if ($this->isManualGradingTask($module)) {
                            $result['totalTugasManual']++;
                        }

                        if ($this->isAutoGradingQuiz($module)) {
                            $result['totalKuisAutoGrading']++;
                        }

                        if ($this->isManualGradingPractice($module)) {
                            $result['totalLatihanManual']++;
                        }

                        if ($this->isAutoGradingPraktikum($module)) {
                            $result['totalPraktikumAutoGrading']++;
                        }

                        if ($this->isManualGradingPraktikum($module)) {
                            $result['totalPraktikumManualGrading']++;
                        }

                        if ($this->isAutoGradingUjian($module)) {
                            $result['totalUjianAutoGrading']++;
                        }

                        if ($this->isManualGradingUjian($module)) {
                            $result['totalUjianManualGrading']++;
                        }

                        if ($this->isAutoGradingPractice($module)) {
                            $result['totalLatihanAutoGrading']++;
                        }
                    }
                }
            }
        }

        return $result;
    }

    private function isAutoGradingTask($module)
    {
        $modname = $module['modname'];
        $modplural = $module['modplural'];
        $description = $module['description'] ?? '';
        $name = $module['name'] ?? '';

        // Pengecekan hanya jika modul merupakan kuis (quiz) dan mengandung kata "tugas" dalam deskripsi atau nama modul
        if ($modname === 'quiz' && $modplural === 'Quizzes' && (stripos($description, 'tugas') !== false || stripos($name, 'tugas') !== false)) {
            return true;
        }

        return false;
    }


    private function isManualGradingTask($module)
    {
        $modname = $module['modname'];
        $modplural = $module['modplural'];
        $description = $module['description'] ?? '';
        $customdata = $module['customdata'] ?? '';
        $dates = $module['dates'] ?? [];

        // Pengecekan berdasarkan modname dan modplural
        if ($modname === 'assign' && $modplural === 'Assignments') {
            // Pengecekan tambahan berdasarkan deskripsi, custom data, atau dates
            // Contoh pengecekan untuk deskripsi yang mengandung kata "Tugas", "pengumpulan tugas", atau "tempat pengumpulan tugas"
            if (
                stripos($description, 'Tugas') !== false
                || stripos($description, 'pengumpulan tugas') !== false
                || stripos($description, 'tempat pengumpulan tugas') !== false
            ) {
                return true;
            }

            // Contoh pengecekan untuk custom data yang mengandung informasi "completionsubmit"
            $customDataArray = json_decode($customdata, true);
            if (isset($customDataArray['customcompletionrules'])) {
                $completionRules = $customDataArray['customcompletionrules'];
                if (isset($completionRules['completionsubmit'])) {
                    return true;
                }
            }

            // Contoh pengecekan berdasarkan tanggal pembukaan dan batas waktu
            $currentTimestamp = time();
            foreach ($dates as $date) {
                if ($date['dataid'] === 'allowsubmissionsfromdate' && $date['timestamp'] > $currentTimestamp) {
                    return true;
                }
                if ($date['dataid'] === 'duedate' && $date['timestamp'] < $currentTimestamp) {
                    return true;
                }
            }
        }

        return false;
    }

    private function isAutoGradingQuiz($module)
    {
        $modname = $module['modname'];
        $name = $module['name'] ?? '';

        // Pengecekan berdasarkan modname dan nama modul mengandung kata kunci 'Kuis'
        if ($modname === 'quiz' && stripos($name, 'Kuis') !== false) {
            return true;
        }

        return false;
    }


    private function isManualGradingPractice($module)
    {
        $modname = $module['modname'];
        $modplural = $module['modplural'];
        $name = $module['name'] ?? '';
        $customdata = $module['customdata'] ?? '';

        // Pengecekan berdasarkan modname, modplural, dan nama modul yang mengandung kata 'Latihan'
        if ($modname === 'quiz' && $modplural === 'Quizzes' && stripos($name, 'Latihan') !== false) {
            // Pengecekan tambahan untuk custom data yang mengandung informasi tertentu
            $customDataArray = json_decode($customdata, true);
            if (isset($customDataArray['customcompletionrules'])) {
                $completionRules = $customDataArray['customcompletionrules'];
                // Pengecekan jika ada "completionusegrade", atau "completionminattempts"
                if (
                    isset($completionRules['completionusegrade'])
                    || isset($completionRules['completionminattempts'])
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    private function isAutoGradingPractice($module)
    {
        $modname = $module['modname'];
        $name = $module['name'] ?? '';
        $description = $module['description'] ?? '';
        $customData = $module['customdata'] ?? '';
        $modplural = $module['modplural'];


        // Cek apakah modname adalah 'quiz' dan name mengandung kata 'Latihan', 'Pengumpulan Latihan', atau 'Tugas Latihan'
        if ($modname === 'quiz' && $modplural === 'Quizzes' && (stripos($name, 'Latihan') !== false)) {
            // Decode customdata dari JSON
            $customDataArray = json_decode($customData, true);

            // Pastikan customDataArray tidak null dan memiliki customcompletionrules
            if ($customDataArray && isset($customDataArray['customcompletionrules'])) {
                $completionRules = $customDataArray['customcompletionrules'];

                // Pengecekan untuk aturan completion yang menunjukkan latihan auto grading
                if (
                    (isset($completionRules['completionusegrade']) &&
                        isset($completionRules['completionusegrade']['status']) &&
                        $completionRules['completionusegrade']['status']) ||
                    (isset($completionRules['completionview']) &&
                        isset($completionRules['completionview']['status']) &&
                        $completionRules['completionview']['status']) ||
                    isset($completionRules['completionminattempts'])
                ) {
                    return true;
                }
            }
        }

        return false;
    }



    private function isAutoGradingPraktikum($module)
    {
        $modname = $module['modname'];
        $name = $module['name'] ?? '';
        $customData = $module['customdata'] ?? '';

        // Cek apakah modname adalah 'quiz' dan name mengandung kata 'Praktikum', 'Pengumpulan Praktikum', atau 'Tugas Praktikum'
        if ($modname === 'quiz' && (stripos($name, 'Praktikum') !== false || stripos($name, 'Pengumpulan Praktikum') !== false || stripos($name, 'Tugas Praktikum') !== false)) {
            // Decode customdata dari JSON
            $customDataArray = json_decode($customData, true);

            // Pastikan customDataArray tidak null dan memiliki customcompletionrules
            if ($customDataArray && isset($customDataArray['customcompletionrules'])) {
                $completionRules = $customDataArray['customcompletionrules'];

                // Cek apakah ada aturan completion yang menunjukkan auto grading, view, dan minimal attempts
                if (
                    isset($completionRules['completionusegrade']) && // Pastikan ada key 'completionusegrade'
                    isset($completionRules['completionusegrade']['status']) && // Pastikan ada key 'status' di dalam 'completionusegrade'
                    $completionRules['completionusegrade']['status'] === 0 || // Periksa nilai 'status' adalah 0
                    isset($completionRules['completionview']) && // Pastikan ada key 'completionview'
                    isset($completionRules['completionview']['status']) && // Pastikan ada key 'status' di dalam 'completionview'
                    $completionRules['completionview']['status'] === 0 || // Periksa nilai 'status' adalah 0
                    isset($completionRules['completionminattempts']) // Pastikan ada key 'completionminattempts'
                ) {
                    return true;
                }
            }
        }

        return false;
    }


    private function isManualGradingPraktikum($module)
    {
        $modname = $module['modname'];
        $name = $module['name'] ?? '';
        $customData = $module['customdata'] ?? '';

        // Cek apakah modname adalah 'assign' (assignment)
        if ($modname === 'assign') {
            // Decode customdata dari JSON
            $customDataArray = json_decode($customData, true);

            // Pastikan customDataArray tidak null dan memiliki customcompletionrules
            if ($customDataArray && isset($customDataArray['customcompletionrules'])) {
                $completionRules = $customDataArray['customcompletionrules'];
                // Cek apakah ada aturan completion yang menunjukkan penilaian manual
                if (isset($completionRules['completionsubmit']) && $completionRules['completionsubmit'] === '1') {
                    // Cek apakah nama assignment mengandung kata kunci yang diinginkan
                    if (stripos($name, 'Pengumpulan') !== false || stripos($name, 'Pengumpulan Praktikum') !== false || stripos($name, 'Praktikum') !== false) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    private function isAutoGradingUjian($module)
    {
        $modname = $module['modname'];
        $modplural = $module['modplural'] ?? '';
        $name = $module['name'] ?? '';
        $customData = $module['customdata'] ?? '';

        // Cek apakah modname adalah 'quiz' dan modplural adalah 'Quizzes'
        // serta name mengandung kata 'Ujian', 'UTS', 'UAS', 'Minggu UTS', atau 'Minggu UAS'
        if (
            $modname === 'quiz' && $modplural === 'Quizzes' &&
            (stripos($name, 'Ujian') !== false ||
                stripos($name, 'UTS') !== false ||
                stripos($name, 'UAS') !== false ||
                stripos($name, 'Minggu UTS') !== false ||
                stripos($name, 'Minggu UAS') !== false)
        ) {

            // Decode customdata dari JSON
            $customDataArray = json_decode($customData, true);

            // Pastikan customDataArray tidak null dan memiliki customcompletionrules
            if ($customDataArray && isset($customDataArray['customcompletionrules'])) {
                $completionRules = $customDataArray['customcompletionrules'];

                // Cek apakah ada aturan completion yang menunjukkan auto grading, view, dan minimal attempts
                if (
                    isset($completionRules['completionusegrade']) && // Pastikan ada key 'completionusegrade'
                    isset($completionRules['completionusegrade']['status']) && // Pastikan ada key 'status' di dalam 'completionusegrade'
                    $completionRules['completionusegrade']['status'] === 0 || // Periksa nilai 'status' adalah 0
                    isset($completionRules['completionview']) && // Pastikan ada key 'completionview'
                    isset($completionRules['completionview']['status']) && // Pastikan ada key 'status' di dalam 'completionview'
                    $completionRules['completionview']['status'] === 0 || // Periksa nilai 'status' adalah 0
                    isset($completionRules['completionminattempts']) // Pastikan ada key 'completionminattempts'
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    private function isManualGradingUjian($module)
    {
        $modname = $module['modname'];
        $modplural = $module['modplural'];
        $name = $module['name'] ?? '';
        $customdata = $module['customdata'] ?? '';

        // Pengecekan berdasarkan modname, modplural, dan nama modul
        if ($modname === 'assign' && $modplural === 'Assignments') {
            // Pengecekan apakah nama mengandung kata kunci yang menandakan ujian untuk manual grading
            if (
                stripos($name, 'Ujian') !== false ||
                stripos($name, 'UTS') !== false ||
                stripos($name, 'UAS') !== false ||
                stripos($name, 'Minggu UTS') !== false ||
                stripos($name, 'Minggu UAS') !== false ||
                stripos($name, 'UAS Praktikum') !== false ||
                stripos($name, 'UTS Praktikum') !== false ||
                stripos($name, 'Pengumpulan UTS') !== false ||
                stripos($name, 'Pengumpulan UTS') !== false
            ) {

                // Pastikan tidak ada custom data yang menyatakan aturan untuk auto grading
                $customDataArray = json_decode($customdata, true);
                if (empty($customDataArray)) {
                    return true;
                }
            }
        }

        return false;
    }



    private function logResult($tahunAjaran, $prodi, $courseId, $result, $type)
    {
        $logFilePath = storage_path('logs/cekKategoriMonitoring.log');
        if ($type === 'detail') {
            $logMessage = "Course ID: $courseId"
                . " - Total Tugas Auto Grading: " . $result['totalTugasAutoGrading']
                . " - Total Tugas Manual: " . $result['totalTugasManual']
                . " - Total Tugas: " . ($result['totalTugasAutoGrading'] + $result['totalTugasManual'])
                . " - Total Kuis Auto Grading: " . $result['totalKuisAutoGrading']
                . " - Total Latihan Manual: " . $result['totalLatihanManual']
                . " - Total Latihan Auto Grading: " . $result['totalLatihanAutoGrading']
                . " - Total Praktikum Auto Grading: " . $result['totalPraktikumAutoGrading']
                . " - Total Praktikum Manual Grading: " . $result['totalPraktikumManualGrading']
                . " - Total Praktikum: " . ($result['totalPraktikumAutoGrading'] + $result['totalPraktikumManualGrading'] )
                . " - Total Ujian Auto Grading: " . $result['totalUjianAutoGrading']
                . " - Total Ujian Manual Grading: " . $result['totalUjianManualGrading']
                . " - Total Ujian: ". ($result['totalUjianAutoGrading'] + $result['totalUjianManualGrading'])
                . PHP_EOL;
        } else if ($type === 'total') {
            $logMessage = "Total for $tahunAjaran - $prodi:"
                . " Total Tugas Auto Grading: " . $result['totalTugasAutoGrading']
                . " - Total Tugas Manual: " . $result['totalTugasManual']
                . " - Total Tugas: " . ($result['totalTugasAutoGrading'] + $result['totalTugasManual'])
                . " - Total Kuis Auto Grading: " . $result['totalKuisAutoGrading']
                . " - Total Latihan Manual: " . $result['totalLatihanManual']
                . " - Total Latihan Auto Grading: " . $result['totalLatihanAutoGrading']
                . " - Total Praktikum Auto Grading: " . $result['totalPraktikumAutoGrading']
                . " - Total Praktikum Manual Grading: " . $result['totalPraktikumManualGrading']
                . " - Total Praktikum: " . ($result['totalPraktikumAutoGrading'] + $result['totalPraktikumManualGrading'] )
                . " - Total Ujian Auto Grading: " . $result['totalUjianAutoGrading']
                . " - Total Ujian Manual Grading: " . $result['totalUjianManualGrading']
                . " - Total Ujian: ". ($result['totalUjianAutoGrading'] + $result['totalUjianManualGrading'])
                . PHP_EOL;
        }

        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }
}
