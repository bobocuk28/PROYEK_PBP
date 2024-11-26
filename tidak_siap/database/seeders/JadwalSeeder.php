<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JadwalKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwal_kuliah')->insert([
            [
                'id_jadwal' => 1,
                'kode_mk' => 'IF101',
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'id_ruang' => 1,
                'kapasitas' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_jadwal' => 2,
                'kode_mk' => 'IF102',
                'hari' => 'Rabu',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '12:00:00',
                'id_ruang' => 2,
                'kapasitas' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
