<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlitmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alitmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->date('tgl_surat');
            $table->string('asal_permintaan');
            $table->string('inisal_nama');
            $table->string('jenis_litmas');
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
        Schema::dropIfExists('alitmas');
    }
}
