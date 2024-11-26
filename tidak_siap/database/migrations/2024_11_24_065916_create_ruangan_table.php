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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id('id_ruang');
            $table->string('nama_ruang', 50);
            $table->integer('kapasitas');
            $table->unsignedBigInteger('id_fakultas');
            $table->foreign('id_fakultas')->references('id_fakultas')->on('fakultas')->onDelete('cascade');
            $table->unsignedBigInteger('id_prodi');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }    
};
