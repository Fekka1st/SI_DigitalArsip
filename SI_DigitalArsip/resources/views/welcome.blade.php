<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <title>Arsha Bootstrap Template - Index</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
        <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
      
        <link href="assets/css/style.css" rel="stylesheet">
      
      </head>
  

    <body>
       
        {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}

        <header id="header" class="fixed-top ">
          <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">Sistem Informasi Digital Arsip</a></h1>
            <nav id="navbar" class="navbar">
              <ul>
                <li><a class="nav-link scrollto active" href="#hero">Branda</a></li>
                <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                @if (Route::has('login'))
                @auth
                <li><a class="getstarted scrollto" href="/dashboard">Dashboard</a></li>
                @else
                <li><a class="getstarted scrollto" href="/login">Login</a></li>
                @endauth
                @endif
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
      
          </div>
        </header>
      
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
      
          <div class="container">
            <div class="row">
              <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Rubah Berkas Kalian ke bentuk digital</h1>
                <h2></h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                  <a href="#about" class="btn-get-started scrollto">Get Started</a>
                  <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
              </div>
            </div>
          </div>
      
        </section><!-- End Hero -->
      
        <main id="main">
      
         
          
      
          <!-- ======= Skills Section ======= -->
          <section id="skills" class="skills">
            <div class="container" data-aos="fade-up">
      
              <div class="row">
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                  <img src="assets/img/skills.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                  <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
      
                  <div class="skills-content">
      
                    <div class="progress">
                      <span class="skill">HTML <i class="val">100%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
      
                    <div class="progress">
                      <span class="skill">CSS <i class="val">90%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
      
                    <div class="progress">
                      <span class="skill">JavaScript <i class="val">75%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
      
                    <div class="progress">
                      <span class="skill">Photoshop <i class="val">55%</i></span>
                      <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
      
                  </div>
      
                </div>
              </div>
      
            </div>
          </section><!-- End Skills Section -->
      
          <!-- ======= Services Section ======= -->
          <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">
      
              <div class="section-title">
                <h2>Services</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
              </div>
      
              <div class="row">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4><a href="">Lorem Ipsum</a></h4>
                    <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                  </div>
                </div>
      
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4><a href="">Sed ut perspici</a></h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                  </div>
                </div>
      
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4><a href="">Magni Dolores</a></h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                  </div>
                </div>
      
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bx-layer"></i></div>
                    <h4><a href="">Nemo Enim</a></h4>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                  </div>
                </div>
      
              </div>
      
            </div>
          </section><!-- End Services Section -->
      
         <!-- ======= About Us Section ======= -->
         <section id="about" class="about">
            <div class="container" data-aos="fade-up">
      
              <div class="section-title">
                <h2>Tentang</h2>
              </div>
      
              <div class="row content">
                <div class="col-lg-6">
                  <p>
                    Digital Arsip ini merupakan sebuah aplikasi berbasis web untuk membuat menyimpan sebuah dokumen fisik menjadi bentuk digital
                    dan juga aplikasi memudahkan kita dalam mencari berkas dengan mudah.
                  </p>
                  <ul>
                    <li><i class="ri-check-double-line"></i> Simpan Dokumen</li>
                    <li><i class="ri-check-double-line"></i> Cetak/Unduh Dokumen</li>
                    <li><i class="ri-check-double-line"></i> Sudah Terintegrasi dengan Google Cloud</li>
                  </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                  <p>
                    Aplikasi memiliki pencetatan mulai dari log aktifitas dan juga history download demi menjaga keamanan data tersebut
                  </p>
                </div>
              </div>
      
            </div>
          </section><!-- End About Us Section -->
      
        <!-- ======= Footer ======= -->
        <footer id="footer">
      
          <div class="footer-top">
            <div class="container">
              <div class="row">
      
                <div class="col-lg-3 col-md-6 footer-contact">
                  <h3>Universitas Suryakancana</h3>
                  <p>
                    Jl. Pasirgede Raya, Bojongherang, <br>
                    Kec. Cianjur, Kabupaten Cianjur,<br>
                    Jawa Barat 43216 <br><br>
                    <strong>Phone:</strong> (0263) 270106<br>
                    <strong>Email: </strong> 
                    unsur@unsur.ac.id<br>
                  </p>
                </div>
      
                <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Sosial Media</h4>
                  <p>Berikut Sosial Media yang ada:</p>
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
      
          <div class="container footer-bottom clearfix">
            <div class="copyright">
              &copy; Copyright <strong><span>Ferry</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
             
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </footer>
      
        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      

        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
      
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
      
      </body>
</html>
