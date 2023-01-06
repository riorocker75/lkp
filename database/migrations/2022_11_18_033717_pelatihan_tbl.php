<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PelatihanTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pelatihan')) {
            Schema::create('pelatihan', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('nama');
                $table->text('harga')->nullable();
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
       Schema::dropIfExists('pelatihan');
    }
}
