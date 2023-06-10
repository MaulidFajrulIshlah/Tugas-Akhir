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
                'nama_fakultas' => 'FK',
            ],
            [
                'nama_fakultas' => 'FKG',
            ],
            [
                'nama_fakultas' => 'FTI',
            ],
            [
                'nama_fakultas' => 'FEB',
            ],
            [
                'nama_fakultas' => 'FH',
            ],
            [
                'nama_fakultas' => 'FPsi',
            ],
        ];

        Fakultas::insert($fakultas);
    }
}
