
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

                <form action="{{url('/daftar/act')}}" method="post">
                    @csrf  
                    @method('POST')

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div> 
                        
                        <div class="form-group">
                            <label>Alamat Instansi</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div> 

                        <div class="form-group">
                            <label>Email Instansi</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Nomor Telp. Instansi</label>
                            <input type="text" class="form-control" name="no_hp" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi Instansi</label>
                            <input type="text" class="form-control" name="deskripsi">
                        </div>

                        <div class="form-group">
                            <label>Website Instansi</label>
                            <input type="text" class="form-control" name="website" >
                        </div>

                        <div class="form-group">
                            <label>Bidang Pelatihan</label>
                            <select class="form-control select2" style="width: 100%;" name="pelatihan_id" required>
                                @php
                                    $latih = App\Models\Pelatihan::orderBy('id','desc')->get();
                                @endphp
                                    <option selected value="">-- Pilih Pelatihan --</option>
                                @foreach ($latih as $lt)
                                    <option  value="{{$lt->id}}">{{$lt->nama}}</option>
                                @endforeach

                            </select>
                         </div>

                         <div class="form-group">
                            <label>Jenis Pelatihan</label>
                            <select class="form-control select2" style="width: 100%;" name="jenis" required>
                                <option selected value="">-- Pilih Jenis --</option>
                                <option  value="1">Daring (Tatap Muka Virtual)</option>
                                <option  value="2">Luring (Tatap Muka Langsung)</option>

                            </select>
                         </div>

                         <div class="form-group">
                            <label>Tempat Pelatihan</label>
                            <select class="form-control select2" style="width: 100%;" name="tempat" required>
                                <option selected value="">-- Pilih Tempat --</option>
                                <option  value="1">LKP Langkat</option>
                                <option  value="2">In House Training</option>
                            </select>
                         </div>

                         <div class="form-group">
                            <label>File Pendukung</label> <br>
                            <input type="file" name="file" required>
                            <br>
                            <span style="font-size:12px;color:#000">Ijazah, CV, Rekomendasi Atasan, Fotocopy pendukung lainya </span>
                            <br>
                            <span style="font-size:10px;color:red">*format yang diterima pdf</span>
                         </div>

                         <div style="width:100%;border:1px solid #000;"></div>

                         <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
            </form>       
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