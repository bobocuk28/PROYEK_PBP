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
        Schema::create('pengampuan', function (Blueprint $table) {
            $table->string('kode_mk')->primary();
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah');
            $table->string('nip');
            $table->foreign('nip')->references('nip')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengampuan');
    }
};
