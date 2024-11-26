<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dosen')->insert([
            [
                'user_id' => null,
                'nip' => '123456',
                'role' => 'dekan',
                'id_fakultas' => 1,
                'id_prodi' => 1,
                'periode_mulai' => 2020,
                'periode_selesai' => 2024,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => null,
                'nip' => '654321',
                'role' => 'pembimbing_akademik',
                'id_fakultas' => 2,
                'id_prodi' => 2,
                'periode_mulai' => 2021,
                'periode_selesai' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
