<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel sessions.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Kolom id untuk session
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Kolom user_id yang berhubungan dengan tabel users
            $table->ipAddress('ip_address'); // Kolom ip_address untuk menyimpan IP pengguna
            $table->text('user_agent'); // Kolom user_agent untuk menyimpan informasi browser
            $table->longText('payload'); // Kolom payload untuk menyimpan data session
            $table->integer('last_activity'); // Kolom last_activity untuk menyimpan timestamp aktivitas terakhir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrasi untuk menghapus tabel sessions.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
