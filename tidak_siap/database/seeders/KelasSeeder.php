<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'id_kelas' => 1,
                'kode_kelas' => 'A',
                'kode_mk' => 'IF101',
                'id_jadwal' => 1,
                'wali_kelas_id' => '123456',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_kelas' => 2,
                'kode_kelas' => 'B',
                'kode_mk' => 'IF102',
                'id_jadwal' => 2,
                'wali_kelas_id' => '654321',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
