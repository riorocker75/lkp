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
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
     <div style="text-align:center;margin:30px 0">
<!-- 
    <img src="{{url('/logo/pancabudi.png')}}" style="width:120px;height:120px" alt="" srcset="">&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{url('/logo/logo.png')}}" style="width:120px;height:120px" alt="" srcset=""> -->
  </div>
    <section class="content">
        @php
            // $jlh_pasien= App\Models\Pasien::where('status',1)->count();; 
            // $jlh_rekam= App\Models\Rekam::where('status',1)->count();;   
            // $jlh_rujuk= App\Models\Rujukan::all()->count();;   
            // $jlh_dokter= App\Models\Dokter::all()->count();;   

        @endphp
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-12">
              <div class="card">
               
      
              </div>
          </div>
          <div class="col-lg-8 col-md-6 col-12">
            <div class="card">
              
           </div>
          </div>

        </div>

        
        
         


      </div>  
      </section>   

</div>  


@endsection