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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('kode_mk', 10)->primary();
            $table->string('nama_mk', 100);
            $table->integer('sks');
            $table->integer('semester');
            $table->string('prasyarat', 10)->nullable();
            $table->enum('tipe', ['wajib', 'pilihan'])->default('wajib');
            $table->foreign('prasyarat')->references('kode_mk')->on('mata_kuliah')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
