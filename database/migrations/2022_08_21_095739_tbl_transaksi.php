<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('transaksi')) {
            Schema::create('transaksi', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('siswa_id')->nullable();
                $table->text('nilai_id')->nullable();
                $table->text('bukti')->nullable();
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
        Schema::dropIfExists('transaksi');

    }
}
