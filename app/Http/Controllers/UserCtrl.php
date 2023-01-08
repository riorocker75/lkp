<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use File;
use App\Models\User;
use App\Models\Admin;

use App\Models\Transaksi;
use App\Models\Pelatihan;
use App\Models\Jadwal;
use App\Models\Daftar;


class UserCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-kp')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }


    function index(){
        return view('kepala.kepala');
    }


    function bukti_act(Request $request){
        $request->validate([
			'bukti' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $id=$request->id;

        $daftar = Daftar::where('id',$id)->first();
        $latih= Pelatihan::where('id',$daftar->pelatihan_id)->first();


        $file =$request->file('bukti');
        $nf_file = rand(10000,99999)."_".rand(1000,9999).".".$file->getClientOriginalExtension();
        $tujuan_upload = 'upload';

        $file->move($tujuan_upload,$nf_file);

        Daftar::where('id',$id)->update([
            'status' => 0
        ]);

        Transaksi::insert([
            'daftar_id' => $id,
            'invoice' => $daftar->invoice,
            'pelatihan_id' => $daftar->pelatihan_id,
            'harga' => $latih->harga,
            'jenis' =>$daftar->jenis,
            'tempat' => $daftar->tempat,
            'tgl' => date('Y-m-d'),
            'bukti' => $nf_file,
            'status_bayar' => 0,
            'status' => 0
        ]);   
        return redirect('/dashboard/user')->with('alert-success','Kami akan segera memproses pembayaran anda');
    }


    
 function pengaturan(){
    $username= Session::get('kp_username');
   $data= Admin::where('username',$username)->first();
   return view('kepala.pengaturan',[
       'data'=> $data
   ]);

}

 function pengaturan_update(Request $request){
    $username= Session::get('kp_username');
  
    if($request->password == ""){
       return redirect('/dashboard/user')->with('alert-success','Tidak Ada perubahan');
    }else{
        Admin::where('level','2')->update([
            'password' =>bcrypt($request->password)
        ]);
       return redirect('/dashboard/user/pengaturan/data')->with('alert-success','Password telah berubah');

    }

}

}
