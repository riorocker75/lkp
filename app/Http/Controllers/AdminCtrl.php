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
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Transaksi;




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

    // data siswa

    function siswa(){
        $data=Siswa::orderBy('id','desc')->get();
        return view('admin.siswa_data',[
            'data'=>$data
        ]);
    }

    function siswa_add(){
        return view('admin.siswa_add');
    }
    function siswa_act(Request $request){
        $request->validate([
            'nama' => 'required'
        ]);

         $date=date('Y-m-d');

     DB::table('siswa')->insert([
        'nama' => $request->nama,
        'nis' =>$request->nis,
        'ortu' =>$request->ortu,

        'jenis_kelamin' => $request->kelamin,
        'angkatan' => $request->angkatan,

        'tgl_lhr' => $request->tgl_lhr,
        'tmp_lhr' => $request->tmp_lhr,
        'nisn' =>$request->nisn,
        'no_un' =>$request->no_un,
        'tanggal' =>$date,
        'status' => 1
    ]);
    return redirect('/dashboard/siswa/data')->with('alert-success','Data Berhasil disimpan');

    }
    function siswa_edit($id){
        $data=Siswa::where('id',$id)->get();
        return view('admin.siswa_edit',[
            'data' =>$data
        ]);
    }


    function siswa_update(Request $request){
        $request->validate([
            'nama' => 'required'
        ]);
        $id=$request->id;


        DB::table('siswa')->where('id',$id)->update([
            'nama' => $request->nama,
            'nis' =>$request->nis,
            'jenis_kelamin' => $request->kelamin,
            'angkatan' => $request->angkatan,
            'tgl_lhr' => $request->tgl_lhr,
            'tmp_lhr' => $request->tmp_lhr,
            'nisn' =>$request->nisn,
            'no_un' =>$request->no_un,
        
        ]);
        return redirect('/dashboard/siswa/data')->with('alert-success','Data Berhasil disimpan');

    }

    function siswa_delete($id){
        $bukti=Transaksi::where('siswa_id',$id)->first();
        File::delete('upload'.$bukti->bukti);
        
        Transaksi::where('siswa_id',$id)->delete();
        Nilai::where('siswa_id',$id)->delete();

        Siswa::where('id',$id)->delete();

       

        return redirect('/dashboard/siswa/data')->with('alert-success','Data Berhasil disimpan');

    }

//    data nilai

function nilai(){
    $data=Nilai::orderBy('id','desc')->get();
    return view('admin.nilai_data',[
        'data' =>$data
    ]);
}

function nilai_add(){
   return view('admin.nilai_add');
}


function nilai_act(Request $request){
    $request->validate([
        'siswa' => 'required'
    ]);

     $date=date('Y-m-d');

 DB::table('nilai')->insert([
    'siswa_id' => $request->siswa,
    'agama_raport' => $request->agama_raport,
    'agama_us' => $request->agama_us,

    'pkn_raport' => $request->pkn_raport,
    'pkn_us' => $request->pkn_us,

    'indo_raport' => $request->indo_raport,
    'indo_us' => $request->indo_us,

    'ing_raport' => $request->ing_raport,
    'ing_us' => $request->ing_us,
    'mm_raport' => $request->mm_raport,
    'mm_us' => $request->mm_us,
    'fisika_raport' => $request->fisika_raport,
    'fisika_us' => $request->fisika_us,
    'kimia_raport' => $request->kimia_raport,
    'kimia_us' => $request->kimia_us,
    'biologi_raport' => $request->biologi_raport,
    'biologi_us' => $request->biologi_us,
    'sejarah_raport' => $request->sejarah_raport,
    'sejarah_us' => $request->sejarah_us,
    'sbk_raport' => $request->sbk_raport,
    'sbk_us' => $request->sbk_us,
    'penjas_raport' => $request->penjas_raport,
    'penjas_us' => $request->penjas_us,
    'tik_raport' => $request->tik_raport,
    'tik_us' => $request->tik_us,
    'keting_raport' => $request->keting_raport,
    'keting_us' => $request->keting_us,
    'mulok1_raport' => $request->mulok1_raport,
    'mulok1_us' => $request->mulok1_us,
    'mulok2_raport' => $request->mulok2_raport,
    'mulok2_us' => $request->mulok2_us,
    'rata_raport' => $request->rata_raport,
    'rata_us' => $request->rata_us,
    'tanggal' =>$date,
    'status' => 1
]);
return redirect('/dashboard/nilai/data')->with('alert-success','Data Berhasil disimpan');


}

function nilai_edit($id){
    $data=Nilai::where('id',$id)->get();
    return view('admin.nilai_edit',[
        'data' =>$data
    ]);
}

function nilai_update(Request $request){
    $request->validate([
        'id' => 'required'
    ]);
    $id=$request->id;
     $date=date('Y-m-d');

 DB::table('nilai')->where('id',$id)->update([
    'agama_raport' => $request->agama_raport,
    'agama_us' => $request->agama_us,
    'pkn_raport' => $request->pkn_raport,
    'pkn_us' => $request->pkn_us,
    'indo_raport' => $request->indo_raport,
    'indo_us' => $request->indo_us,
    'ing_raport' => $request->ing_raport,
    'ing_us' => $request->ing_us,
    'mm_raport' => $request->mm_raport,
    'mm_us' => $request->mm_us,
    'fisika_raport' => $request->fisika_raport,
    'fisika_us' => $request->fisika_us,
    'kimia_raport' => $request->kimia_raport,
    'kimia_us' => $request->kimia_us,
    'biologi_raport' => $request->biologi_raport,
    'biologi_us' => $request->biologi_us,
    'sejarah_raport' => $request->sejarah_raport,
    'sejarah_us' => $request->sejarah_us,
    'sbk_raport' => $request->sbk_raport,
    'sbk_us' => $request->sbk_us,
    'penjas_raport' => $request->penjas_raport,
    'penjas_us' => $request->penjas_us,
    'tik_raport' => $request->tik_raport,
    'tik_us' => $request->tik_us,
    'keting_raport' => $request->keting_raport,
    'keting_us' => $request->keting_us,
    'mulok1_raport' => $request->mulok1_raport,
    'mulok1_us' => $request->mulok1_us,
    'mulok2_raport' => $request->mulok2_raport,
    'mulok2_us' => $request->mulok2_us,
    'rata_raport' => $request->rata_raport,
    'rata_us' => $request->rata_us,
]);
return redirect('/dashboard/nilai/data')->with('alert-success','Data Berhasil update');

}

function nilai_delete($id){
    Nilai::where('id',$id)->delete();
    return redirect('/dashboard/nilai/data')->with('alert-success','data telah berhasil ditambahkan');

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






}
