<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelatihan;
use DB;

class PelatihanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelatihan')->delete();
        Pelatihan::create([
          'id' => 1,
          'nama' => "Teknologi Informasi",
          'harga' =>300000,
          'status'=> 1
        ]);

        Pelatihan::create([
            'id' => 2,
            'nama' => "Keuangan Dan Perbankan",
            'harga' =>400000,
            'status'=> 1
          ]);

          Pelatihan::create([
            'id' => 3,
            'nama' => "Pajak",
            'harga' =>400000,
            'status'=> 1
          ]);

          Pelatihan::create([
            'id' => 4,
            'nama' => "Akuntansi",
            'harga' =>400000,
            'status'=> 1
          ]);

          Pelatihan::create([
            'id' => 5,
            'nama' => "Outbound Training",
            'harga' =>400000,
            'status'=> 1
          ]);

          Pelatihan::create([
            'id' => 6,
            'nama' => "UMKM",
            'harga' =>400000,
            'status'=> 1
          ]);



    }
}
