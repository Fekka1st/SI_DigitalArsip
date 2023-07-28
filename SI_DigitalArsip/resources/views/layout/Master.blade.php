<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIDA | @yield('title')</title>
    @yield('css')
    <!-- Google Font: Source Sans Pro -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .img-thumbnail {
            border: 1px solid rgb(255, 255, 255);
            /* Atur ketebalan dan warna garis pinggir */
            border-radius: 0px;
            /* Atur radius sudut agar tetap tampil rounded */
            padding: 0.0rem;
            /* Sesuaikan jarak antara gambar dan garis pinggir */
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    {{-- @include('sweetalert::alert') --}}
    <div class="wrapper">

        {{-- <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="https://e-arsip.kopegtelkp.com/public/logo-fullkpg.png"
                alt="AdminLTELogo" height="200" width="200">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        {{-- @includeIf('layout.asidebar') --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="https://e-arsip.kopegtelkp.com/public/logo-fullkpg.png" alt="AdminLTE Logo"
                    class="img-circle " style="opacity: .8;background-color:white" height="60" width="60">
                <span class="brand-text font-weight-bold">Digital Arsip
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ auth()->user()->url }}" class="rounded img-thumbnail" alt="User Image">
                    </div>
                    <div class="info">
                        <a  class="d-block">{{ auth()->user()->name }}</a>
                        <a  class="d-block">{{ auth()->user()->role }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                                                                                       with font-awesome or any other icon font library -->
                        @if(auth()->user()->role== 'Admin')
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link dashboard">
                                <i class="nav-icon fa-solid fa-house"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/standar" class="nav-link Standar">
                                <i class="nav-icon fa-solid fa-book"></i>
                                <p>
                                    Kelola Standarisasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kategori" class="nav-link kategori">
                                <i class="nav-icon fa-solid fa-book"></i>
                                <p>
                                    Kelola Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sub-kategori" class="nav-link sub">
                                <i class="nav-icon fa-solid fa-book"></i>
                                <p>
                                    Kelola SubKategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kelolaberkas" class="nav-link berkas">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Kelola Berkas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kelolauser" class="nav-link user">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Kelola User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/aktifitas" class="nav-link aktifitas">
                                <i class="nav-icon fa-solid fa-chart-line"></i>
                                <p>
                                    Aktifitas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/download" class="nav-link download">
                                <i class="nav-icon fas fa-download"></i>
                                <p>
                                    History Download
                                </p>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role== 'Staff')
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link dashboard">
                                <i class="nav-icon fa-solid fa-house"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kelolaberkas" class="nav-link berkas">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Kelola Berkas
                                </p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/profilesettings/{{auth()->user()->id}}" class="nav-link profile">
                               
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Pengaturan Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda Yakin ingin keluar ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <a href="/logout" type="button" class="btn btn-danger" >Ya,Keluar</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('rute')</h1>
                        </div><!-- /.col -->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layout.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src="cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

        @if($success = 'success')
        Swal.fire {
            'Oke',
            'Oke',
        }
        @endif

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->


    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @yield('plugin')

</body>

</html>
