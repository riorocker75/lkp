<!doctype html>
<html class="no-js" lang="zxx">

<head>	
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>LKP </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('front/assets/img/logo/favicon.png')}}">
	<!-- ========== Start Stylesheet ========== -->
	<link href="{{asset('front/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/fontawesome.min.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/magnific-popup.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/animate.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/bsnav.min.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/flaticon-set.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/site-animation.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/slick.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/themify-icons.css')}}" rel="stylesheet" />
	<link href="{{asset('front/assets/css/swiper.min.css')}}" rel="stylesheet" />
	<link href="{{asset('front/style.css')}}" rel="stylesheet">
	<link href="{{asset('front/assets/css/responsive.css')}}" rel="stylesheet" />

</head>

<body class="demo-1" id="bdy">		

	
	<div class="se-pre-con"></div>

    @include('front.header')    

 
         @yield('content')
    </main>    


	<a href="#bdy" id="scrtop" class="smooth-menu"><i class="ti-arrow-up"></i></a>
	<!-- End Scroll top-->
	
    @include('front.footer')
	
  	<!-- jQuery Frameworks 
    ============================================= -->
	
	<script src=" {{asset('front/assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/popper.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/jquery.appear.js')}}"></script>
    <script src=" {{asset('front/assets/js/html5/html5shiv.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/html5/respond.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/jquery.easing.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/progress-bar.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/modernizr.custom.13711.js')}}"></script>
    <script src=" {{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/wow.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/count-to.js')}}"></script>
    <script src=" {{asset('front/assets/js/fontawesome.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/swiper.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/text.js')}}"></script>
	<script src=" {{asset('front/assets/js/YTPlayer.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/slick.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/bsnav.min.js')}}"></script>
    <script src=" {{asset('front/assets/js/jquery.easypiechart.js')}}"></script>
    <script src=" {{asset('front/assets/js/main.js')}}"></script>

</body>    
</html>












