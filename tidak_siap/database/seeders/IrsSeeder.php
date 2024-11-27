<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class IrsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('irs')->insert([
            [
                'id_irs' => 1,
                'nim' => '24060122100000',
                'tahun_akademik' => '2023/2024',
                'semester' => 1,
                'status_pengesahan' => 'disetujui',
                'id_kelas' => 1,
                'nilai' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
