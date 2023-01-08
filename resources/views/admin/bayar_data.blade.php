@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pembayaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pembayaran</h3>
                {{-- <a href="{{url('/dashboard/daftar/add')}}" class="btn btn-primary float-right">Tambah data</a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
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
                                <td>{{$dt->invoice}}</td>
                                <td>Rp.{{number_format($dt->harga)}} </td>
                                <td>{{format_tanggal(date('Y-m-d',strtotime($dt->tgl)))}} </td>
                                <td>{{stat_bayar($dt->status_bayar)}}</td>

                                <td>
                                    @if ($dt->status_bayar != 2)
                                     <a href="{{url('/dashboard/bayar/edit/'.$dt->id.'')}}" class="btn btn-warning">Konfirmasi</a>
                                    @endif
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