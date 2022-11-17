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
              <div class="card-body">
                <form action="{{ url('/dashboard/ambil/act') }}" method="post" enctype="multipart/form-data">
                       @csrf  
                       @method('POST')
                <div class="row">
                 <div class="col-md-6">
                         
                    <div class="form-group">
                        <label>Nis Siswa</label>
                        <select class="form-control select2" style="width: 100%;" name="siswa" required>
                            <option value="">--Pilih Siswa--</option>
                            @php
                                $siswa =App\Models\Siswa::get();  
                            @endphp
                            @foreach ($siswa as $sw)
                            @php
                                $cek_siswa=App\Models\Transaksi::where('siswa_id',$sw->id)->count();
                            @endphp
                            @if ($cek_siswa < 1 )
                              <option value="{{$sw->id}}}">{{$sw->nama}} | Nis : {{$sw->nis}}</option>
                            @endif
                            @endforeach
                       
                        </select>
                    </div>

                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Pengambilan</label>
                                <input type="date" class="form-control" name="tanggal" required>
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Fotocopy Ijazah</label>
                                <input type="file" class="form-control" name="bukti" required>
                            </div>

                 </div>

                 
                 
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Tambah</button>
                 
                 </form>

              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection