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
            $table->string('kode_mk');
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah');
            $table->string('nip');
            $table->foreign('nip')->references('nip')->on('dosen');
            $table->primary(['kode_mk', 'nip']);
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
