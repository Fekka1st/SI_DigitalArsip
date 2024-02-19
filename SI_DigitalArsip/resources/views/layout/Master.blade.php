<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIDA | @yield('title')</title>
    @yield('css')
    <link rel="icon" type="image/x-icon" href="/img/iconfav.png">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>


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
            border-radius: 0px;
            padding: 0.0rem;
        }

        .nav-link.active.head {
            color: #fff !important;
            background-color: #3b3b3b !important;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    @include('sweetalert::alert')
    <div class="wrapper">
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1E1E1E">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="/img/iconfav2.png" alt="AdminLTE Logo"
                    class="img-circle " style="opacity: .8;background-color:white" height="60" width="60">
                <span class="brand-text font-weight-bold">Digital Arsip
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ auth()->user()->url }}" class="img-circle elevation-2"
                            style="height: 50px; width: 50px" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block">{{ auth()->user()->name }}</a>
                        <a class="d-block">{{ auth()->user()->role }}</a>
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
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-link active head mt-3 mb-3"> KELOLA MASTER DATA </li>
                        <li class="nav-item">
                            <a href="/kelola_standarisasi" class="nav-link Standar">
                                <i class="nav-icon fa-solid fa-book"></i>
                                <p>
                                    Kelola Standar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kelola_kategori" class="nav-link kategori">
                                <i class="nav-icon fa-solid fa-book"></i>
                                <p>
                                    Kelola Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kelola_sub-kategori" class="nav-link sub">
                                <i class="nav-icon fa-solid fa-book"></i>
                                <p>
                                    Kelola Sub-Kategori
                                </p>
                            </a>
                        </li>

                        <li class="nav-link active head mt-3 mb-3"> KELOLA DATA </li>
                        <li class="nav-item">
                            <a href="/kelolaberkas" class="nav-link berkas">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Kelola Berkas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Report" class="nav-link Report">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Report Berkas
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
                            <a href="/kelola_departement" class="nav-link departement">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Kelola Departement
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/aktifitas" class="nav-link aktifitas">
                                <i class="nav-icon fa-solid fa-chart-line"></i>
                                <p>
                                    Aktifitas USER
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/download" class="nav-link download">
                                <i class="nav-icon fas fa-download"></i>
                                <p>
                                    Riwayat Unduh USER
                                </p>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role== 'Staff')
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link dashboard">
                                <i class="nav-icon fa-solid fa-house"></i>
                                <p>
                                    Beranda
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
                            <a href="/download" class="nav-link download">
                                <i class="nav-icon fas fa-download"></i>
                                <p>
                                    Riwayat Unduh
                                </p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/profilesettings" class="nav-link profile">

                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Pengaturan Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#Logout">
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

            <section class="content">
                @yield('content')
            </section>

        </div>


        @include('layout.footer')

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>





    <div class="modal fade" id="Logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin ingin logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <a href="/logout" class="btn btn-danger" type="button">Ya, Logout</a>
                </div>
            </div>
        </div>
    </div>




</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@yield('plugin')

</html>
