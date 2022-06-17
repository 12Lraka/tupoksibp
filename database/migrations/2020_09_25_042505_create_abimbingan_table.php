<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbimbinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abimbingan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('putusan');
            $table->string('registrasi');
            $table->string('inisial_nama');
            $table->string('nama_petugas');
            $table->string('bimbingan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abimbingan');
    }
}
