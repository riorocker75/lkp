<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
{{-- databales --}}
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



    <style type="text/css">
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}

			/* @page { size: with x height */
			/*@page { size: 20cm 10cm; margin: 0px; }*/
			@page {
				size: auto;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			 .kepala{
        text-align:center;
        font-size: 28px;
        margin:40px 120px;

    }
    .kop_surat {
	position: relative;
	height: 4cm;
	display: flex;
	top: 0;
}

.logo_surat {
	height: 0.5cm;
	width: 0.5cm;
    position: absolute;
    left: 150px;
}
.logo_surat img{
    margin-top: 40px;
  width: 90px;
    height: 75px;
}
.logo_kanan{
    position: absolute;
        right: 150px;

}
.logo_kanan img{
     margin-top: 40px;
    width: 90px;
    height: 75px;
}
.judul_surat {
	padding-top: 0.5cm;
	padding-left: 1cm;
	padding-right: 1cm;
	font-size: 20pt;
	font-weight: 700;
	text-align: center;
	width: 14.8cm;
	/* background: red; */
	margin: 0 auto;
	/* line-height: 1.3;s */
}
	</style>
</head>
<body onload="window.print();">
    {{-- <body> --}}
	<div class="" style="padding:0px 30px">
		<div class="">
<div class="kop_surat">
            <div class="logo_surat">
                {{-- <img src="{{url('/')}}/logo/logoAs.png" alt="" srcset=""> --}}
            </div>
                <div class="logo_kanan float-right">
                    {{-- <img src="{{url('/')}}/logo/puskesmas.png" alt="" srcset=""> --}}

                </div>

            <div class="judul_surat">
               {{-- <p style="font-size:20px">PEMERINTAH KABUPATEN SIMEULUE</p> 
              <p style="line-height: 0;margin-top:16px">PUSKESMAS SIMEULUE TENGAH</p>
               <p style="margin-top:-10px"> KECAMATAN SIMEULUE TENGAH</p>
              
               <p style="font-size:12px;font-weight:400">Jln.Tengkuh di ujung kp.Aie Kode Pos 23894</p> --}}
            </div>
        </div>

   <div style="text-align:center;margin-top:30px">
        <h5> Rekapan Nilai Siswa </h5>
			<h5>{{date('Y')}}</h5>
   </div>
   <table id="absensi" class="table table-bordered table-hover">
        <thead> 
            <tr >
                <th style="text-align: center">No</th>
                <th style="text-align: center">Nama</th>
                <th style="text-align: center">TTL</th>
                <th style="text-align: center">Nama Ortu</th>
                <th style="text-align: center">NIS</th>
                <th style="text-align: center">NISN</th>
                <th style="text-align: center">NO PESERTA UN</th>
                <th style="text-align: center">SEKOLAH PENYELENGGARA US</th>
                <th style="text-align: center">SEKOLAH PENYELENGGARA UN</th>
                <th colspan="2" style="text-align: center">1
                    <br><span style="font-size:12px">PEN. AGAMA</span>
                     <br>
                     <span style="font-size:12px">NILAI</span> <br>
                   <span style="font-size:12px"> RAPORT |  US</span> 
                </th>
                <th colspan="2" style="text-align: center">2
                    <br><span style="font-size:12px">PKN</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">3
                    <br><span style="font-size:12px">B.INDO</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">4
                    <br><span style="font-size:12px">B.INGG</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">5
                    <br><span style="font-size:12px">MATEMATIKA</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">6
                    <br><span style="font-size:12px">FISIKA</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">7
                    <br><span style="font-size:12px">KIMIA</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">8
                    <br><span style="font-size:12px">BIOLOGI</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">9
                    <br><span style="font-size:12px">SEJARAH</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">10
                    <br><span style="font-size:12px">SBK</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">11
                    <br><span style="font-size:12px">PENJAS</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">12
                    <br><span style="font-size:12px">TIK</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">13
                    <br><span style="font-size:12px">KET/B.ASING</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">14
                    <br><span style="font-size:12px">MULOK 1</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                <th colspan="2" style="text-align: center">15
                    <br><span style="font-size:12px">MULOK 2</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>

                {{-- <th colspan="2" style="text-align: center">16
                    <br><span style="font-size:12px">MULOK 3</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th> --}}

                <th colspan="2" style="text-align: center">16
                    <br><span style="font-size:12px">RERATA</span>
                    <br>
                    <span style="font-size:12px">NILAI</span> <br>
                  <span style="font-size:12px"> RAPORT |  US</span> 
                </th>
             
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
				<td>{{$siswa->tmp_lhr}}, {{format_tanggal(date('Y-m-d',strtotime($siswa->tgl_lhr)))}}</td>	
				<td>{{$siswa->ortu}}</td>	
				<td>{{$siswa->nis}}</td>	
				<td>{{$siswa->nisn}}</td>	
				<td>{{$siswa->no_un}}</td>	
				<td>SMA Swasta Ma'had Muhammad Saman</td>	
				<td>SMA Swasta Ma'had Muhammad Saman</td>	
                {{-- agama --}}
				<td>{{$dt->agama_raport}}</td>	
				<td>{{$dt->agama_us}}</td>	

                {{-- pkn --}}
				<td>{{$dt->pkn_raport}}</td>	
				<td>{{$dt->pkn_us}}</td>	

                {{-- bindo --}}
                <td>{{$dt->indo_raport}}</td>	
				<td>{{$dt->indo_us}}</td>	

                {{-- b.ing --}}
                <td>{{$dt->ing_raport}}</td>	
				<td>{{$dt->ing_us}}</td>	

                {{-- matematika --}}
                <td>{{$dt->mm_raport}}</td>	
				<td>{{$dt->mm_us}}</td>	

                {{-- fisika --}}
                <td>{{$dt->fisika_raport}}</td>	
				<td>{{$dt->fisika_us}}</td>	

                {{-- kimia --}}
                <td>{{$dt->kimia_raport}}</td>	
				<td>{{$dt->kimia_us}}</td>	

                {{-- biologi --}}
                <td>{{$dt->biologi_raport}}</td>	
				<td>{{$dt->biologi_us}}</td>

                {{-- sejarah--}}
                <td>{{$dt->sejarah_raport}}</td>	
				<td>{{$dt->sejarah_us}}</td>	

                {{-- sbk --}}
                <td>{{$dt->sbk_raport}}</td>	
				<td>{{$dt->sbk_us}}</td>	

                {{-- penjas --}}
                <td>{{$dt->penjas_raport}}</td>	
				<td>{{$dt->penjas_us}}</td>	

                {{-- tik --}}
                <td>{{$dt->tik_raport}}</td>	
				<td>{{$dt->tik_us}}</td>	

                {{-- keting --}}
                <td>{{$dt->keting_raport}}</td>	
				<td>{{$dt->keting_us}}</td>	

                {{-- mulok1 --}}
                <td>{{$dt->mulok1_raport}}</td>	
				<td>{{$dt->mulok1_us}}</td>	

                {{-- mulok2 --}}
                <td>{{$dt->mulok2_raport}}</td>	
				<td>{{$dt->mulok2_us}}</td>	

                {{-- Rata --}}
                <td>{{$dt->rata_raport}}</td>	
				<td>{{$dt->rata_us}}</td>


                
            </tr>  
			@endforeach
        </tbody>   
	</table>

		</div>
	</div>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
$('#absensi').dataTable({
	searching: false, paging: false, info: false
});
</script>    
</body>
</html>