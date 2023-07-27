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
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table List Berkas</h3>
    </div>
    <h2>Filter Tabel Berdasarkan Tanggal</h2>

    <div>
        <label for="startDate">Tanggal Mulai:</label>
        <input type="date" id="startDate">
        <label for="endDate">Tanggal Akhir:</label>
        <input type="date" id="endDate">
        <button id="filterByDate" class="btn btn-primary">Filter</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <a href="{{ route('kelolaberkas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
            <div class="mb-2"></div>

            @if (session('success'))
            <div id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div id="success-alert" class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    setTimeout(function () {
                        $("#success-alert").fadeOut("slow");
                    }, 2000); // Mengatur waktu tampilan alert (dalam milidetik)
                });

            </script>

            
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Tanggal
                                    Upload
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Nama Berkas</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Standart</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Kategori</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Nama Staff</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berkas as $item => $data)
                            <tr class="odd">

                                <td>{{ $item + 1 }}</td>
                                <td class="dtr-control sorting_1" tabindex="0">
                                    {{ $data->tanggal }}
                                </td>
                                <td>{{ $data->NamaBerkas }}</td>
                                <td>{{ $data->nama_standarisasi }}</td>
                                <td>{{ $data->Nama_Kategori }}</td>
                                <td>{{ $data->name }}</td>

                                <td>
                                    <a href="/kelolaberkas/edit/{{ $data->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/kelolaberkas/delete/{{ $data->id }}" class="btn btn-danger">hapus</a>
                                    <a href="/kelolaberkas/download/{{ $data->id }}" class="btn btn-info">Download</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        {{-- <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Rendering engine</th>
                            <th rowspan="1" colspan="1">Browser</th>
                            <th rowspan="1" colspan="1">Platform(s)</th>
                            <th rowspan="1" colspan="1">Engine version</th>
                            <th rowspan="1" colspan="1">CSS grade</th>
                        </tr>
                    </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
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
$(function () {
    var table = $("#example1").DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        buttons: [
            {
                extend: 'print',
                text: 'Cetak',
                exportOptions: {
                    columns: [0, 1, 2,3,4,5],
                    visible: false
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [0, 1, 2,3,4,5],
                    visible: false
                }
            },
            {
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                    columns: [0, 1, 2,3,4,5],
                    visible: false
                }
            },
            {
                extend: 'copy',
                text: 'Copy',
                exportOptions: {
                    columns: [0, 1, 2,3,4,5],
                    visible: false
                }
            }
        ]
    });

    $('#filterByDate').on('click', function () {
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();

                // Filter data berdasarkan rentang tanggal
                table.columns(1).search(function (value, index) {
            var currentDate = new Date(value);
            return (currentDate >= startDate && currentDate <= endDate);
        }).draw();
            });
    table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

</script>
@endsection
