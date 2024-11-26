<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('program_studi')->insert([
            ['id_prodi' => 1, 'nama_prodi' => 'Informatika', 'id_fakultas' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 2, 'nama_prodi' => 'Sistem Informasi', 'id_fakultas' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
