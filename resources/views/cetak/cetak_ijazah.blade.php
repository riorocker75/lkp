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
				size: A4;
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
	<div class="wrapper">
		<div class="container">
            <div style="position:relative;right:-622px">
                <p >Swasta</p>

            </div>
        <div style="position:relative;left:140px;width:600px;margin-top:40px;margin-bottom:80px">
            <div style="margin-top:50px;margin-right:300px;">
                <p style="text-transform:uppercase">MA'HAD MUHAMMAD SAMAN</p>
            </div>
            <div style="margin-left:150px">
                 <p style="text-transform:uppercase">10262125</p>
             </div>
             <div style="margin-left:60px">
                 <p >Deliserdang</p>
             </div>
         
             <div style="margin-left:32px">
                 <p >Sumatera Utara</p>
             </div>

        </div>


        <div style="position:relative;left:400px;width:600px;margin-top:40px;margin-bottom:80px">
            <div style="margin-top:50px;margin-right:300px;">
                <p style="text-transform:uppercase">{{$siswa->nama}}</p>
            </div>
            <div >
                <p style="text-transform:uppercase">{{$siswa->tmp_lhr}}, {{format_tanggal(date('Y-m-d',strtotime($siswa->tgl_lhr)))}}</p>

             </div>
             <div >
                <p style="text-transform:uppercase">{{$siswa->ortu}}</p>
             </div>

             <div>
                <p style="text-transform:uppercase">{{$siswa->nis}}</p>
             </div>

             <div>
                <p style="text-transform:uppercase">{{$siswa->nisn}}</p>
             </div>

             <div>
                <p style="text-transform:uppercase">{{$siswa->no_un}}</p>
             </div>

             <div>
                <p style="text-transform:uppercase">SMA Swasta Ma'had Muhammad Saman</p>
             </div>

             <div>
                <p style="text-transform:uppercase">SMA Swasta Ma'had Muhammad Saman</p>
             </div>
         
            

        </div>
   

   
       


          

            <div style="margin-left:400px;margin-top:45px">
                <div style="display:inline-block">
                    <span style="margin:35px 15px">Kabupaten Deli Serdang,</span>
                    <span style="margin:25px 5px">{{format_tanggal(date('Y-m-d'))}}</span>
                </div>
            </div>


            <div style="margin-left:500px;margin-top:75px">
                <div style="display:inline-block">
                    <span style="margin:35px 15px">ADDIEN FAHMI, S.Ag</span>
                </div>
            </div>

            

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