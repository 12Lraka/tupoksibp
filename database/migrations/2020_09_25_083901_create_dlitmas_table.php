<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDlitmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlitmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asal_permintaan');
            $table->date('tgl_surat');
            $table->string('nama_klien');
            $table->enum('jenis_litmas', ['CB', 'PB', 'CMB']);
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
        Schema::dropIfExists('dlitmas');
    }
}
