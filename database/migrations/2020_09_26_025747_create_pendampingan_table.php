<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendampinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendampingan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->string('asal_surat');
            $table->string('inisial_nama');
            $table->string('nama_petugas');
            $table->string('proses');
            $table->date('selesai')->nullable();
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
        Schema::dropIfExists('pendampingan');
    }
}
