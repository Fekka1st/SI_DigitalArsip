@extends('layout.Master')

@section('title')
Riwayat Unduh
@endsection

@section('rute')
Riwayat Unduh
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Riwayat Unduh</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            {{-- <a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
            --}}
            <div class="mb-2">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th>No
                                </th>
                                <th>
                                    Nama Berkas</th>
                                <th>Nama Staff
                                </th>
                                <th>Department
                                </th>
                                <th>
                                    Tanggal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($download as $item => $downloads)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $downloads->namaberkas }}
                                </td>
                                <td>{{ $downloads->namastaff }}</td>
                                <td>{{ $downloads->department }}</td>
                                <td>{{ $downloads->tanggal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('plugin')
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
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>

<script>
    const navLinks = document.querySelectorAll('.download');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>

@endsection
