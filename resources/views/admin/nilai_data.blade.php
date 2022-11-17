@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Nilai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Nilai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data semua Nilai</h3>
                <a href="{{url('/dashboard/nilai/add')}}" class="btn btn-primary float-right">Tambah data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Nisn</th>
                    <th>Nilai Rata-rata</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $dt)
                        @php
                            $siswa=App\Models\Siswa::where('id',$dt->siswa_id)->first();
                        @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$siswa->nama}}</td>

                                <td>{{$siswa->nis}}</td>
                                <td>{{$siswa->nisn}} </td>
                                <td>Nilai Rerata Raport:{{$dt->rata_raport}} <br> Nilai Rerata US:{{$dt->rata_us}} </td>

                                <td>
                                    <a href="{{url('/dashboard/nilai/edit/'.$dt->id.'')}}" class="btn btn-warning">Ubah</a>
                                <a href="{{url('/dashboard/nilai/delete/'.$dt->id.'')}}" class="btn btn-danger">Hapus</a>
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