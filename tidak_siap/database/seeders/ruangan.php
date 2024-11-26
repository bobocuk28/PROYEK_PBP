<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ruangan')->insert([
            [
                'id_ruang' => 1,
                'nama_ruang' => 'Ruang A1',
                'kapasitas' => 40,
                'id_fakultas' => 1,
                'id_prodi' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_ruang' => 2,
                'nama_ruang' => 'Ruang B2',
                'kapasitas' => 30,
                'id_fakultas' => 2,
                'id_prodi' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
