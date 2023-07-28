@extends('layout.Master')

@section('title')
Kelola User
@endsection

@section('rute')
Kelola User
@endsection



@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table List User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <a href="{{ route('kelolauser.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Nama
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    No Telpon</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item => $user)
                            <tr class="odd">

                                <td>{{ $item + 1 }}</td>
                                <td class="dtr-control sorting_1" tabindex="0">
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->no_telp }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" href="/kelolauser/edit/{{ $user->id }}" class="btn btn-warning"
                                            data-toggle="tooltip" data-placement="top" title="Tombol Edit"><i
                                                class="fas fa-edit"></i></a>
                                                <a type="button" href="/kelolauser/detail/{{ $user->id }}"
                                                    class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                                    title="Tombol Detail"><i class="fas fa-info-circle"></i></a>
                                        <a type="button" href="/kelolauser/delete/{{ $user->id }}"
                                            class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                            title="Tombol Hapus"><i class="fas fa-trash-alt"></i></a>
                                     
                                    </div>
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
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>

<script>
    const navLinks = document.querySelectorAll('.user');
   const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

   navLinks.forEach(link => {
       link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
   });
</script>
@endsection
