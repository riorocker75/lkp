<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('daftar')) {
            Schema::create('daftar', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('nama');
                $table->text('alamat')->nullable();
                $table->text('email')->nullable();
                $table->text('no_hp')->nullable();
                $table->text('deskripsi')->nullable();
                $table->text('website')->nullable();
                $table->text('pelatihan_id')->nullable();
                $table->text('jenis')->nullable();
                $table->text('tempat')->nullable();
                $table->text('file')->nullable();
                
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
        Schema::dropIfExists('daftar');
    }
}
