<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID Fakultas dari terkecil-terbesar
        $id_fakultas_1 = Fakultas::orderBy('id', 'asc')->first()->id;

        // data prodi fakultas 1
        $prodi_fakultas_1 = [
            [
                'nama_prodi' => 'Magister Kenotariatan',
                'id_fakultas' => $id_fakultas_1,
            ],
            [
                'nama_prodi' => 'Magister Manajemen',
                'id_fakultas' => $id_fakultas_1,
            ],
            [
                'nama_prodi' => 'Magister Sains Biomedis',
                'id_fakultas' => $id_fakultas_1,
            ],
            [
                'nama_prodi' => 'Magister Administrasi Rumah Sakit',
                'id_fakultas' => $id_fakultas_1,
            ],
            [
                'nama_prodi' => 'Doktor Sains Biomedis',
                'id_fakultas' => $id_fakultas_1,
            ],
        ];
        Prodi::insert($prodi_fakultas_1);

        $id_fakultas_2 = Fakultas::orderBy('id', 'asc')->skip(1)->first()->id;

        // data prodi fakultas 2
        $prodi_fakultas_2 = [
            [
                'nama_prodi' => 'Kedokteran Program Sarjana',
                'id_fakultas' => $id_fakultas_2,
            ],
            [
                'nama_prodi' => 'Pendidikan Profesi Dokter',
                'id_fakultas' => $id_fakultas_2,
            ],
        ];
        Prodi::insert($prodi_fakultas_2);

        $id_fakultas_3 = Fakultas::orderBy('id', 'asc')->skip(2)->first()->id;

        // data prodi fakultas 3
        $prodi_fakultas_3 = [
            [
                'nama_prodi' => 'Kedokteran Gigi',
                'id_fakultas' => $id_fakultas_3,
            ],
            [
                'nama_prodi' => 'Kedokteran Gigi Program Profesi',
                'id_fakultas' => $id_fakultas_3,
            ],
        ];
        Prodi::insert($prodi_fakultas_3);

        $id_fakultas_4 = Fakultas::orderBy('id', 'asc')->skip(3)->first()->id;

        // data prodi fakultas 3
        $prodi_fakultas_4 = [
            [
                'nama_prodi' => 'Teknik Informatika',
                'id_fakultas' => $id_fakultas_4,
            ],
            [
                'nama_prodi' => 'Ilmu Perpustakaan',
                'id_fakultas' => $id_fakultas_4,
            ],
        ];
        Prodi::insert($prodi_fakultas_4);

        $id_fakultas_5 = Fakultas::orderBy('id', 'asc')->skip(4)->first()->id;

        // data prodi fakultas 3
        $prodi_fakultas_5 = [
            [
                'nama_prodi' => 'Manajemen',
                'id_fakultas' => $id_fakultas_5,
            ],
            [
                'nama_prodi' => 'Akuntansi',
                'id_fakultas' => $id_fakultas_5,
            ],
        ];
        Prodi::insert($prodi_fakultas_5);

        $id_fakultas_6 = Fakultas::orderBy('id', 'asc')->skip(5)->first()->id;

        // data prodi fakultas 3
        $prodi_fakultas_6 = [
            [
                'nama_prodi' => 'Hukum',
                'id_fakultas' => $id_fakultas_6,
            ],
        ];
        Prodi::insert($prodi_fakultas_6);


        $id_fakultas_7 = Fakultas::orderBy('id', 'asc')->skip(6)->first()->id;

        // data prodi fakultas 3
        $prodi_fakultas_7 = [
            [
                'nama_prodi' => 'Psikologi',
                'id_fakultas' => $id_fakultas_7,
            ],
        ];
        Prodi::insert($prodi_fakultas_7);
    }
}
