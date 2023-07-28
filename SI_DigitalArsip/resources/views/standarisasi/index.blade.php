@extends('layout.Master')

@section('title')
Standarisasi
@endsection

@section('rute')
    Standarisasi
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table List Standar</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <a href="{{ route('standar.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tombol Tambah"><i class="fa fa-plus"></i> Tambah</a>
            <div class="mb-2"></div>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending">Nama Standar
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                    Keterangan</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Engine version: activate to sort column ascending">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($standar as $item => $standars)
                                    <tr class="odd">

                                        <td>{{ $item + 1 }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $standars->nama_standarisasi }}
                                        </td>
                                        <td>{{ $standars->keterangan }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <a type="button" href="/standar/edit/{{ $standars->id }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Tombol Edit"><i class="fas fa-edit"></i></a>
                                            <a type="button" href="/standar/delete/{{ $standars->id }}"class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Tombol Hapus"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                        </tbody>
                       
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

<script>
     const navLinks = document.querySelectorAll('.Standar');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });
</script>

@endsection
