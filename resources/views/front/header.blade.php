	
    <header class="header">
		<div class="container">
			<div class="main-navigation">
				<div class="navbar navbar-expand-lg bsnav bsnav-sticky bsnav-sticky-slide bsnav-transparent bsnav-scrollspy">
					<div class="container">
						<a class="navbar-brand" href="{{url('/')}}">
							{{-- <img src="{{asset('front/assets/img/logo/logo.png')}}" class="logo-display" alt="thumb">
							<img src="{{asset('front/assets/img/logo/logo.png')}}" class="logo-scrolled" alt="thumb"> --}}
						</a>
						<button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
						<div class="collapse navbar-collapse justify-content-sm-end">
							<ul class="navbar-nav navbar-mobile ml-auto">
                                <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="">About</a></li>
								<li class="nav-item"><a class="nav-link" href="">Contact</a></li>
								<li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>

							</ul>
							<div class="header-serarch-btn">
								{{-- <i class="fas fa-search"></i> --}}
								<a data-toggle="modal" data-target="#modalDaftar" class="header-btn"><span>Daftar Pelatihan</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="bsnav-mobile">
					<div class="bsnav-mobile-overlay"></div>
					<div class="navbar"></div>
				</div>
			</div>
		</div>
    </header>
 
    {{-- <div class="clearfix"></div> --}}

	<main class="main">
        <div id="home" class="hero-section">
			<div class="hero-sliderr">
				<!-- owl Slider Begin -->
				<div class="hero-single" data-background="{{asset('front/assets/img/header/header-1.png')}}">
					<div class="container">
						<div class="row">
							<div class="col-xl-7">
								<div class="hero-content">
									<span class="hero-p1 hero-sm">Mencetak Professional Kompeten</span>
									<h2>
										LEMBAGA<br> <span>Kursus dan Pelatihan</span>
									</h2>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
									</p>
									<div class="hro-btn">
										<a href="#" class="theme-btn">Selengkapnya</a>
										{{-- <div class="how-we-work">
											<i class="fas fa-play shape-bg"></i>
											<span class="how-txt">How we work</span>
										</div> --}}
									</div>
								</div>
							</div>
							<div class="col-xl-5">
								<div class="right-bg">
									<img src="{{asset('front/assets/img/header/header-6.png')}}" alt="thumb">
								</div>
							</div>
						</div>
						{{-- <div class="brand-wrapper owl-carousel owl-theme">
							<div class="single-item">
								<img src="{{asset('front/assets/img/review/brand.png')}}" alt="thumb">
							</div>
							<div class="single-item">
								<img src="{{asset('front/assets/img/review/brand-2.png')}}" alt="thumb">
							</div>
							<div class="single-item">
								<img src="{{asset('front/assets/img/review/brand-3.png')}}" alt="thumb">
							</div>
							<div class="single-item">
								<img src="{{asset('front/assets/img/review/brand-4.png')}}" alt="thumb">
							</div>
							<div class="single-item">
								<img src="{{asset('front/assets/img/review/brand.png')}}" alt="thumb">
							</div>
							<div class="single-item">
								<img src="{{asset('front/assets/img/review/brand-2.png')}}" alt="thumb">
							</div>
						</div> --}}
					</div>
				</div><!-- single Slider End -->
			</div>
		</div>