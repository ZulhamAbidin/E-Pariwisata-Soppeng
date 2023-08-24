<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('balasan_komentars', function (Blueprint $table) {
            $table->string('nama'); // Tambahkan kolom "nama" dengan tipe data string
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balasan_komentars', function (Blueprint $table) {
            //
        });
    }
};
