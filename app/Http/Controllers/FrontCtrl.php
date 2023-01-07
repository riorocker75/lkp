<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

use App\Models\Transaksi;
use App\Models\Pelatihan;
use App\Models\Jadwal;
use App\Models\Daftar;



class FrontCtrl extends Controller
{


    public function index(){
        return view('front.index');
    }

    function daftar_act(Request $request){

    }

}
