<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('siswa')) {
            Schema::create('siswa', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('nama');
                $table->text('jenis_kelamin')->nullable();
                $table->text('nis')->nullable();
                $table->text('ortu')->nullable();

                $table->text('tmp_lhr')->nullable();
                $table->dateTime('tgl_lhr')->nullable();
                $table->text('nisn')->nullable();
                $table->text('no_un')->nullable();
                $table->text('angkatan')->nullable();
                $table->dateTime('tanggal')->nullable();
                $table->text('status')->nullable();
        
            });
        };
        
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
        
    }
}
