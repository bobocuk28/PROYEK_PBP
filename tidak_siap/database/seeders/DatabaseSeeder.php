<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            FakultasSeeder::class,
            AkademikSeeder::class,
            ProgramStudiSeeder::class,
            DosenSeeder::class,
            RuanganSeeder::class,
            MataKuliahSeeder::class,
            JadwalSeeder::class,
            KelasSeeder::class,
            MahasiswaSeeder::class,
            IrsSeeder::class,
        ]);
    }
}
