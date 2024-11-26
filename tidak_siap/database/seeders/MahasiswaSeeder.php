<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'user_id' => 1,
                'nim' => '24060122100000',
                'nama' => 'Budi Widodo',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2002-10-10',
                'alamat' => 'Jl. Contoh No. 123',
                'no_telepon' => '081234567890',
                'email' => 'budi@example.com',
                'id_prodi' => 1,
                'angkatan' => 2022,
                'status' => 'aktif',
                'wali_akademik_id' => '12345678910',
                'id_kelas' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
