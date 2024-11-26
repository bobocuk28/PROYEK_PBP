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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nim', 15)->primary();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->unsignedBigInteger('id_prodi');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi')->onDelete('cascade');
            $table->year('angkatan');
            $table->enum('status', ['aktif', 'cuti', 'dropout', 'lulus'])->default('aktif');
            $table->string('wali_akademik_id');
            $table->foreign('wali_akademik_id')->references('nip')->on('dosen')->onDelete('cascade');
            $table->unsignedBigInteger('id_kelas')->nullable(); // Relasi ke tabel kelas
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
