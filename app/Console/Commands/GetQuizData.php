<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetQuizData extends Command
{
    protected $signature = 'quiz:getdata {prodi=Teknik Informatika}';
    protected $description = 'Get total quiz data from API';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $prodi = $this->argument('prodi');

        // Mapping prodi to course IDs
        $courseMapping = [
            'Teknik Informatika' => [578, 670],
            'Perpustakaan dan Sains Informasi' => [582, 676],
            'Manajemen' => [600, 653],
            'Akuntasi' => [605, 677],
            'Hukum' => [671, 590],
            'Psikolog' => [652, 580],
        ];

        $selectedCourseIds = $courseMapping[$prodi] ?? [];

        if (empty($selectedCourseIds)) {
            $this->error('Invalid prodi selected.');
            return 0; // Return 0 for error
        }

        $allQuizzes = [];

        foreach ($selectedCourseIds as $courseId) {
            // Panggil API untuk mendapatkan data kuis
            $response = Http::get('https://layar.yarsi.ac.id/webservice/rest/server.php', [
                'wstoken' => '7806baea3070ce31a56406264a241c4a',
                'wsfunction' => 'mod_quiz_get_quizzes_by_courses',
                'moodlewsrestformat' => 'json',
                'courseids[0]' => $courseId,
            ]);

            // Cek jika request berhasil
            if ($response->successful()) {
                $quizData = json_decode($response->body());

                // Gabungkan data kuis ke dalam array semua kuis
                if (isset($quizData->quizzes)) {
                    $allQuizzes = array_merge($allQuizzes, $quizData->quizzes);
                }
            } else {
                // Jika request gagal, tampilkan pesan error
                $this->error('Failed to fetch data for course ID ' . $courseId . '. Status code: ' . $response->status());
            }
        }

        // Hitung total quiz dari semua data kuis yang telah digabungkan
        $totalQuiz = count($allQuizzes);

        // Tampilkan total quiz
        $this->info('Total quiz for ' . $prodi . ': ' . $totalQuiz);

        // Return total quiz for use in controller
        return $totalQuiz;
    }
}
