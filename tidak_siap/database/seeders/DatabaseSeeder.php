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
            FakultasSeeder::class,
            ProgramStudiSeeder::class,
            MahasiswaSeeder::class,
            AkademikSeeder::class,
            DosenSeeder::class,
            RuanganSeeder::class,
            MataKuliahSeeder::class,
            JadwalKuliahSeeder::class,
            KelasSeeder::class,
            IrsSeeder::class,
        ]);
    }
}
