<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('HargaTiket')->nullable();
            $table->string('FasilitasDestinasi')->nullable();
            $table->string('JamBuka')->nullable();
            $table->text('Deskripsi')->nullable();
            $table->text('Sejarah')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('MenuKuliner')->nullable();
            $table->string('sampul')->nullable(); // Kolom untuk menyimpan path gambar sampul
            $table->string('gambar')->nullable(); // Kolom untuk menyimpan path gambar
            $table->string('kategori'); // Kolom untuk menyimpan kategori (misalnya: hotel, kebudayaan, kuliner, destinasi wisata)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi');
    }
};
