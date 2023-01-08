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
                <h3 class="card-title">Data Pendaftar</h3>
                {{-- <a href="{{url('/dashboard/daftar/add')}}" class="btn btn-primary float-right">Tambah data</a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telp/Hp</th>
                    <th>Pelatihan</th>
                    <th>Jenis</th>
                    <th>Status</th>

                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $dt)
                      @php
                          $latih=App\Models\Pelatihan::where('id',$dt->pelatihan_id)->first()
                      @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->nama}}</td>
                                <td>{{$dt->alamat}} </td>
                                <td>{{$dt->email}} </td>
                                <td>{{$dt->no_hp}}</td>
                                <td>{{$latih->nama}}</td>
                                <td>{{jenis_latih($dt->jenis)}}</td>
                                <td>{{stat_daftar($dt->status)}}</td>

                                <td>
                                <a href="{{url('/dashboard/daftar/edit/'.$dt->id.'')}}" class="btn btn-warning">Ubah</a>
                                <a href="{{url('/dashboard/daftar/delete/'.$dt->id.'')}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection