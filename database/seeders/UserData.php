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
                'username' => 'andreas.febrian',
                'email' => 'andreas.febrian@yarsi.ac.id',
                'id_role' => 1,
            ],
            [
                // 'name' => 'Cesario Auditya Pratama Putra',
                'username' => 'cesario.auditya',
                'email' => 'cesario.auditya@yarsi.ac.id',
                'id_role' => 1,
            ],
            [
                // 'name' => 'Penny Rahmah Fadhilah',
                'username' => 'penny.rahmah',
                'email' => 'penny.rahmah@yarsi.ac.id',
                'id_role' => 1,
            ],
            [
                // 'name' => 'Alabanyo Brebahama',
                'username' => 'alabanyo.brebahama',
                'email' => 'alabanyo.brebahama@yarsi.ac.id',
                'id_role' => 1,
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
