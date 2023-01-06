<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('jadwal')) {
            Schema::create('jadwal', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('nama');
                $table->text('pelatihan_id')->nullable();
                $table->text('kuota')->nullable();
                $table->dateTime('jadwal_awal')->nullable();
                $table->dateTime('jadwal_akhir')->nullable();
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
        Schema::dropIfExists('jadwal');
    }
}
