<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

use App\Models\Transaksi;
use App\Models\Pelatihan;
use App\Models\Jadwal;
use App\Models\Daftar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class FrontCtrl extends Controller
{


    public function index(){
        return view('front.index');
    }

    function daftar_act(Request $request){
        $request->validate([
			'file' => 'required|mimes:jpeg,png,jpg,pdf|max:5048',
            'nama' => 'required'
        ]);

        $invoice ="INVOICE-".rand(1000,9999);
       
        $file =$request->file('file');
        $nf_file = rand(10000,99999)."_".rand(1000,9999).".".$file->getClientOriginalExtension();
        $tujuan_upload = 'upload';

        $file->move($tujuan_upload,$nf_file);

        Admin::insert([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' =>2,
            'status'=> 1
        ]);
        $userId = DB::getPdo()->lastInsertId();

        Daftar::insert([
            'nama' =>$request->nama,
            'invoice' =>$invoice,
            'alamat' =>$request->alamat,
            'email' =>$request->email,
            'no_hp' =>$request->no_hp,
            'deskripsi' =>$request->deskripsi,
            'website' =>$request->website,
            'pelatihan_id' =>$request->pelatihan_id,
            'jenis' =>$request->jenis,
            'tempat' =>$request->tempat,
            'user_id' =>$userId,
            'file' =>$nf_file,
            'tanggal'=> date('Y-m-d'),
            'status' => 0 
        ]);

        return redirect('/login')->with('alert-success','Anda telah mendaftar harap login');


    }

}
