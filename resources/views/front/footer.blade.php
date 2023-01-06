
<!-- Modal -->
<div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" enctype='multipart/form-data'>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Pelatihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                           
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </div>
    </form>
    </div>
  </div>




<footer style="background: url({{asset('front/assets/img/footer/footer-bg.jpg')}})">
    <div class="cta-area">
        <div class="container">
            <div class="cta-wrapper">
                <h2>Sudah Berminat?</h2>
                <a data-toggle="modal" data-target="#modalDaftar" class="theme-btn">Get Started</a>
            </div>
        </div>
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="footer-widget-wrapper de-padding">
                <div class="footer-widget-box ab-us">
                    <h5 class="foo-widget-title">About</h5>
                  
                    <p>
                        Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo conse
                    </p>
                    {{-- <a href="#" class="footer-dis">Read More</a> --}}
                    <ul class="footer-social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="footer-widget-box">
                    <h5 class="foo-widget-title">Navigation</h5>
                    <ul class="foo-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Project</a></li>
                        <li><a href="#">Meet Our Blog</a></li>
                    </ul>
                </div>
                
                <div class="footer-widget-box footer-gallery">
                    <h5 class="foo-widget-title">Instagram Follow</h5>
                    <div class="foter-img grid-3">
                        {{-- <img src="assets/img/singlepost/imagebgshape.png" alt="thumb">
                        <img src="assets/img/singlepost/imagebgshape.png" alt="thumb">
                        <img src="assets/img/singlepost/imagebgshape.png" alt="thumb">
                        <img src="assets/img/singlepost/imagebgshape.png" alt="thumb">
                        <img src="assets/img/singlepost/imagebgshape.png" alt="thumb">
                        <img src="assets/img/singlepost/imagebgshape.png" alt="thumb"> --}}
                    </div>
                </div>
                
                <div class="footer-widget-box">
                    <h5 class="foo-widget-title">Subscribe</h5>
                    <p>
                        Lorem ipsum dolor sit  consectetur adipisicing elit, sed eiusmotempor incididunt ut labore et
                    </p>
                    <div class="subscribe">
                        <form>
                            <input type="text" placeholder="Type Your Email">
                            <button type="submit"><i class="fas fa-location-arrow"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright © {{ date('Y')}}. All Rights Reserved.</p>
                <ul class="footer-menu">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="{{url('/login')}}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>	