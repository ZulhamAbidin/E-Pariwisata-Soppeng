<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('destinasi_kuliner', function (Blueprint $table) {
            $table->float('rating')->default(0); // Menambahkan kolom rating dengan nilai default 0
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinasi_kuliner', function (Blueprint $table) {
            $table->dropColumn('rating'); // Menghapus kolom rating saat rollback migrasi
        });
    }
};

