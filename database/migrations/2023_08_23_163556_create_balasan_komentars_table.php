<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalasanKomentarsTable extends Migration
{
    public function up()
    {
        Schema::create('balasan_komentars', function (Blueprint $table) {
            $table->id();
            $table->text('isi_balasan');
            $table->unsignedBigInteger('komentar_id');
            $table->unsignedBigInteger('parent_komentar_id')->nullable();
            $table->timestamps();

            $table->foreign('komentar_id')->references('id')->on('komentars')->onDelete('cascade');
            $table->foreign('parent_komentar_id')->references('id')->on('komentars')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('balasan_komentars');
    }
}

