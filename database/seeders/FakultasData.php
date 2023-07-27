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
                'nama' => 'Pascasarjana',
                'inisial' => 'Pascasarjana',
            ],
            [
                'nama' => 'Fakultas Kedokteran',
                'inisial' => 'FK',
            ],
            [
                'nama' => 'Fakultas Kedokteran Gigi',
                'inisial' => 'FKG',
            ],
            [
                'nama' => 'Fakultas Teknologi Informasi',
                'inisial' => 'FTI',
            ],
            [
                'nama' => 'Fakultas Ekonomi dan Bisnis',
                'inisial' => 'FEB',
            ],
            [
                'nama' => 'Fakultas Hukum',
                'inisial' => 'FH',
            ],
            [
                'nama' => 'Fakultas Psikologi',
                'inisial' => 'FPsi',
            ],
        ];

        Fakultas::insert($fakultas);
    }
}
