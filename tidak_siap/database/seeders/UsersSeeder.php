<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
                'related_id' => 1, // Misal ID mahasiswa terkait
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password456'),
                'role' => 'dosen',
                'related_id' => 2, // Misal ID dosen terkait
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Robert Brown',
                'email' => 'robertbrown@example.com',
                'password' => Hash::make('password789'),
                'role' => 'mahasiswa',
                'related_id' => null, // Tidak ada ID terkait
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Alice Green',
                'email' => 'alicegreen@example.com',
                'password' => Hash::make('passwordabc'),
                'role' => 'akademik',
                'related_id' => null, // Tidak ada ID terkait
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
