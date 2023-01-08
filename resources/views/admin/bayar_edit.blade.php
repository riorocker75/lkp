@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konfirmasi Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konfirmasi Pembayaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Konfirmasi</h3>
              </div>
              <!-- /.card-header -->
              @foreach ($data as $dt)
                  
              <div class="card-body">
                <form action="{{ url('/dashboard/bayar/update') }}" method="post" enctype="multipart/form-data">
                       @csrf  
                       @method('POST')
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="id" value="{{$dt->id}}" required>
                        <div class="form-group">
                           <br>
                           <label style="font-size:18px;font-weight:600">#{{$dt->invoice}}</label>

                        </div> 
                        
                            <div class="form-group">
                                <label>Nominal yang harus dibayar</label>
                               <br>
                               <label style="font-size:18px;font-weight:600">Rp.{{number_format($dt->harga)}}</label>

                            </div> 

                            <div class="v_dukung" style="display:block">
                                {{preview_file($dt->bukti)}}
                            </div>
                            <br>

                          

                    </div>

                </div>
                <button type="submit" name="status" class="btn btn-success" action="action" value="accept">TERIMA</button>
                <button type="submit" name="status" class="btn btn-warning" action="action" value="reject">TOLAK</button>
                 </form>

              </div>
              @endforeach

              <!-- /.card-body -->
      </section>   

</div>  


@endsection