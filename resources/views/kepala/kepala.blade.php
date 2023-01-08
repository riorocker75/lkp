@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
            <div class="card-body">
              @php
                $daftar = App\Models\Daftar::where('user_id',Session::get('user_id'))->get();
              @endphp   

              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Aksi</th>

                </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($daftar as $dt)

                    @php
                        $latih =App\Models\Pelatihan::where('id',$dt->pelatihan_id)->first();
                    @endphp

                        <tr>
                              <td>{{$no++}}</td>
                              <td>{{$dt->nama}}</td>
                              <td>Rp.{{number_format($latih->harga)}} <br>
                                @if ($dt->status == 0)
                                    <span> Harap Melakukan Pembayaran di rekening berikut</span>
                                    <br>
                                    <span style="font-weight:600">BRI: 90827726 AN Budi Santoso</span>
                                @endif
                              </td>
                              <td>
                                @if ($dt->status == 1)
                                <label for="" class="badge badge-success">
                                  Lunas
                                </label>
                                @elseif($dt->status == 2)
                                <label for="" class="badge badge-default">
                                  Pembayaran Ditolak
                                </label>
                                <br>Harap upload ulang bukti
                                @elseif($dt->status == 0)
                                <label for="" class="badge badge-default">
                                  Menunggu pembayaran
                                </label>
                                @endif
                                
                              </td>

                              <td>
                                @if ($dt->status == 0)
                                    @php
                                        $transaksi =App\Models\Transaksi::where('invoice',$dt->invoice)->count();
                                    @endphp
                                  @if ($transaksi > 0)
                                      <label for="" class="badge badge-danger">Sedang di direview</label>
                                  @else
                                      <a data-toggle="modal" data-target="#modalUpload-{{$dt->id}}" class="btn btn-primary">Upload Bukti</a>
                                  @endif
                                
                                @elseif($dt->status == 1)
                                  <label for="" class="badge badge-success">Sukses</label>
                                @elseif($dt->status == 2)
                                        <a data-toggle="modal" data-target="#modalUpload-{{$dt->id}}" class="btn btn-primary">Upload Bukti</a>
                                @endif
                              </td>

                          </tr>

                          {{-- modal upload  --}}
                            <div class="modal fade" id="modalUpload-{{$dt->id}}" tabindex="-1" role="dialog">
                              <form action="{{url('/dashboard/user/upload/bukti')}}" method="post" enctype='multipart/form-data'>
                                @csrf  
                                @method('POST')
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>
                                    <span> Harap Melakukan Pembayaran di rekening berikut</span>
                                    <br>
                                    <span style="font-weight:600">BRI: 90827726 AN Budi Santoso</span>
                                   </p>

                                   <p>Senilai : <b>Rp. {{number_format($latih->harga)}}</b> </p>
                                   
                                   <br>
                                   <input type="hidden" name="id" value="{{$dt->id}}">
                                   <input type="file" name="bukti" id="">
                                   <br>
                                   <span style="color:red">* file yang diterima hanya berupa(PNG,Jpg, Pdf)</span>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                            </div>

                          {{-- end modalupload --}}

                    @endforeach
              
              
                </tbody>

              </table>
            </div>
           


         </div>  
      </section>   

</div>  


@endsection