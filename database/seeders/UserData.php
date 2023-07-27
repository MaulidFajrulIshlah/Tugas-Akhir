<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data User
        $user = [
            [
                'username' => 'tim.dpjj',
                'password' => bcrypt('12345'),
                'id_role' => 1,
            ],
            [
                'username' => 'dekan.pascasarjana',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'dekan.fk',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 2,
            ],
            [
                'username' => 'dekan.fkg',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 3,
            ],
            [
                'username' => 'dekan.fti',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 4,
            ],
            [
                'username' => 'dekan.feb',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 5,
            ],
            [
                'username' => 'dekan.fh',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 6,
            ],
            [
                'username' => 'dekan.psi',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 7,
            ],
            [
                'username' => 'wadek1.pascasarjana',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'wadek1.fk',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 2,
            ],
            [
                'username' => 'wadek1.fkg',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 3,
            ],
            [
                'username' => 'wadek1.fti',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 4,
            ],
            [
                'username' => 'wadek1.feb',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 5,
            ],
            [
                'username' => 'wadek1.fh',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 6,
            ],
            [
                'username' => 'wadek1.psi',
                'password' => bcrypt('12345'),
                'id_role' => 2,
                'id_fakultas' => 7,
            ],
            [
                'username' => 'tendik.pascasarjana',
                'password' => bcrypt('12345'),
                'id_role' => 3,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'tendik.fk',
                'password' => bcrypt('12345'),
                'id_role' => 3,
                'id_fakultas' => 2,
            ],
            [
                'username' => 'tendik.fkg',
                'password' => bcrypt('12345'),
                'id_role' => 3,
                'id_fakultas' => 3,
            ],
            [
                'username' => 'tendik.ti',
                'password' => bcrypt('12345'),
                'id_role' => 3,
                'id_fakultas' => 4,
            ],
            [
                'username' => 'tendik.feb',
                'password' => bcrypt('12345'),
                'id_role' => 3,
                'id_fakultas' => 5,
            ],
            [
                'username' => 'tendik.fh',
                'password' => bcrypt('12345'),
                'id_role' => 3,
                'id_fakultas' => 6,
            ],
            [
                'username' => 'tendik.psi',
                'password' => bcrypt('12345'),
                'id_role' => 3,
                'id_fakultas' => 7,
            ],
            [
                'username' => 'kaprodi.mk',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'kaprodi.mm',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'kaprodi.msb',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'kaprodi.mars',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'kaprodi.dsb',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'kaprodi.fk',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 2,
            ],
            [
                'username' => 'kaprodi.fkp',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 2,
            ],
            [
                'username' => 'kaprodi.fkg',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 3,
            ],
            [
                'username' => 'kaprodi.fkgp',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 3,
            ],
            [
                'username' => 'kaprodi.ti',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 4,
            ],
            [
                'username' => 'kaprodi.ip',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 4,
            ],
            [
                'username' => 'kaprodi.mnj',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 5,
            ],
            [
                'username' => 'kaprodi.akn',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 5,
            ],
            [
                'username' => 'kaprodi.fh',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 6,
            ],
            [
                'username' => 'kaprodi.psi',
                'password' => bcrypt('12345'),
                'id_role' => 4,
                'id_fakultas' => 7,
            ],
            [
                'username' => 'sekprodi.mk',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'sekprodi.mm',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'sekprodi.msb',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'sekprodi.mars',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'sekprodi.mars',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 1,
            ],
            [
                'username' => 'sekprodi.fk',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 2,
            ],
            [
                'username' => 'sekprodi.fk',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 2,
            ],
            [
                'username' => 'sekprodi.fkg',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 3,
            ],
            [
                'username' => 'sekprodi.fkg',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 3,
            ],
            [
                'username' => 'sekprodi.ti',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 4,
            ],
            [
                'username' => 'sekprodi.ip',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 4,
            ],
            [
                'username' => 'sekprodi.mnj',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 5,
            ],
            [
                'username' => 'sekprodi.akn',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 5,
            ],
            [
                'username' => 'sekprodi.fh',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 6,
            ],
            [
                'username' => 'sekprodi.psi',
                'password' => bcrypt('12345'),
                'id_role' => 5,
                'id_fakultas' => 7,
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
