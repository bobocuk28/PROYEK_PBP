<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fakultas')->insert([
            ['id_fakultas' => 1, 'nama_fakultas' => 'Teknik', 'created_at' => now(), 'updated_at' => now()],
            ['id_fakultas' => 2, 'nama_fakultas' => 'Ekonomi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
