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
        ];

        Jabatan::insert($jabatan);
    }
}
