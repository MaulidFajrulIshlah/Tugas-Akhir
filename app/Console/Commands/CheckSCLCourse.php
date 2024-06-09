<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class CheckSCLCourse extends Command
{
    protected $signature = 'check:scl-course';
    protected $description = 'Check if multiple courses meet the SCL criteria';

    protected $courseIds = [
        954
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $apiUrl = 'https://layarstaging.yarsi.ac.id/webservice/rest/server.php';
        $queryParams = [
            'wstoken' => 'c9389cd9c850333c84db1066b5c27fc1',
            'wsfunction' => 'core_course_get_contents',
            'moodlewsrestformat' => 'json'
        ];

        $client = new Client();

        foreach ($this->courseIds as $courseId) {
            $queryParams['courseid'] = $courseId;

            try {
                $response = $client->get($apiUrl, ['query' => $queryParams]);
                $courseContents = json_decode($response->getBody()->getContents(), true);

                $pptCount = 0;
                $hasForum = false;
                $hasDescription = true;
                $hasRPSAndKontrak = false;
                $meetingCount = 0;
                $submissionCount = 0;
                $hasAutoGradedQuizWithPpt = false;

                $resourceModules = [];

                foreach ($courseContents as $section) {
                    if (isset($section['summary']) && !empty($section['summary'])) {
                        $hasDescription = true;
                    } else {
                        $hasDescription = false;
                        break;
                    }
                    if (isset($section['modules'])) {
                        foreach ($section['modules'] as $module) {
                            if (isset($module['modname']) && $module['modname'] === 'forum') {
                                $meetingCount++;
                                $hasForum = true;
                            }
                            if (isset($module['modname']) && $module['modname'] === 'assign') {
                                $submissionCount++;
                            }
                            if (isset($module['modname']) && $module['modname'] === 'resource') {
                                $resourceModules[$module['id']] = $module;
                                if (isset($module['contents'])) {
                                    foreach ($module['contents'] as $content) {
                                        if (
                                            isset($content['filename']) &&
                                            (str_ends_with($content['filename'], '.ppt') || str_ends_with($content['filename'], '.pptx'))
                                        ) {
                                            $pptCount++;
                                        }
                                    }
                                }
                            }
                            if (
                                (isset($module['modname']) && $module['modname'] === 'resource' && $module['name'] === 'Rencana Pembelajaran Semester (RPS)') ||
                                (isset($module['modname']) && $module['modname'] === 'choice' && $module['name'] === 'Kontrak Kuliah')
                            ) {
                                $hasRPSAndKontrak = true;
                            }
                            if (isset($module['modname']) && $module['modname'] === 'quiz') {
                                if (isset($module['completiondata']['details'])) {
                                    foreach ($module['completiondata']['details'] as $detail) {
                                        if (isset($detail['rulename']) && ($detail['rulename'] === 'completionusegrade' || $detail['rulename'] === 'completionpassgrade')) {
                                            if (isset($module['availabilityinfo'])) {
                                                preg_match('/href="[^"]*id=(\d+)"/', $module['availabilityinfo'], $matches);
                                                if (isset($matches[1]) && isset($resourceModules[$matches[1]])) {
                                                    $linkedResource = $resourceModules[$matches[1]];
                                                    if (isset($linkedResource['contents'])) {
                                                        foreach ($linkedResource['contents'] as $content) {
                                                            if (
                                                                isset($content['filename']) &&
                                                                (str_ends_with($content['filename'], '.ppt') || str_ends_with($content['filename'], '.pptx'))
                                                            ) {
                                                                $hasAutoGradedQuizWithPpt = true;
                                                                break 3;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                if ($meetingCount >= 8 && $submissionCount >= 2) {
                    $this->info("Course ID $courseId: Memenuhi kriteria minimal delapan pertemuan dengan dua aktivitas pengumpulan");
                } else {
                    $this->error("Course ID $courseId: Tidak memenuhi kriteria minimal delapan pertemuan dengan dua aktivitas pengumpulan");
                }

                if ($hasForum) {
                    $this->info("Course ID $courseId: Memiliki kriteria Forum diskusi");
                } else {
                    $this->error("Course ID $courseId: Tidak Memiliki kriteria Forum diskusi");
                }

                if ($pptCount >= 10) {
                    $this->info("Course ID $courseId: Memiliki minimal 10 kegiatan belajar mengunduh PPT");
                } else {
                    $this->error("Course ID $courseId: Tidak Memiliki minimal 10 kegiatan belajar mengunduh PPT");
                }

                if ($hasDescription) {
                    $this->info("Course ID $courseId: Setiap kegiatan belajar memiliki deskripsi");
                } else {
                    $this->error("Course ID $courseId: Tidak Setiap kegiatan belajar memiliki deskripsi");
                }

                if ($hasRPSAndKontrak) {
                    $this->info("Course ID $courseId: Memiliki RPS dan kontrak yang ditandatangani secara digital oleh peserta kuliah");
                } else {
                    $this->error("Course ID $courseId: Tidak memiliki RPS dan kontrak yang ditandatangani secara digital oleh peserta kuliah");
                }

                if ($hasAutoGradedQuizWithPpt) {
                    $this->info("Course ID $courseId: Memiliki latihan berbasis kuis-auto-grading yang memerlukan unduhan PPT");
                } else {
                    $this->error("Course ID $courseId: Tidak memiliki latihan berbasis kuis-auto-grading yang memerlukan unduhan PPT");
                }
            } catch (\Exception $e) {
                $this->error("Course ID $courseId: Error fetching data - " . $e->getMessage());
            }
        }
    }
}
