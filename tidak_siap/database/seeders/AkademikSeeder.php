<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AkademikSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('akademik')->insert([
            [
                'user_id' => null,
                'nip' => '123456',
                'nama' => 'Dr. John Doe',
                'email' => 'johndoe@example.com',
                'id_fakultas' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => null,
                'nip' => '654321',
                'nama' => 'Dr. Jane Smith',
                'email' => 'janesmith@example.com',
                'id_fakultas' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
