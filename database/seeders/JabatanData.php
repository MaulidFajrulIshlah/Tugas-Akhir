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
                'nama_jabatan' => 'Dekan',
            ],
            [
                'nama_jabatan' => 'Wakil Dekan 1',
            ],
            [
                'nama_jabatan' => 'Tendik',
            ],
            [
                'nama_jabatan' => 'Kepala Prodi',
            ],
            [
                'nama_jabatan' => 'Sekretaris Prodi',
            ],
        ];

        Jabatan::insert($jabatan);
    }
}
