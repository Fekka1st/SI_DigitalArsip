@extends('layout.Master')

@section('title')
    Kategori
@endsection

@section('rute')
    Kategori Update
@endsection
@section('select')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="https://e-arsip.kopegtelkp.com/public/logo-fullkpg.png" alt="AdminLTE Logo" class="img-circle "
                style="opacity: .8;background-color:white" height="60" width="60">
            <span class="brand-text font-weight-bold">SISTEM INFORMASI
            </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <span class="brand-text font-weight-bold text-white ml-5">DIGITAL ARSIP
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
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fa-solid fa-house"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kategori" class="nav-link active active">
                            <i class="nav-icon fa-solid fa-book"></i>
                            <p>
                                Kelola Kategori
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/sub-kategori" class="nav-link">
                            <i class="nav-icon fa-solid fa-book"></i>
                            <p>
                                Kelola SubKategori
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kelolaberkas" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Kelola Berkas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kelolauser" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kelola User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/aktifitas" class="nav-link">
                            <i class="nav-icon fa-solid fa-chart-line"></i>
                            <p>
                                Aktifitas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
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
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
        </div>

        <div class="col-md-3">
            @foreach ($kategori as $data)
                <form action="/kategori/update" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="namakategori">Nama Kategori</label>
                        <input type="text" class="form-control" name="namakategori" id="namakategori"
                            aria-describedby="Nama Kategori" placeholder="Masukan Nama kategori"
                            value="{{ $data->Nama_Kategori }}">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="........"
                            value="{{ $data->Keterangan }}">
                        <input hidden type="text" class="form-control" name="id" id="id"
                            placeholder="........" value="{{ $data->id }}">
                    </div>
                    <button type="submit" value="Simpan Data" class="btn btn-primary">Submit</button>
                </form>
        </div>
        @endforeach
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('plugin')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
    // Ambil semua elemen dengan class "nav-link"
    const navLinks = document.querySelectorAll('.kategori');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });
    </script>
@endsection
