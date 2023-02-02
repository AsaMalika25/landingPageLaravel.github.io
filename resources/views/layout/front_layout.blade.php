<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/app.css') }}">
    <link href="{{ asset('public/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <title>Landing page</title>
  </head>
  <body>
    
    <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center">
  
        <h1 class="logo me-auto"><a href="index.html">SMk Negeri 1</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="{{ url('/create')}}">Login</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
  
      </div>
    </header><!-- End Header -->
  @yield('konten')
  
  <footer id="footer">
      
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>SMK NEGERI 1 kota Bekasi</h4>
            <p>Berdoa, Berusaha, Tawakal</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  
    <div class="footer-top">
      <div class="container">
        <div class="row">
  
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SMK NEGERI 1 Kota Bekasi</h3>
            <p>
              Jl. Bintara VIII No.2 <br>
              RT.005/RW.003, Bintara,Kec. Bekasi Bar.<br>
              Kota Bks, Jawa Barat 17134, Indonesia <br><br>
              <strong>Phone:</strong> 02188951151<br>
              <strong>Email:</strong> info@smkn1kotabekasi.sch.id<br>
            </p>
          </div>
  
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>
  
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Jurusan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Teknik permesinan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Teknik komputer dan informatika</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Teknik pengelesan </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Akutansi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Teknik kendaraan ringan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tata Busana</a></li>
            </ul>
          </div>
  
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  
  
    <script src="{{ asset('public/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
  </body>