<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data role
        $role = [
            [
                'nama' => 'Tim DPJJ',
            ],
            [
                'nama' => 'Dekanat Fakultas',
            ],
            [
                'nama' => 'Tendik',
            ],
            [
                'nama' => 'Kaprodi',
            ],
            [
                'nama' => 'Sekprodi',
            ],
        ];
        Role::insert($role);
    }
}
