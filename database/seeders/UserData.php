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
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('12345'),
                'role' => 'Admin',
            ],
            [
                'nama' => 'Dekanat Fakultas',
                'username' => 'dekanat',
                'password' => bcrypt('12345'),
                'role' => 'Dekanat',
            ],
            [
                'nama' => 'Prodi',
                'username' => 'prodi',
                'password' => bcrypt('12345'),
                'role' => 'Prodi',
            ],
            [
                'nama' => 'Tendik',
                'username' => 'tendik',
                'password' => bcrypt('12345'),
                'role' => 'Tendik',
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
