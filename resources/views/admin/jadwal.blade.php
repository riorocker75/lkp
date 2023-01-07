@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jadwal Pelatihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Jadwal Pelatiahn</li>
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
                <h3 class="card-title">Jadwal Pelatihan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <form action="{{ url('/dashboard/jadwal/act') }}" method="post">
                       @csrf  
                       @method('POST')
                    <div class="form-group">
                        <label>Nama Jadwal</label>    
                        <input type="text" class="form-control" name="nama">
                    </div>

                     <div class="form-group">
                            <label>Pelatihan</label>
                            <select class="form-control select2" style="width: 100%;" name="pelatihan_id" required>
                                @php
                                    $latih = App\Models\Pelatihan::orderBy('id','desc')->get();
                                @endphp
                                    <option selected value="">-- Pilih Pelatihan --</option>

                                @foreach ($latih as $lt)
                                    <option  value="{{$lt->id}}">{{$lt->nama}}</option>
                                @endforeach

                            </select>
                    </div>

                    <div class="form-group">
                        <label>Kuota</label>    
                        <input type="number" class="form-control" name="kuota">
                    </div>
                      <div class="form-group">
                            <label>Jadwal Mulai</label>    
                            <input type="date" class="form-control" name="jadwal_awal" value="{{date('Y-m-d')}}">
                    </div>

                    <div class="form-group">
                        <label>Jadwal Akhir</label>    
                        <input type="date" class="form-control" name="jadwal_akhir" value="{{date('Y-m-d')}}">
                </div>

                    <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="status" required>
                                <option selected value="">-- Pilih  Status--</option>
                                <option value="1">Aktif</option>
                                <option value="2">Non Aktif</option>
                            </select>
                    </div>

                  <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
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
                    <th>Nama Jadwal</th>
                    <th>Pelatihan</th>
                    <th>Kuota</th>
                    <th>Jadwal</th>
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
                                <td>
                                    @php
                                        $pl= App\Models\Pelatihan::where('id',$dt->pelatihan_id)->first();
                                    @endphp   
                                    {{$pl->nama}} 
                                </td>
                                <td>{{number_format($dt->kuota)}}</td>
                                <td>
                                    Jadwal Awal : {{format_tanggal(date('Y-m-d',strtotime($dt->jadwal_awal)))}}
                                    <br>
                                    Jadwal Akhir : {{format_tanggal(date('Y-m-d',strtotime($dt->jadwal_akhir)))}}
                                </td>

                                <td>{{stat_latih($dt->status)}}</td>

                                <td>
                                  <a href="{{url('/dashboard/jadwal/edit/'.$dt->id.'')}}" class="btn btn-warning">Edit</a>
                                  <a href="{{url('/dashboard/jadwal/delete/'.$dt->id.'')}}" class="btn btn-danger">Hapus</a>
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