@extends('layout.Master')

@section('title')
    Kelola Berkas
@endsection

@section('rute')
    Kelola Berkas
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
                        <a href="/kategori" class="nav-link ">
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
                        <a href="/kelolaberkas" class="nav-link active">
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
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/kelolaberkas" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="NamaBerkas">Nama Berkas</label>
            <input type="text" class="form-control" name="NamaBerkas" id="NamaBerkas" placeholder="Masukkan Nama Berkas"
                required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" required></textarea>
        </div>

        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="form-control" name="id_kategori" id="id_kategori" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kategoris)
                    <option value="{{ $kategoris->id }}">{{ $kategoris->Nama_Kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_subkategori">Subkategori</label>
            <select class="form-control" name="id_subkategori" id="id_subkategori" required>
                <option value="">Pilih Subkategori</option>
                @foreach ($subkategori as $subkategoris)
                    <option value="{{ $subkategoris->id }}">{{ $subkategoris->Nama_SubKategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="filename">File Berkas</label>
            <input type="file" class="form-control" name="filename" id="filename" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
