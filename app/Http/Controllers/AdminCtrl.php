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






class AdminCtrl extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(Request $request)
    {
       

    }

    function index(){
          return view('admin.admin');
    }

   

    



 function role(){
     $data=Admin::orderBy('id','asc')->get();
     return view('admin.r_role_data',[
         'data' =>$data
     ]);
 }

  function role_edit($id){
     $data_user=Admin::where('id',$id)->first();
     $data=Admin::orderBy('id','asc')->get();

     return view('admin.r_role_data',[
         'data' =>$data,
         'd_user' =>$data_user
     ]);
 }

  function role_update(Request $request){
    $request->validate([
         'username' => 'required',
         'password' => 'required',
         'role' => 'required',
    ]);
    $cek_admin=Admin::where('level',1)->count();
    $cek_kapus=Admin::where('level',2)->count();


    if($cek_admin < 3 || $cek_kapus < 1 ){
        if($request->role == 1){
            Admin::insert([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level' => 1,
                'status' => 1,
            ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

         }elseif($request->role == 2){
        Admin::insert([
             'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 2,
            'status' => 1
        ]);
     return redirect('/dashboard/role/data')->with('alert-success','data telah berhasil ditambahkan');

    }
    }else{

     return redirect('/dashboard/role/data')->with('alert-success','maaf data sudah maksimal');

    }
    
 }

 function role_delete($id){
     Admin::where('id',$id)->delete();
     return redirect('/dashboard/role/data')->with('alert-success','Data telah terhapus');

 }



 function pengaturan(){
     $username= Session::get('adm_username');
    $data= Admin::where('username',$username)->first();
    return view('admin.pengaturan',[
        'data'=> $data
    ]);

 }

  function pengaturan_update(Request $request){
     $username= Session::get('adm_username');
   
     if($request->password == ""){
        return redirect('/dashboard')->with('alert-success','Tidak Ada perubahan');
     }else{
         Admin::where('level','1')->update([
             'password' =>bcrypt($request->password)
         ]);
        return redirect('/dashboard/pengaturan/data')->with('alert-success','Password telah berubah');

     }

 }


// daftar mulai

function daftar(){
    $data =Daftar::orderBy('id','desc')->get();

    return view('admin.daftar_data',[
        'data' => $data
    ]);

}

function daftar_edit($id){
    $data =Daftar::where('id',$id)->get();
    return view('admin.daftar_edit',[
        'data' => $data
    ]);
    
}

function daftar_update(Request $request){
    $request->validate([
        'file' => 'mimes:jpeg,png,jpg,pdf|max:5048',
        'nama' => 'required'
    ]);
    $id=$request->id;

    $file =$request->file('file');


    if(empty($file)){
        Daftar::where('id',$id)->update([
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'email' =>$request->email,
            'no_hp' =>$request->no_hp,
            'deskripsi' =>$request->deskripsi,
            'website' =>$request->website,
            'pelatihan_id' =>$request->pelatihan_id,
            'jenis' =>$request->jenis,
            'tempat' =>$request->tempat,
        ]);
        return redirect('/dashboard/daftar/data')->with('alert-success','Data berubah');

    }else{
        $nf_file = rand(10000,99999)."_".rand(1000,9999).".".$file->getClientOriginalExtension();
        $tujuan_upload = 'upload';
    
        $file->move($tujuan_upload,$nf_file);
        Daftar::where('id',$id)->update([
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'email' =>$request->email,
            'no_hp' =>$request->no_hp,
            'deskripsi' =>$request->deskripsi,
            'website' =>$request->website,
            'pelatihan_id' =>$request->pelatihan_id,
            'jenis' =>$request->jenis,
            'tempat' =>$request->tempat,
            'file' =>$nf_file,
        ]);
        return redirect('/dashboard/daftar/data')->with('alert-success','Data berubah');

    }


}

function daftar_delete($id){
    $daftar=Daftar::where('id',$id)->first();
    
    $bukti=Transaksi::where('invoice',$daftar->invoice)->first();
    File::delete('upload'.$bukti->bukti);
    Transaksi::where('id',$bukti->id)->delete();

    Daftar::where('id',$id)->delete();
    File::delete('upload'.$daftar->file);


    return redirect('/dashboard/daftar/data')->with('alert-success','data telah berhasil dihapus');

}


//  pelatihan mulai

 function pelatihan(){
    $data=Pelatihan::orderBy('id','desc')->get();
    return view('admin.latih',[
        'data'=>$data
    ]);   
 }

 function pelatihan_act(Request $request){
    $request->validate([
        'nama' => 'required'
    ]);

     DB::table('pelatihan')->insert([
     'nama' => $request->nama,
     'harga' => $request->harga,
     'status' => $request->status,
  
    ]);
    return redirect('/dashboard/pelatihan/data')->with('alert-success','Data Berhasil disimpan');

 }

 function pelatihan_edit($id){
    $data=Pelatihan::where('id',$id)->get();
    $data_table=Pelatihan::orderBy('id','desc')->get();

    return view('admin.latih_edit',[
        'data_latih' =>$data,
        'data' => $data_table
    ]);  
 }

 function pelatihan_update(Request $request){
    $request->validate([
        'nama' => 'required'
    ]);
    $id=$request->id;
     DB::table('pelatihan')->where('id',$id)->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'status' => $request->status,
    
    ]);
    return redirect('/dashboard/pelatihan/data')->with('alert-success','Data Berhasil disimpan');

 }

 function pelatihan_delete($id){
    Pelatihan::where('id',$id)->delete();
    return redirect('/dashboard/pelatihan/data')->with('alert-success','Data telah terhapus');

}



