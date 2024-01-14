<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Digital Arsip</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        p {
            text-align: justify;
        }

        .custom-row {
            display: flex;
            align-items: center;
        }

        .custom-col {
            margin-bottom: 0 !important;
        }

        .custom-logo {
            margin-right: 10px;
        }

    </style>

</head>


<body>

    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <img src="https://www.unsur.ac.id/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flogo-unsur.f2e3bf9b.png&w=1920&q=75"
                height="50" alt="" class="mx-2">
            <h1 class="logo me-auto"><a href="index.html" style="font-size: 30px"> Universitas Suryakancana</a></h1>
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
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Sistem Penyimpanan Berkas Berbasis Digital</h1>
                    <h2></h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="/login" class="btn-get-started scrollto">Mulai</a>
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{asset('halaman/img/icon2.png')}}" class="img-fluid animated" alt="">
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
                    <div class="col-lg-6 pt-4 pt-lg-0 content" style="text-align: justify" data-aos="fade-left"
                        data-aos-delay="100">
                        <h3>SISTEM INFORMASI DIGITAL ARSIP</h3>
                        <p class="fst-italic">
                            SISTEM INFORMASI DIGITAL ARSIP ini merupakan sebuah aplikasi berbasis web untuk menyimpan
                            sebuah berupa dokumen berbasis digital, dokumen tersebut disimpan dicloud agar lebih aman
                            dan sistem ini juga memudahkan dalam Pencairan berkas.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End Skills Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>FITUR</h2>
                    <p>Berikut beberapa fitur yang ada pada sistem ini</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">Penyimpanan berkas</a></h4>
                            <p>Sistem ini dapat menyimpan berkas baik itu format PDF, XLSX, dan DOCX dengan max size
                                file 4 MB, dokumen tersebut disimpan di platform cloud google</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">History Unduh berkas</a></h4>
                            <p>Sistem informasi ini mencatat history setiap dokumen yang diunduh</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Log aktifitas</a></h4>
                            <p>Sistem ini memiliki fitur mencatat log aktifitas setiap kegiatan yang ada disistem
                                seperti menyimpan, merubah, dan menghapus</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a href="">Pencarian Berkas</a></h4>
                            <p>Memiliki Fitur Pencarian Berkas dengan cepat</p>
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
                            Digital Arsip ini merupakan sebuah aplikasi berbasis web untuk membuat menyimpan sebuah
                            dokumen fisik menjadi bentuk digital
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
                            Aplikasi memiliki pencatatan mulai dari log aktifitas dan juga history download demi menjaga
                            keamanan data tersebut
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container footer-bottom clearfix">
                <div class="row">
                    <div class="col-lg-4 col-md-6 footer-contact">
                        <div class="row custom-row">
                            <div class="col-md-3 custom-col">
                                <a href=""> <img
                                        src="https://www.unsur.ac.id/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flogo-unsur.f2e3bf9b.png&w=1920&q=75"
                                        height="50" alt="" class="mx-2 custom-logo"></a>

                            </div>
                            <div class="col-md-3 text-right">
                                <h4>Universitas Suryakancana</h4>
                            </div>
                        </div>
                        <div class="col-10"> <p>Universitas Suryakancana adalah perguruan tinggi yang terletak di Cianjur Jawa Barat
                            terakreditasi (B) BAN-PT, saat ini mempunyai 5 Fakultas & 2 Program Pasca Sarjana</p></div>

                    </div>
                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Sosial Media</h4>
                        <p>Berikut Sosial Media yang ada:</p>
                        <div class="sosmed" style="font-size: 30px;margin: 10px;margin:2px">
                            <a type="button" href="#"><i class="fa-brands fa-linkedin" style="color:white"></i> </a>
                            <a type="button" href="#" ><i class="fa-brands fa-facebook" style="color:white"></i></a>
                            <a type="button" href="#" ><i class="fa-brands fa-square-instagram" style="color:white"></i></a>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Alamat</h4>
                        <p>
                            Jl. Pasirgede Raya, Bojongherang, <br>
                            Kec. Cianjur, Kabupaten Cianjur,<br>
                            Jawa Barat 43216 <br><br>
                            <strong>Phone:</strong> (0263) 270106<br>
                            <strong>Email: </strong>
                            unsur@unsur.ac.id<br>
                        </p>

                    </div>
                </div>
            </div>
        </footer>
        <footer id="footer" style="background-color: #263857;color: white   ">
            <div class="container ">
                <div class="text-center p-2">
                    &copy; Copyright <strong><span>Sistem Informasi Digital Arsip</span></strong>. All Rights Reserved
                </div>
            </div>
        </footer>


        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>


        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

</body>

</html>
