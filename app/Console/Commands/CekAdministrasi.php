<?php


namespace App\Console\Commands;

ini_set('max_execution_time', 0);

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CekAdministrasi extends Command
{
    protected $signature = 'cek:administrasi {tahunAjaran} {prodi}';
    protected $description = 'Check courses for specific content: Visi dan Misi, Kontrak Kuliah, Rencana Pembelajaran Semester (RPS)';

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

    private $requiredElements = [
        'visiMisi' => "Visi dan Misi",
        'kontrakKuliah' => "Kontrak Kuliah",
        'rps' => "Rencana Pembelajaran Semester (RPS)"
    ];

    public function handle()
    {
        $tahunAjaran = $this->argument('tahunAjaran');
        $prodi = $this->argument('prodi');

        $results = [];
        $coursesWithAllComponents = 0;

        // Filter mata kuliah sesuai dengan tahun ajaran dan prodi yang dipilih
        $filteredCourses = $this->courseIds[$tahunAjaran][$prodi] ?? [];

        // Buat variabel untuk menyimpan nama-nama mata kuliah yang memenuhi syarat
        $courseNames = [];

        // Loop melalui hasil untuk memperoleh nama mata kuliah yang memenuhi syarat
        foreach ($filteredCourses as $courseId) {
            // Lakukan pemeriksaan administrasi untuk setiap mata kuliah yang difilter
            $result = $this->checkCourseContent($courseId);
            $results[$courseId] = $result;

            // Periksa apakah mata kuliah memiliki semua komponen yang diperlukan
            if ($result['visiMisi'] && $result['kontrakKuliah'] && $result['rps']) {
                $coursesWithAllComponents++;
                // Cek nama matkul
                $courseName = $this->getCourseName($courseId);
                $results[$courseId]['displayName'] = $courseName;
                $courseNames[] = $courseName; // Tambahkan nama mata kuliah ke dalam array $courseNames
            }
        }

        // Lakukan log hasil
        $this->logResults($results, $coursesWithAllComponents);

        // Simpan total ke dalam cache dengan waktu kedaluwarsa
        Cache::put('totalCourses', $coursesWithAllComponents, now()->addMinutes(60));

        // Simpan nama mata kuliah yang memenuhi syarat ke dalam cache dengan waktu kedaluwarsa
        Cache::put('courseNames', $courseNames, now()->addMinutes(60));
    }


    private function checkCourseContent($courseId)
    {
        $result = [
            'visiMisi' => false,
            'kontrakKuliah' => false,
            'rps' => false,
            'displayName' => ''
        ];

        // Lakukan panggilan API untuk mendapatkan konten mata kuliah
        $response = Http::get($this->apiUrl, [
            'wstoken' => $this->tokenApi,
            'wsfunction' => 'core_course_get_contents',
            'moodlewsrestformat' => 'json',
            'courseid' => $courseId,
        ]);

        // Periksa apakah panggilan API berhasil
        if ($response->successful()) {
            $data = $response->json();
            // Periksa apakah mata kuliah mengandung elemen yang diperlukan
            $result = $this->parseCourseContent($data);
        }

        return $result;
    }

    private function parseCourseContent($data)
    {
        $result = [
            'visiMisi' => false,
            'kontrakKuliah' => false,
            'rps' => false
        ];

        // Iterasi setiap bagian konten mata kuliah
        foreach ($data as $section) {
            // Periksa apakah nama bagian mengandung elemen yang diperlukan
            foreach ($this->requiredElements as $key => $element) {
                if ($this->containsElement($section['name'], $element)) {
                    $result[$key] = true;
                }
            }

            // Periksa modul di dalam bagian
            if (isset($section['modules'])) {
                foreach ($section['modules'] as $module) {
                    // Periksa apakah nama atau deskripsi modul mengandung elemen yang diperlukan
                    foreach ($this->requiredElements as $key => $element) {
                        if ($this->containsElement($module['name'], $element) || $this->containsElement($module['description'] ?? '', $element)) {
                            $result[$key] = true;
                        }
                    }
                }
            }
        }

        return $result;
    }

    private function containsElement($text, $element)
    {
        // Periksa apakah teks mengandung nama elemen
        return stripos($text, $element) !== false;
    }

    private function getCourseName($courseId)
    {
        // Panggil API untuk mendapatkan nama mata kuliah
        $response = Http::get($this->apiUrl, [
            'wstoken' => $this->tokenApi,
            'wsfunction' => 'core_course_get_courses',
            'moodlewsrestformat' => 'json',
            'options' => [
                'ids' => [$courseId]
            ]
        ]);

        if ($response->successful()) {
            $data = $response->json();
            if (!empty($data) && isset($data[0]['displayname'])) {
                return $data[0]['displayname'];
            }
        }

        return 'Unknown Course Name';
    }

    private function logResults($results, $coursesWithAllComponents)
    {
        $logFilePath = storage_path('logs/cekadministrasi.log');

        // Lakukan log hasil ke file
        foreach ($results as $courseId => $result) {
            $logMessage = "Course ID: $courseId - Display Name: " . ($result['displayName'] ?? 'Unknown') .
                " - Visi Misi: " . ($result['visiMisi'] ? 'Memiliki visi misi' : 'Tidak memiliki visi misi') .
                " - Kontrak Kuliah: " . ($result['kontrakKuliah'] ? 'Memiliki kontrak kuliah' : 'Tidak memiliki kontrak kuliah') .
                " - RPS: " . ($result['rps'] ? 'Memiliki RPS' : 'Tidak memiliki RPS') . PHP_EOL;
            file_put_contents($logFilePath, $logMessage, FILE_APPEND);
        }

        // Lakukan log jumlah total mata kuliah dengan semua komponen yang diperlukan
        file_put_contents($logFilePath, "Total courses with all components: $coursesWithAllComponents\n", FILE_APPEND);
    }
}