// jadwal mulai

function jadwal(){
    $data=Jadwal::orderBy('id','desc')->get();
    return view('admin.jadwal',[
        'data'=>$data
    ]);   
 }

 function jadwal_act(Request $request){
    $request->validate([
        'nama' => 'required'
    ]);

     DB::table('jadwal')->insert([
     'nama' => $request->nama,
     'pelatihan_id' => $request->pelatihan_id,
     'kuota' => $request->kuota,
     'jadwal_awal' => $request->jadwal_awal,
     'jadwal_akhir' => $request->jadwal_akhir,
     'status' => $request->status,
  
    ]);
    return redirect('/dashboard/jadwal/data')->with('alert-success','Data Berhasil disimpan');

 }

 function jadwal_edit($id){
    $data=Jadwal::orderBy('id','desc')->get();
    $data_table=Jadwal::where('id',$id)->get();

    return view('admin.jadwal_edit',[
        'data' =>$data,
        'data_jadwal' => $data_table
    ]);  
 }

 function jadwal_update(Request $request){
    $request->validate([
        'nama' => 'required'
    ]);
    $id=$request->id;
     DB::table('jadwal')->where('id',$id)->update([
        'nama' => $request->nama,
        'pelatihan_id' => $request->pelatihan_id,
        'kuota' => $request->kuota,
        'jadwal_awal' => $request->jadwal_awal,
        'jadwal_akhir' => $request->jadwal_akhir,
        'status' => $request->status,
    
    ]);
    return redirect('/dashboard/jadwal/data')->with('alert-success','Data Berhasil disimpan');

 }


 function jadwal_delete($id){
    Jadwal::where('id',$id)->delete();
    return redirect('/dashboard/jadwal/data')->with('alert-success','Data telah terhapus');

}

//  akhir jadwal


// bayar mulai
    function bayar(){
        $data= Transaksi::where('status_bayar',0)->orderBy('id','desc')->get();
        return view('admin.bayar_data',[
            'data' =>$data
        ]);

    }



    function bayar_edit($id){
        $data= Transaksi::where('id',$id)->get();
        return view('admin.bayar_edit',[
            'data' =>$data
        ]);
    }

    function bayar_update(Request $request){
        $request->validate([
			'id' => 'required',
        ]);
        $id=$request->id;

        $tr= Transaksi::where('id',$id)->first();
        $daftar= Daftar::where('id',$tr->daftar_id)->first();

        if($request->status == "accept"){
            
            Daftar::where('id',$daftar->id)->update([
                'status' => 1
            ]);

            Transaksi::where('id',$id)->update([
                'status_bayar' => 1,
                'status' => 1,
            ]);
            return redirect('/dashboard/bayar/data')->with('alert-success','Data telah diupdate');


        }elseif($request->status == "reject"){
            Daftar::where('id',$daftar->id)->update([
                'status' => 2
            ]);

            Transaksi::where('id',$id)->update([
                'status_bayar' => 2,
                'status' => 2,
            ]);
            return redirect('/dashboard/bayar/data')->with('alert-success','Data telah diupdate');

        }

    }

    
function bayar_delete($id){
    
    $bukti=Transaksi::where('id',$id)->first();
    File::delete('upload'.$bukti->bukti);
    Transaksi::where('id',$bukti->id)->delete();

    return redirect('/dashboard/bayar/data')->with('alert-success','data telah berhasil dihapus');
}


// end bayar


// start transaksi
function transaksi(){
    $data= Transaksi::orderBy('id','desc')->get();
    return view('admin.transaksi_data',[
        'data' =>$data
    ]);

}

function transaksi_delete($id){
    
    $bukti=Transaksi::where('id',$id)->first();
    File::delete('upload'.$bukti->bukti);
    Transaksi::where('id',$bukti->id)->delete();

    return redirect('/dashboard/transaksi/data')->with('alert-success','data telah berhasil dihapus');
}


// end transaksi

function cetak_transaksi(Request $request){
    $dari =$request->dari;
    $sampai =$request->sampai;  

    $fdari=format_tanggal(date('Y-m-d',strtotime($dari)));
    $fsampai=format_tanggal(date('Y-m-d',strtotime($sampai)));

    $cek_data=DB::table('transaksi')
            ->where('status',1)
            ->whereBetween('tgl', [$dari, $sampai])
            ->orderBy('tgl','desc')
            ->get();

    if(count($cek_data) < 1){
         return redirect()->back();
    }
            
    return view('cetak.cetak_transaksi',[
        'data' =>$cek_data,
        'dari' => $fdari,
        'sampai' => $fsampai,
    ]);

}





}
