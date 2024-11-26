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
        Schema::create('dosen', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nip')->primary();
            $table->enum('role', ['pembimbing_akademik', 'ketua_prodi', 'dekan']);
            $table->unsignedBigInteger('id_fakultas');
            $table->foreign('id_fakultas')->references('id_fakultas')->on('fakultas')->onDelete('cascade');// untuk Dekan
            $table->unsignedBigInteger('id_prodi');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi')->onDelete('cascade');
            $table->year('periode_mulai')->nullable();
            $table->year('periode_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
