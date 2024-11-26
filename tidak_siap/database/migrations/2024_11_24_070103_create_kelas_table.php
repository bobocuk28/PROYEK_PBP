<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('kode_kelas', 10)->unique(); // Misalnya: "A", "B", "C"
            $table->string('kode_mk', 10); // Mata kuliah yang terkait
            $table->unsignedBigInteger('id_jadwal'); // Jadwal mata kuliah
            $table->string('wali_kelas_id')->nullable(); // Dosen wali kelas (opsional)
            $table->timestamps();

            // Foreign keys
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal_kuliah')->onDelete('cascade');
            $table->foreign('wali_kelas_id')->references('nip')->on('dosen')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
