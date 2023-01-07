<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transaksi')) {
            Schema::create('transaksi', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('daftar_id');
                $table->text('pelatihan_id')->nullable();
                $table->text('harga')->nullable();
                $table->text('jenis')->nullable();
                $table->text('tempat')->nullable();
                $table->dateTime('tgl')->nullable();
                $table->text('status_bayar')->nullable();
                $table->text('status')->nullable();

            }); 
        }
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
