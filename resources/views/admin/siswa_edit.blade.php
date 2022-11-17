@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              @foreach ($data as $dt)
                  
              <div class="card-body">
                <form action="{{ url('/dashboard/siswa/update') }}" method="post">
                       @csrf  
                       @method('POST')
                <div class="row">
                 <div class="col-md-6">
                         
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Induk Siswa</label>
                                <input type="number" class="form-control" name="nis" value="{{$dt->nis}}" required>
                                <input type="hidden" class="form-control" name="id" value="{{$dt->id}}" required>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">NISN</label>
                                <input type="text" class="form-control" name="nisn" value="{{$dt->nisn}}" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor USBN</label>
                                <input type="text" class="form-control" name="no_un" value="{{$dt->no_un}}" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Angkatan</label>
                              <input type="number" min="2000" max="2099" class="form-control" value="{{$dt->angkatan}}"  name="angkatan" required>
                            </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$dt->nama}}" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama orang tua</label>
                              <input type="text" class="form-control" name="ortu" value="{{$dt->ortu}}" required>
                          </div>

                             <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                 <select class="custom-select form-control-border border-width-2"  name="kelamin" required="required">
                                        <option value="{{$dt->jenis_kelamin}}" selected>{{jenis_kelamin($dt->jenis_kelamin)}}</option>
                                        <option value="1">Pria</option>
                                        <option value="2">Wanita</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lhr" value="{{date('Y-m-d',strtotime($dt->tgl_lhr))}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmp_lhr" value="{{$dt->tmp_lhr}}" required>
                            </div>


                 </div>

                 
                 
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-right">Tambah</button>
                 
                 </form>

              </div>
              @endforeach

              <!-- /.card-body -->
      </section>   

</div>  


@endsection