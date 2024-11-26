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
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('kode_mk', 10);
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->unsignedBigInteger('id_ruang'); // Ubah dari 'ruang' ke 'id_ruang'
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangan')->onDelete('cascade'); // Tambahkan foreign key
            $table->integer('kapasitas');
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
};
