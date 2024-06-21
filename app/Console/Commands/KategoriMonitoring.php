<?php

namespace App\Console\Commands;

ini_set('max_execution_time', 0);

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class KategoriMonitoring extends Command
{
    protected $signature = 'cek:kategori-monitoring {tahunAjaran} {prodi}';
    protected $description = 'Command description';
    private $tokenApi = '7806baea3070ce31a56406264a241c4a';
    private $apiUrl = 'https://layar.yarsi.ac.id/webservice/rest/server.php';
    private $courseIds = [
        '2023/2024-Ganjil' => [
            'Teknik Informatika' => [8299, 8304, 8574, 8688, 8300, 8631, 8395, 8306, 8307, 8308, 8302, 8303, 8301, 8605, 8601, 8225, 8310, 8309, 8840, 8298, 7485],
            'Perpustakaan dan Sains Informasi' => [8259, 8268, 8269, 8263, 8265, 8266, 8260, 8253, 8264, 8285, 8258, 8273, 8287, 8276, 8267, 8288, 8270, 8251, 6970, 8246, 8254, 8255, 8281, 8284, 8272, 8282, 8279, 8266, 8261, 9023, 8252, 8275, 8271, 8256, 8257, 8278, 8280, 8834, 8277, 8286, 8274],
            'Hukum' => [9194, 9200, 9193, 9192, 9195, 9190, 9191, 9188, 9518, 9209, 9208, 9207, 9196, 9728, 9205, 9187, 9204, 9203, 9202, 9201, 9283, 9289, 9290, 9210, 9197, 9288, 9198, 9211, 9364, 9212, 9214, 9199, 9213, 9551, 9550, 9362,],
            'Psikolog' => [8238, 8239, 8240, 8241, 8318, 8319, 8320, 8321, 8322, 8323, 8324, 8325, 8326, 8327, 8328, 8329, 8330, 8331, 8332, 8333, 8334, 8335, 8336, 8337, 8338, 8392, 8393, 8404, 8603, 8874,],
            'Akuntansi' => [8547, 9556, 8551, 8561, 8553, 8560, 8550, 8554, 8549, 8557, 8546, 8558, 8552, 8555, 8548, 8559, 8566, 8567, 8568, 8569, 8564, 8565, 8581, 8582, 8577, 8578, 8570, 8571, 8579, 8580, 8572, 8573, 8562, 8563, 8808, 8809, 8589, 8590, 8595, 8596, 8587, 8588, 8585, 8586, 8593, 8594, 8584, 8583, 8591, 8592, 8575, 8576, 8597, 8598],
            'Manajemen' => [8807, 8488, 8490, 8473, 8475, 8476, 8471, 8472, 8474, 8477, 8478, 8479, 8484, 8483, 8485, 8486, 8487, 8491, 8480, 8481, 8482, 8510, 8511, 8512, 8498, 8499, 8500, 8516, 8517, 8518, 8504, 8505, 8506, 8643, 8513, 8514, 8515, 8495, 8496, 8497, 8492, 8493, 8494, 8501, 8502, 8503, 8507, 8508, 8509, 8531, 8532, 8533, 8538, 8540, 8541, 8542, 8543, 8534, 8535, 8536, 8522, 8523, 8524, 8519, 8520, 8521, 8525, 8526, 8527, 8528, 8529, 8530, 8544, 8545],
        ],
        '2023/2024-Genap' => [
            'Teknik Informatika' => [9461, 9363, 9361, 9360, 9185, 9184, 9169, 9168, 9167, 9166, 9165, 9164, 9163, 9162, 9161, 9160, 9159, 105, 32, 34, 106],
            'Perpustakaan dan Sains Informasi' => [11002, 11001, 10988, 9548, 10987, 9376, 9310, 9299, 9313, 9303, 9296, 9307, 9304, 9314, 9302, 9305, 9297, 9301, 9295, 9306, 9298, 9292, 9291, 9308, 9312, 9366, 9294, 9300, 9311, 9293, 9309],
            'Hukum' => [8377, 8378, 8373, 8453, 8425, 8374, 8375, 8852, 8380, 8421, 8382, 8420, 8390, 8383, 8386, 8316, 8423, 8427, 8388, 8354, 8355, 8361, 8368, 8369, 8815, 8429, 8391, 8357, 8363, 8430, 8358, 8364, 8432, 8356, 8602, 8367, 8366,],
            'Psikolog' => [9070, 9071, 9072, 9073, 9074, 9075, 9076, 9077, 9078, 9079, 9080, 9081, 9082, 9083, 9084, 9085, 9086, 9087, 9088, 9089, 9090, 9091, 9092, 9093, 9094, 9095, 9096, 9365, 10986,],
            'Akuntansi' => [9315, 9316, 9355, 9354, 9349, 9348, 9347, 9346, 9345, 9344, 9343, 9342, 9341, 9340, 9323, 9322, 9321, 9320, 9319, 9318, 9359, 9358, 9357, 9356, 9353, 9352, 9351, 9350],
            'Manajemen' => [9110, 9276, 9277, 9103, 9104, 9287, 9284, 9281, 9101, 9107, 9286, 9105, 9102, 9282, 9097, 9100, 9280, 9106, 9109, 9279, 9108, 9098, 9278, 9237, 9223, 9222, 9233, 9217, 9186, 9230, 9226, 9215, 9231, 9225, 9216, 9232, 9219, 9220, 9236, 9221, 9218, 9235, 9229, 9224, 9234, 9227, 9228, 9258, 9257, 9256, 9255, 9254, 9253, 9252, 9251, 9250, 9249, 9248, 9247, 9246, 9245, 9244, 9243, 9242, 9241, 9240, 9239, 9238],
        ],
        // Tambahkan tahun ajaran lain jika perlu
    ];

    public function handle()
    {
        $tahunAjaran = $this->argument('tahunAjaran');
        $prodi = $this->argument('prodi');
        $courses = $this->courseIds[$tahunAjaran][$prodi] ?? [];

        // Step baru buat ambil nama mata kuliah
        $courseNames = $this->getCourseNames($courses);

        $totalTugasAutoGrading = 0;
        $totalTugasManualGrading = 0;
        $totalKuisAutoGrading = 0;
        $totalLatihanManual = 0;
        $totalLatihanAutoGrading = 0;
        $totalPraktikumAutoGrading = 0;
        $totalPraktikumManualGrading = 0;
        $totalUjianAutoGrading = 0;
        $totalUjianManualGrading = 0;
        $totalVisiMisi = 0;
        $totalKontrakKuliah = 0;
        $totalRPS = 0;
        $totalRefleksi = 0;
        $totalLogKerja = 0;
        $totalVideoPembelajaran = 0;
        $totalKegiatanBelajarEksternal = 0;

        foreach ($courses as $courseId) {
            $result = $this->checkCourseContent($courseId);
            $totalTugasAutoGrading += $result['totalTugasAutoGrading'];
            $totalTugasManualGrading += $result['totalTugasManual'];
            $totalKuisAutoGrading += $result['totalKuisAutoGrading'];
            $totalLatihanManual += $result['totalLatihanManual'];
            $totalLatihanAutoGrading += $result['totalLatihanAutoGrading'];
            $totalPraktikumAutoGrading += $result['totalPraktikumAutoGrading'];
            $totalPraktikumManualGrading += $result['totalPraktikumManualGrading'];
            $totalUjianAutoGrading += $result['totalUjianAutoGrading'];
            $totalUjianManualGrading += $result['totalUjianManualGrading'];
            $totalVisiMisi += $result['totalVisiMisi'];
            $totalKontrakKuliah += $result['totalKontrakKuliah'];
            $totalRPS += $result['totalRPS'];
            $totalRefleksi += $result['totalRefleksi'];
            $totalLogKerja += $result['totalLogKerja'];
            $totalVideoPembelajaran += $result['totalVideoPembelajaran'];
            $totalKegiatanBelajarEksternal += $result['totalKegiatanBelajarEksternal'];
            $this->logResult($tahunAjaran, $prodi, $courseId, $result, 'detail');
        }

        Cache::put('totalTugasAutoGrading', $totalTugasAutoGrading, now()->addMinutes(30));
        Cache::put('totalTugasManualGrading', $totalTugasManualGrading, now()->addMinutes(30));
        Cache::put('totalKuisAutoGrading', $totalKuisAutoGrading, now()->addMinutes(30));
        Cache::put('totalLatihanManual', $totalLatihanManual, now()->addMinutes(30));
        Cache::put('totalLatihanAutoGrading', $totalLatihanAutoGrading, now()->addMinutes(30));
        Cache::put('totalPraktikumAutoGrading', $totalPraktikumAutoGrading, now()->addMinutes(30));
        Cache::put('totalPraktikumManualGrading', $totalPraktikumManualGrading, now()->addMinutes(30));
        Cache::put('totalUjianAutoGrading', $totalUjianAutoGrading, now()->addMinutes(30));
        Cache::put('totalUjianManualGrading', $totalUjianManualGrading, now()->addMinutes(30));
        Cache::put('totalVisiMisi', $totalVisiMisi, now()->addMinutes(30));
        Cache::put('totalKontrakKuliah', $totalKontrakKuliah, now()->addMinutes(30));
        Cache::put('totalRPS', $totalRPS, now()->addMinutes(30));
        Cache::put('totalRefleksi', $totalRefleksi, now()->addMinutes(30));
        Cache::put('totalLogKerja', $totalLogKerja, now()->addMinutes(30));
        Cache::put('totalVideoPembelajaran', $totalVideoPembelajaran, now()->addMinutes(30));
        Cache::put('totalKegiatanBelajarEksternal', $totalKegiatanBelajarEksternal, now()->addMinutes(30));

        $this->logResult($tahunAjaran, $prodi, null, [
            'totalTugasAutoGrading' => $totalTugasAutoGrading,
            'totalTugasManual' => $totalTugasManualGrading,
            'totalKuisAutoGrading' => $totalKuisAutoGrading,
            'totalLatihanManual' => $totalLatihanManual,
            'totalLatihanAutoGrading' => $totalLatihanAutoGrading,
            'totalPraktikumAutoGrading' => $totalPraktikumAutoGrading,
            'totalPraktikumManualGrading' => $totalPraktikumManualGrading,
            'totalUjianAutoGrading' => $totalUjianAutoGrading,
            'totalUjianManualGrading' => $totalUjianManualGrading,
            'totalVisiMisi' => $totalVisiMisi,
            'totalKontrakKuliah' => $totalKontrakKuliah,
            'totalRPS' => $totalRPS,
            'totalRefleksi' => $totalRefleksi,
            'totalLogKerja' => $totalLogKerja,
            'totalVideoPembelajaran' => $totalVideoPembelajaran,
            'totalKegiatanBelajarEksternal' => $totalKegiatanBelajarEksternal,
        ], 'total');
    }


    private function getCourseNames($courseIds)
    {
        $courseNames = [];
        $response = Http::get($this->apiUrl, [
            'wstoken' => $this->tokenApi,
            'wsfunction' => 'core_course_get_courses',
            'moodlewsrestformat' => 'json',
            'options[ids][0]' => implode(',', $courseIds),
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Pastikan $data adalah array dan memiliki struktur yang sesuai
            if (is_array($data)) {
                foreach ($data as $course) {
                    if (isset($course['id']) && isset($course['fullname'])) {
                        $courseNames[$course['id']] = $course['fullname'];
                    }
                }
            }
        }

        return $courseNames;
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
            'totalVisiMisi' => 0,
            'totalKontrakKuliah' => 0,
            'totalRPS' => 0,
            'totalRefleksi' => 0,
            'totalLogKerja' => 0, // Tambahkan ini untuk Log Kerja
            'totalVideoPembelajaran' => 0, // Tambahkan ini untuk Video Pembelajaran
            'totalKegiatanBelajarEksternal' => 0,
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

                        if ($this->isVisiMisi($module)) {
                            $result['totalVisiMisi']++;
                        }

                        if ($this->isKontrakKuliah($module)) {
                            $result['totalKontrakKuliah']++;
                        }

                        if ($this->isRPS($module)) {
                            $result['totalRPS']++;
                        }

                        if ($this->isRefleksi($module)) {
                            $result['totalRefleksi']++;
                        }

                        if ($this->isLogKerja($module)) {
                            $result['totalLogKerja']++;
                        }

                        if ($this->isVideoPembelajaran($module)) {
                            $result['totalVideoPembelajaran']++;
                        }

                        if ($this->isKegiatanBelajarEksternal($module)) {
                            $result['totalKegiatanBelajarEksternal']++;
                        }
                    }
                }
            }
        }

        return $result;
    }

    private function isVisiMisi($module)
    {
        // Pengecekan hanya jika modname adalah "resource" dan modplural adalah "Files"
        if (
            $module['modname'] === 'resource' &&
            $module['modplural'] === 'Files' &&
            (
                strpos(strtolower($module['name'] ?? ''), 'visi dan misi') !== false &&
                strpos(strtolower($module['name'] ?? ''), 'visi dan misi program studi') !== false ||
                strpos(strtolower($module['description'] ?? ''), 'visi dan misi') !== false &&
                strpos(strtolower($module['description'] ?? ''), 'visi dan misi program studi') !== false
            )
        ) {
            // Pengecekan ekstensi file dalam contents
            foreach ($module['contents'] as $content) {
                $filename = $content['filename'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                // Pengecekan ekstensi yang diizinkan (ppt, pptx, pdf)
                if (in_array(strtolower($ext), ['ppt', 'pptx', 'pdf'])) {
                    return true;
                }
            }
        }

        return false;
    }

    private function isKontrakKuliah($module)
    {
        $name = $module['name'] ?? '';
        $description = $module['description'] ?? '';
        $modname = $module['modname'] ?? '';
        $modplural = $module['modplural'] ?? '';

        // Pengecekan hanya berdasarkan nama, deskripsi, modname, dan modplural
        if (
            $modname === 'choice' &&
            $modplural === 'Choices' &&
            (strpos(strtolower($name), 'kontrak kuliah') !== false ||
                strpos(strtolower($description), 'kontrak kuliah') !== false)
        ) {
            return true;
        }

        return false;
    }

    private function isRPS($module)
    {
        // Lakukan pengecekan pada nama dan deskripsi modul
        $name = $module['name'] ?? '';
        $description = $module['description'] ?? '';

        // Pengecekan hanya jika terdapat kata 'RPS' dalam nama atau deskripsi modul
        if (
            strpos(strtolower($name), 'rps') !== false ||
            strpos(strtolower($name), 'Rencana Pembelajaran Semester') !== false ||
            strpos(strtolower($name), 'Rencana Pembelajaran Semester (RPS)') !== false &&
            strpos(strtolower($description), 'rps') !== false ||
            strpos(strtolower($description), 'Rencana Pembelajaran Semester') !== false ||
            strpos(strtolower($description), 'Rencana Pembelajaran Semester (RPS)') !== false
        ) {
            return true;
        }

        return false;
    }

    private function isRefleksi($module)
    {
        $name = $module['name'] ?? '';
        $description = $module['description'] ?? '';
        $modname = $module['modname'] ?? '';
        $modplural = $module['modplural'] ?? '';

        // Pengecekan hanya berdasarkan nama, deskripsi, modname, dan modplural
        if (
            $modname === 'questionnaire' &&
            $modplural === 'Questionnaires' &&
            (strpos(strtolower($name), 'refleksi') !== false || strpos(strtolower($description), 'refleksi') !== false)
        ) {
            return true;
        }

        return false;
    }

    private function isLogKerja($module)
    {
        $name = $module['name'] ?? '';
        $description = $module['description'] ?? '';
        $modname = $module['modname'] ?? '';
        $modplural = $module['modplural'] ?? '';

        // Pengecekan berdasarkan nama, deskripsi, modname, dan modplural
        if (
            $modname === 'questionnaire' &&
            $modplural === 'Questionnaires' &&
            strpos(strtolower($name), 'log kerja') !== false &&
            strpos(strtolower($description), 'log kerja') !== false
        ) {
            return true;
        }

        return false;
    }

    private function isVideoPembelajaran($module)
    {
        $modname = $module['modname'] ?? '';
        $modplural = $module['modplural'] ?? '';
        $contentsinfo = $module['contentsinfo']['mimetypes'][0] ?? '';

        // Pengecekan berdasarkan modname, modplural, dan mimetype
        if (
            $modname === 'resource' &&
            $modplural === 'Files' &&
            $contentsinfo === 'video/mp4'
        ) {
            return true;
        }

        return false;
    }

    private function isKegiatanBelajarEksternal($module)
    {
        $modname = $module['modname'] ?? '';
        $modplural = $module['modplural'] ?? '';

        // Pengecekan untuk modname resource dan modplural Files
        if (
            ($modname === 'resource' && $modplural === 'Files') ||
            ($modname === 'url' && $modplural === 'URLs')
        ) {
            // Jika modname adalah resource dan modplural adalah Files,
            // atau modname adalah url dan modplural adalah URLs,
            // lakukan pengecekan lebih lanjut
            if ($modname === 'resource') {
                // Pengecekan berdasarkan mimetypes untuk resource Files
                $contentsinfo = $module['contentsinfo']['mimetypes'][0] ?? '';
                if (strpos($contentsinfo, 'application/pdf') !== false) {
                    return true; // Return true jika ditemukan tipe file PDF
                }

                // Pengecekan untuk video
                if (strpos($contentsinfo, 'video') !== false) {
                    return true; // Return true jika ditemukan tipe file video
                }
            } elseif ($modname === 'url') {
                // Pengecekan untuk url URLs
                // Anda bisa menambahkan pengecekan untuk tipe URL tertentu, misalnya video
                $contents = $module['contents'] ?? [];
                foreach ($contents as $content) {
                    if ($content['type'] === 'url') {
                        // Misalnya, jika fileurl adalah sebuah video (contoh video YouTube)
                        if (strpos($content['fileurl'], 'youtu.be') !== false || strpos($content['fileurl'], 'youtube.com') !== false) {
                            return true; // Return true jika ditemukan tipe video (YouTube)
                        }
                    }
                }
            }
        }

        return false; // Return false jika tidak memenuhi syarat untuk kegiatan belajar eksternal
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

    //total kuis
    private function isAutoGradingQuiz($module)
    {
        $modname = $module['modname'] ?? '';
        $name = $module['name'] ?? '';
        $modplural = $module['modplural'] ?? '';

        // Pengecekan berdasarkan modname, modplural, atau nama modul mengandung kata kunci 'Kuis' atau 'Quiz'
        if ((stripos($modname, 'quiz') !== false && stripos($modplural, 'quiz') !== false && stripos($name, 'Kuis') !== false || stripos($name, 'Quiz') !== false)) {
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
    $courseNames = $this->getCourseNames([$courseId]);
    $courseName = $courseNames[$courseId] ?? "Unknown Course";

    $logFilePath = storage_path('logs/cekKategoriMonitoring.log');
    $logMessage = '';

    if ($type === 'detail') {
        $logMessage = "Course: $courseName"
            . " - Total Tugas Auto Grading: " . ($result['totalTugasAutoGrading'] ?? 0)
            . " - Total Tugas Manual: " . ($result['totalTugasManual'] ?? 0)
            . " - Total Tugas: " . (($result['totalTugasAutoGrading'] ?? 0) + ($result['totalTugasManual'] ?? 0))
            . " - Total Kuis Auto Grading: " . ($result['totalKuisAutoGrading'] ?? 0)
            . " - Total Latihan Manual: " . ($result['totalLatihanManual'] ?? 0)
            . " - Total Latihan Auto Grading: " . ($result['totalLatihanAutoGrading'] ?? 0)
            . " - Total Praktikum Auto Grading: " . ($result['totalPraktikumAutoGrading'] ?? 0)
            . " - Total Praktikum Manual Grading: " . ($result['totalPraktikumManualGrading'] ?? 0)
            . " - Total Praktikum: " . (($result['totalPraktikumAutoGrading'] ?? 0) + ($result['totalPraktikumManualGrading'] ?? 0))
            . " - Total Ujian Auto Grading: " . ($result['totalUjianAutoGrading'] ?? 0)
            . " - Total Ujian Manual Grading: " . ($result['totalUjianManualGrading'] ?? 0)
            . " - Total Ujian: " . (($result['totalUjianAutoGrading'] ?? 0) + ($result['totalUjianManualGrading'] ?? 0))
            . " - Total Visi Misi: " . ($result['totalVisiMisi'] ?? 0)
            . " - Total Kontrak Kuliah: " . ($result['totalKontrakKuliah'] ?? 0)
            . " - Total RPS: " . ($result['totalRPS'] ?? 0)
            . " - Total Refleksi: " . ($result['totalRefleksi'] ?? 0)
            . " - Total Log Kerja: " . ($result['totalLogKerja'] ?? 0)
            . " - Total Video Pembelajaran: " . ($result['totalVideoPembelajaran'] ?? 0)
            . " - Total Kegiatan Belajar Eksternal: " . ($result['totalKegiatanBelajarEksternal'] ?? 0)
            . PHP_EOL;
    } else if ($type === 'total') {
        $logMessage = "Total for $tahunAjaran - $prodi:"
            . " Total Tugas Auto Grading: " . ($result['totalTugasAutoGrading'] ?? 0)
            . " - Total Tugas Manual: " . ($result['totalTugasManual'] ?? 0)
            . " - Total Tugas: " . (($result['totalTugasAutoGrading'] ?? 0) + ($result['totalTugasManual'] ?? 0))
            . " - Total Kuis Auto Grading: " . ($result['totalKuisAutoGrading'] ?? 0)
            . " - Total Latihan Manual: " . ($result['totalLatihanManual'] ?? 0)
            . " - Total Latihan Auto Grading: " . ($result['totalLatihanAutoGrading'] ?? 0)
            . " - Total Praktikum Auto Grading: " . ($result['totalPraktikumAutoGrading'] ?? 0)
            . " - Total Praktikum Manual Grading: " . ($result['totalPraktikumManualGrading'] ?? 0)
            . " - Total Praktikum: " . (($result['totalPraktikumAutoGrading'] ?? 0) + ($result['totalPraktikumManualGrading'] ?? 0))
            . " - Total Ujian Auto Grading: " . ($result['totalUjianAutoGrading'] ?? 0)
            . " - Total Ujian Manual Grading: " . ($result['totalUjianManualGrading'] ?? 0)
            . " - Total Ujian: " . (($result['totalUjianAutoGrading'] ?? 0) + ($result['totalUjianManualGrading'] ?? 0))
            . " - Total Visi Misi: " . ($result['totalVisiMisi'] ?? 0)
            . " - Total Kontrak Kuliah: " . ($result['totalKontrakKuliah'] ?? 0)
            . " - Total RPS: " . ($result['totalRPS'] ?? 0)
            . " - Total Refleksi: " . ($result['totalRefleksi'] ?? 0)
            . " - Total Log Kerja: " . ($result['totalLogKerja'] ?? 0)
            . " - Total Video Pembelajaran: " . ($result['totalVideoPembelajaran'] ?? 0)
            . " - Total Kegiatan Belajar Eksternal: " . ($result['totalKegiatanBelajarEksternal'] ?? 0)
            . PHP_EOL;
    }

    file_put_contents($logFilePath, $logMessage, FILE_APPEND);
}

}
