<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('isi_komentar')->nullable();
            $table->unsignedBigInteger('destinasi_wisata_id');
            $table->timestamps();

            // Set foreign key constraint
            $table->foreign('destinasi_wisata_id')->references('id')->on('destinasi_wisata')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
