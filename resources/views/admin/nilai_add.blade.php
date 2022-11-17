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
                <h3 class="card-title">Tambah Data Nilai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('/dashboard/nilai/act') }}" method="post">
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
                                            $cek_siswa=App\Models\Nilai::where('siswa_id',$sw->id)->count();
                                        @endphp
                                        @if ($cek_siswa < 1 )
                                          <option value="{{$sw->id}}">{{$sw->nama}} | Nis : {{$sw->nis}}</option>
                                        @endif
                                        @endforeach
                                   
                                    </select>
                            </div>
                          <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Pendidikan Agama Rerata Raport</label>
                                <input type="number" class="form-control nilai_raport" name="agama_raport" required>
                            </div>  

                            <div class="form-group">
                                <label for="exampleInputEmail1">Pendidikan Agama US</label>
                                <input type="number" class="form-control nilai_us" name="agama_us" required>
                            </div>

                          <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">PKN Rerata Raport</label>
                              <input type="number" class="form-control nilai_raport" name="pkn_raport" required>
                          </div>  

                          <div class="form-group">
                              <label for="exampleInputEmail1">PKN US</label>
                              <input type="number" class="form-control nilai_us" name="pkn_us" required>
                          </div>

                        <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">B.Indo Rerata Raport</label>
                            <input type="number" class="form-control nilai_raport" name="indo_raport" required>
                        </div>  

                        <div class="form-group">
                            <label for="exampleInputEmail1">B.Indo US</label>
                            <input type="number" class="form-control nilai_us" name="indo_us" required>
                        </div>

                        <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">B.ing Rerata Raport</label>
                          <input type="number" class="form-control nilai_raport" name="ing_raport" required>
                      </div>  

                      <div class="form-group">
                          <label for="exampleInputEmail1">B.ing US</label>
                          <input type="number" class="form-control nilai_us" name="ing_us" required>
                      </div>

                      <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Matematika Rerata Raport</label>
                        <input type="number" class="form-control nilai_raport" name="mm_raport" required>
                    </div>  

                    <div class="form-group">
                        <label for="exampleInputEmail1">Matematika US</label>
                        <input type="number" class="form-control nilai_us" name="mm_us" required>
                    </div>

                    <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Fisika Rerata Raport</label>
                      <input type="number" class="form-control nilai_raport" name="fisika_raport" required>
                  </div>  

                  <div class="form-group">
                      <label for="exampleInputEmail1">Fisika US</label>
                      <input type="number" class="form-control nilai_us" name="fisika_us" required>
                  </div>

                  <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kimia Rerata Raport</label>
                    <input type="number" class="form-control nilai_raport" name="kimia_raport" required>
                </div>  

                <div class="form-group">
                    <label for="exampleInputEmail1">Kimia US</label>
                    <input type="number" class="form-control nilai_us" name="kimia_us" required>
                </div>

                <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Biologi Rerata Raport</label>
                  <input type="number" class="form-control nilai_raport" name="biologi_raport" required>
              </div>  

              <div class="form-group">
                  <label for="exampleInputEmail1">Biologi US</label>
                  <input type="number" class="form-control nilai_us" name="biologi_us" required>
              </div>
              <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

              <div class="form-group">
                <label for="exampleInputEmail1">Sejarah Rerata Raport</label>
                <input type="number" class="form-control nilai_raport" name="sejarah_raport" required>
            </div>  

            <div class="form-group">
                <label for="exampleInputEmail1">Sejarah US</label>
                <input type="number" class="form-control nilai_us" name="sejarah_us" required>
            </div>

            <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

            <div class="form-group">
              <label for="exampleInputEmail1">SBK Rerata Raport</label>
              <input type="number" class="form-control nilai_raport" name="sbk_raport" required>
          </div>  

          <div class="form-group">
              <label for="exampleInputEmail1">SBK US</label>
              <input type="number" class="form-control nilai_us" name="sbk_us" required>
          </div>

          <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

          <div class="form-group">
            <label for="exampleInputEmail1">Penjas Rerata Raport</label>
            <input type="number" class="form-control nilai_raport" name="penjas_raport" required>
        </div>  

        <div class="form-group">
            <label for="exampleInputEmail1">Penjas US</label>
            <input type="number" class="form-control nilai_us" name="penjas_us" required>
        </div>

        <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

        <div class="form-group">
          <label for="exampleInputEmail1">TIK Rerata Raport</label>
          <input type="number" class="form-control nilai_raport" name="tik_raport" required>
      </div>  

      <div class="form-group">
          <label for="exampleInputEmail1">TIK US</label>
          <input type="number" class="form-control nilai_us" name="tik_us" required>
      </div>

   
    <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>


    <div class="form-group">
      <label for="exampleInputEmail1">Ket./B.Inggris Rerata Raport</label>
      <input type="number" class="form-control nilai_raport" name="keting_raport" required>
  </div>  

  <div class="form-group">
      <label for="exampleInputEmail1">Ket./B.Inggris US</label>
      <input type="number" class="form-control nilai_us" name="keting_us" required>
  </div>

  <div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

  <div class="form-group">
    <label for="exampleInputEmail1">Mulok 1 Rerata Raport</label>
    <input type="number" class="form-control nilai_raport" name="mulok1_raport" required>
</div>  

<div class="form-group">
    <label for="exampleInputEmail1">Mulok 1 US</label>
    <input type="number" class="form-control nilai_us" name="mulok1_us" required>
</div>

<div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>


<div class="form-group">
  <label for="exampleInputEmail1">Mulok 2 Rerata Raport</label>
  <input type="number" class="form-control nilai_raport" name="mulok2_raport" required>
</div>  

<div class="form-group">
  <label for="exampleInputEmail1">Mulok 2 US</label>
  <input type="number" class="form-control nilai_us" name="mulok2_us" required>
</div>

<div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>

<div class="form-group">
  <label for="exampleInputEmail1">Nilai Rerata Raport</label>
  <input type="number" class="form-control raport" name="rata_raport" readonly required>
</div>  

<div class="form-group">
  <label for="exampleInputEmail1">Nilai Rerata  US</label>
  <input type="number" class="form-control us" name="rata_us" readonly required>
</div>

<div style="margin-bottom:10px;width:100%;border:1px solid rgb(117, 110, 110)"></div>


</div>

       <script>
          $('.form-group').on('input change','.nilai_raport',function(){
            var totalRaport=0;
            var hasilRaport=0;
              $('.form-group .nilai_raport').each(function(){
                  var inputRaport =$(this).val();
                  if($.isNumeric(inputRaport)){
                    totalRaport += parseFloat(inputRaport);
                  }
              });
              hasilRaport= totalRaport / 15;

              $('.raport').val(Math.round(hasilRaport));

          });

          $('.form-group').on('input change','.nilai_us',function(){
            var totalus=0;
            var hasilus=0;
              $('.form-group .nilai_us').each(function(){
                  var inputus =$(this).val();
                  if($.isNumeric(inputus)){
                    totalus += parseFloat(inputus);
                  }
              });
              hasilus= totalus / 15;

              $('.us').val(Math.round(hasilus));

          });
        </script>          
                 
  </div>
  <button type="submit" class="btn btn-primary btn-lg float-right">Tambah</button>
    
    </form>

              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection