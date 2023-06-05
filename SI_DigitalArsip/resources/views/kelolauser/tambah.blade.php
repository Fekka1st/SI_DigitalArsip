@extends('layout.Master')

@section('title')
    Kelola User
@endsection

@section('rute')
    Kelola User
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
                        <a href="/kelolaberkas" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Kelola Berkas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kelolauser" class="nav-link active">
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
            <form action="/kelolauser/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama User</label>
                    <input type="text" class="form-control" name="name" id="name"
                        aria-describedby="Nama Kategori" placeholder="Masukan Nama User">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                    <label for="no_telp">No_Telp</label>
                    <input type="number" class="form-control" name="notelp" id="notelp" placeholder="81222222">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="*******">
                </div>

                <div class="form-group">
                    <label for="role">Role : </label>
                    <select id="role" class="form-control" name="role">
                        <option value="Internal">Internal</option>
                        <option value="External">External</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="filename">Pilih foto diupload:</label>
                    <input type="file" class="form-control" id="filename" name="filename">

                </div>
                <button type="submit" value="Simpan Data" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
