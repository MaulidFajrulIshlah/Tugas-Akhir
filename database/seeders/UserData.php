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
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('12345'),
                'level' => 1,
            ],
            [
                'name' => 'Dekanat Fakultas',
                'username' => 'dekanat',
                'password' => bcrypt('12345'),
                'level' => 2,
            ],
            [
                'name' => 'Prodi',
                'username' => 'prodi',
                'password' => bcrypt('12345'),
                'level' => 3,
            ],
            [
                'name' => 'Tendik',
                'username' => 'tendik',
                'password' => bcrypt('12345'),
                'level' => 4,
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
