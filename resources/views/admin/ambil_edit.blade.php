@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pengambilan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengambilan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              @foreach($data as $dt)
              <div class="card-body">
                <form action="{{ url('/dashboard/ambil/update') }}" method="post" enctype='multipart/form-data'>
                       @csrf  
                       @method('POST')
                <div class="row">
                 <div class="col-md-6">
                         
                    <div class="form-group">
                        <label>Nama Siswa</label>
                            @php
                                $siswa =App\Models\Siswa::where('id',$dt->siswa_id)->first();   
                            @endphp
                    <input type="text" class="form-control" value="{{$siswa->nama}} | Nisn : {{$siswa->nisn}}" readonly>
                    <input type="hidden" class="form-control" value="{{$dt->id}}"  name="id">
                       
                    </div>

                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Pengambilan</label>
                                <input type="date" class="form-control" name="tanggal" required>
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Fotocopy sebelumnya</label><br>
                                {{preview_file($dt->bukti)}}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Fotocopy Ijazah</label>
                                <input type="file" class="form-control" name="bukti" required>
                            </div>



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