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

   

    function ambil(){
        $data= Transaksi::orderBy('id','desc')->get();
        return view('admin.ambil_data',[
            'data' =>$data
        ]);
    }

    function ambil_add(){
        return view('admin.ambil_add');
    }

    function ambil_act(Request $request){
        $request->validate([
			'bukti' => 'required|mimes:jpeg,png,jpg,pdf|max:2048'
        ]);

        $kode_by= "TRFP-".rand(1000,9999);
        $bukti_bayar =$request->file('bukti');
        $nf_bukti_bayar = rand(10000,99999)."_".rand(1000,9999).".".$bukti_bayar->getClientOriginalExtension();
        $tujuan_upload = 'upload';

        $bukti_bayar->move($tujuan_upload,$nf_bukti_bayar);

        Transaksi::insert([
            'siswa_id' =>$request->siswa,
            'bukti' =>$nf_bukti_bayar,
            'tanggal'=> date('Y-m-d'),
            'status' => 1 
        ]);

        return redirect('/dashboard/ambil/data')->with('alert-success','data telah berhasil ditambahkan');

    }

    function ambil_edit($id){
        $data = Transaksi::where('id',$id)->get();
        return view('admin.ambil_edit',[
            'data' =>$data
        ]);
    }

    function ambil_update(Request $request){
            $request->validate([
                'bukti' => 'required|file|image|mimes:jpeg,png,jpg,pdf|max:2048'
            ]);
    
            $kode_by= "TRFP-".rand(1000,9999);
            $bukti_bayar =$request->file('bukti');
            $nf_bukti_bayar = rand(10000,99999)."_".rand(1000,9999).".".$bukti_bayar->getClientOriginalExtension();
            $tujuan_upload = 'upload';
    
            $bukti_bayar->move($tujuan_upload,$nf_bukti_bayar);
            $id=$request->id;
            Transaksi::where('id',$id)->update([
                'bukti' =>$nf_bukti_bayar,
            ]);
    
            return redirect('/dashboard/ambil/data')->with('alert-success','data telah berhasil ditambahkan');
    
    }

    function ambil_delete($id){
        $bukti=Transaksi::where('id',$id)->first();
        File::delete('upload'.$bukti->bukti);
        Transaksi::where('id',$id)->delete();
        return redirect('/dashboard/ambil/data')->with('alert-success','data telah berhasil ditambahkan');

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







}
