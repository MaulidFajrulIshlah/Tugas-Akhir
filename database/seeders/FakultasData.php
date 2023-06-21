<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data fakultas
        $fakultas = [
            [
                'nama_fakultas' => 'Pascasarjana',
            ],
            [
                'nama_fakultas' => 'Fakultas Kedokteran',
            ],
            [
                'nama_fakultas' => 'Fakultas Kedokteran Gigi',
            ],
            [
                'nama_fakultas' => 'Fakultas Teknologi Informasi',
            ],
            [
                'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis',
            ],
            [
                'nama_fakultas' => 'Fakultas Hukum',
            ],
            [
                'nama_fakultas' => 'Fakultas Psikologi',
            ],
        ];

        Fakultas::insert($fakultas);
    }
}
