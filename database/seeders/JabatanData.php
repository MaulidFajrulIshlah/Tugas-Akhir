<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data jabatan
        $jabatan = [
            [
                'nama_jabatan' => 'Admin',
            ],
            [
                'nama_jabatan' => 'Dekan Fakultas Pascasarjana',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1 Fakultas Pascasarjana',
            ],
            [
                'nama_jabatan' => 'Dekan Fakultas Kedokteran',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1 Fakultas Kedokteran',
            ],
            [
                'nama_jabatan' => 'Dekan Fakultas Kedokteran Gigi',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1 Fakultas Kedokteran Gigi',
            ],
            [
                'nama_jabatan' => 'Dekan Fakultas Teknologi Informasi',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1 Fakultas Teknologi Informasi',
            ],
            [
                'nama_jabatan' => 'Dekan Fakultas Ekonomi dan Bisnis',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1 Fakultas Ekonomi dan Bisnis',
            ],
            [
                'nama_jabatan' => 'Dekan Fakultas Hukum',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1 Fakultas Hukum',
            ],
            [
                'nama_jabatan' => 'Dekan Fakultas Psikologi',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1 Fakultas Psikologi',
            ],
            [
                'nama_jabatan' => 'Tendik Fakultas Pascasarjana',
            ],
            [
                'nama_jabatan' => 'Tendik Fakultas Kedokteran',
            ],
            [
                'nama_jabatan' => 'Tendik Fakultas Kedokteran Gigi',
            ],
            [
                'nama_jabatan' => 'Tendik Fakultas Teknologi Informasi',
            ],
            [
                'nama_jabatan' => 'Tendik Fakultas Ekonomi dan Bisnis',
            ],
            [
                'nama_jabatan' => 'Tendik Fakultas Hukum',
            ],
            [
                'nama_jabatan' => 'Tendik Fakultas Psikologi',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Magister Kenotariatan',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Magister Kenotariatan',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Magister Manajemen',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Magister Manajemen',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Magister Sains Biomedis',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Magister Sains Biomedis',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Magister Administrasi Rumah Sakit',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Magister Administrasi Rumah Sakit',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Doktor Sains Biomedis',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Doktor Sains Biomedis',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Kedokteran',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Kedokteran',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Pendidikan Profesi Dokter',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Pendidikan Profesi Dokter',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Kedokteran Gigi',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Kedokteran Gigi',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Kedokteran Gigi Program Profesi',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Kedokteran Gigi Program Profesi',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Teknik Informatika',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Teknik Informatika',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Ilmu Perpustakaan',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Ilmu Perpustakaan',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Manajemen',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Manajemen',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Akuntansi',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Akuntansi',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Hukum',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Hukum',
            ],
            [
                'nama_jabatan' => 'Kepala Program Studi Psikologi',
            ],
            [
                'nama_jabatan' => 'Sekretaris Program Studi Psikologi',
            ],
        ];

        Jabatan::insert($jabatan);
    }
}
