<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            [
                'kode_mk' => 'IF101',
                'nama_mk' => 'Pengantar Informatika',
                'sks' => 3,
                'semester' => 1,
                'prasyarat' => null,
                'tipe' => 'wajib',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_mk' => 'IF102',
                'nama_mk' => 'Pemrograman Dasar',
                'sks' => 4,
                'semester' => 2,
                'prasyarat' => 'IF101',
                'tipe' => 'wajib',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
