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
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
{{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Menampilkan card di tengah kolom -->
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="card rounded-card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Tambah Berkas</h5>
                </div>
                <div class="card-body">
                    <form action="/kelolaberkas" method="post" enctype="multipart/form-data">

                        @csrf
                        <!-- Isi form kedua di sini -->
                        <div class="form-group">
                            <label for="input3">Nama Berkas</label>
                            <input type="text" class="form-control" name="NamaBerkas" id="NamaBerkas"
                                aria-describedby="Nama Standar" placeholder="Masukan Nama Standar">
                        </div>
                        <div class="form-group">
                            <label for="input4">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan"
                                placeholder="........" required>
                        </div>
                        <div class="form-group">
                            <label for="id_standar">Standar</label>
                            <select class="form-control" name="id_standar" id="id_standar" required>
                                <option value="">Pilih Standar</option>
                                @foreach ($standar as $standars)
                                <option value="{{ $standars->id }}">{{ $standars->nama_standarisasi }}</option>
                                @endforeach
                            </select>
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

                        <button type="submit" value="Simpan Data" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="p-0 flex-grow-1">
                                {{-- <h5 class="mt-2 mb-0">
                                 Tambah Berkas
                                </h5> --}}
                                <h5>
                                    <span class="badge badge-primary">
                                       TAMBAH BERKAS
                                    </span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/kelolaberkas" method="post" enctype="multipart/form-data">

                            @csrf
                            <!-- Isi form kedua di sini -->
                            <div class="form-group">
                                <label for="input3">Nama Berkas</label>
                                <input type="text" class="form-control" name="NamaBerkas" id="NamaBerkas"
                                    aria-describedby="Nama Standar" placeholder="Masukan Nama Standar">
                            </div>
                            <div class="form-group">
                                <label for="input4">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan"
                                    placeholder="........" required>
                            </div>
                            <div class="form-group">
                                <label for="id_standar">Standar</label>
                                <select class="form-control" name="id_standar" id="id_standar" required>
                                    <option value="">Pilih Standar</option>
                                    @foreach ($standar as $standars)
                                    <option value="{{ $standars->id }}">{{ $standars->nama_standarisasi }}</option>
                                    @endforeach
                                </select>
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

                            {{-- <div class="form-group">
                                <label for="filename">File Berkas</label>
                                <input type="file" class="form-control" name="filename" id="filename" required>
                            </div> --}}
                            <label for="filename">File Berkas</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="filename" id="filename" required aria-describedby="inputGroupFileAddon01">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>

                            <div class="d-flex text-center justify-content-between">
                                <button type="button" onclick="window.history.go(-1); return false;" class="flex-shrink-1 btn btn-danger"> Kembali</button>
                                <button type="submit" class="ml-2 flex-fill btn btn-primary"> Simpan Berkas</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('plugin')
<script>
    const navLinks = document.querySelectorAll('.berkas');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>
@endsection
