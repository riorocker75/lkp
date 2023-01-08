@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pendaftar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pendaftar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ubah Data</h3>
              </div>
              <!-- /.card-header -->
              @foreach ($data as $dt)
                  
              <div class="card-body">
                <form action="{{ url('/dashboard/daftar/update') }}" method="post" enctype="multipart/form-data">
                       @csrf  
                       @method('POST')
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="id" value="{{$dt->id}}" required>
                        
                        
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" class="form-control" name="nama" value="{{$dt->nama}}" required>
                            </div> 
                            
                            <div class="form-group">
                                <label>Alamat Instansi</label>
                                <input type="text" class="form-control" name="alamat"  value="{{$dt->alamat}}" required>
                            </div> 

                            <div class="form-group">
                                <label>Email Instansi</label>
                                <input type="email" class="form-control" name="email"  value="{{$dt->email}}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Nomor Telp. Instansi</label>
                                <input type="text" class="form-control" name="no_hp"  value="{{$dt->no_hp}}" required>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Instansi</label>
                                <input type="text" class="form-control" name="deskripsi"  value="{{$dt->deskripsi}}">
                            </div>

                            <div class="form-group">
                                <label>Website Instansi</label>
                                <input type="text" class="form-control" name="website"  value="{{$dt->website}}">
                            </div>

                            <div class="form-group">
                                <label>Bidang Pelatihan</label>
                                <select class="form-control select2" style="width: 100%;" name="pelatihan_id" required>
                                    @php
                                        $latih = App\Models\Pelatihan::orderBy('id','desc')->get();
                                        $lt= App\Models\Pelatihan::where('id',$dt->pelatihan_id)->first();
                                    @endphp
                                        <option selected value="{{$lt->id}}">{{$lt->nama}}</option>
                                    @foreach ($latih as $lt)
                                        <option  value="{{$lt->id}}">{{$lt->nama}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jenis Pelatihan</label>
                                <select class="form-control select2" style="width: 100%;" name="jenis" required>
                  
                                    <option selected value="{{$dt->jenis}}">{{jenis_latih($dt->jenis)}}</option>
                                    <option  value="1">Daring (Tatap Muka Virtual)</option>
                                    <option  value="2">Luring (Tatap Muka Langsung)</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tempat Pelatihan</label>
                                <select class="form-control select2" style="width: 100%;" name="tempat" required>
                                    <option selected value="{{$dt->tempat}}">{{tempat_latih($dt->tempat)}}</option>
                                    <option  value="1">LKP Langkat</option>
                                    <option  value="2">In House Training</option>
                                </select>
                            </div>

                            <div class="form-group dukung" style="display:none">
                                <label>File Pendukung</label> <br>
                                <input type="file" name="file" >
                                <br>
                                <span style="font-size:12px;color:#000">Ijazah, CV, Rekomendasi Atasan, Fotocopy pendukung lainya </span>
                                <br>
                                <span style="font-size:10px;color:red">*format yang diterima pdf</span>
                            </div>

                            <div class="v_dukung" style="display:block">
                                {{preview_file($dt->file)}}
                               
                            </div>
                            <br>
                            <a class="btn btn-primary ubah">Ubah File Lama</a>

                            <script>
                                $('.ubah').click(function (e) { 
                                   $('.dukung').show();
                                   $('.v_dukung').hide();
                                   $('.ubah').hide();
                                });

                            </script>
                          

                    </div>

                 
                 
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Ubah </button>
                 
                 </form>

              </div>
              @endforeach

              <!-- /.card-body -->
      </section>   

</div>  


@endsection