@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pelatihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pelatiahn</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
      
     
              {{-- {{$cek->prosedur}} --}}
        
      <div class="container-fluid">
          <div class="row">

            <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pelatihan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <form action="{{ url('/dashboard/pelatihan/act') }}" method="post">
                       @csrf  
                       @method('POST')
                     <div class="form-group">
                            <label>Nama Pelatihan</label>
                            <input type="text" class="form-control" name="nama">
                      </div>

                      <div class="form-group">
                            <label>Harga</label>    
                            <input type="number" class="form-control" name="harga">
                    </div>

                    <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="status" required>
                                <option selected value="">-- Pilih  Status--</option>
                                <option value="1">Aktif</option>
                                <option value="2">Non Aktif</option>

                            </select>
                    </div>

                  <button type="submit" class="btn btn-primary">Tambah Pelatihan</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="col-lg-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data semua pelatihan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelatihan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $dt)
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->nama}}</td>
                                <td>Rp.{{number_format($dt->harga)}}</td>
                                <td>{{stat_latih($dt->status)}}</td>

                                <td>
                                  <a href="{{url('/dashboard/pelatihan/edit/'.$dt->id.'')}}" class="btn btn-warning">Edit</a>
                                  <a href="{{url('/dashboard/pelatihan/delete/'.$dt->id.'')}}" class="btn btn-danger">Hapus</a>
                                </td>

                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
         
      </section>   

</div>  


@endsection