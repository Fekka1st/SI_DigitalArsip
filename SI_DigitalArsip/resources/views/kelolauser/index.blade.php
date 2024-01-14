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
                                        {{-- <a type="button" href="/kelolauser/detail/{{ $user->id }}"
                                        class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Tombol Detail"><i class="fas fa-info-circle"></i></a> --}}
                                        <a type="button" href="#" class="btn btn-info btn-edit" id="btn-edit"
                                            data-toggle="modal" data-target="#detail" data-id="{{ $user->id }}">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a type="button" href="/kelolauser/delete/{{ $user->id }}"
                                            class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                            title="Tombol Hapus"><i class="fas fa-trash-alt"></i></a>

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
</div>
{{-- modal Info --}}
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">

                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b> Nama : </b></h2>
                                    <p class="text-muted text-sm"><b>Jabatan: </b>
                                    </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><span id="emailPlaceholder">EMAIL DISINI</span></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><span id="phonePlaceholder">NO TELPON DISINI</span></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="" class="btn btn-sm bg-teal">
                                    Pergi Ke Whatsapp <i class="fa-brands fa-whatsapp"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-primary " id="emailLink">
                                    Pergi Ke Email <i class="fa-regular fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
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
<script>
    $(document).on('click', '.btn-edit', function () {
        var dataId = $(this).data('id');
        $.ajax({
            url: '/kelolauser/' + dataId + '/detail',
            method: 'GET',
            success: function (response) {
                $('#detail').find('.modal-title').text('Detail User');
                $('#detail').find('.card-header').text(response.user.role);
                $('#detail').find('.lead b').text('Nama : ' + response.user.name);
                $('#detail').find('.text-muted.text-sm b').text('Jabatan: ' + response.user
                .Jabatan);

                $('#emailPlaceholder').text('Email: ' +response.user.email);
                $('#phonePlaceholder').text('No Telpon: ' +response.user.no_telp);

                $('#detail').find('.img-circle.img-fluid').attr('src', response.user.url);

                // Atur tautan Whatsapp dan Email
                $('#detail').find('.bg-teal').attr('href', 'https://wa.me/' + response.user
                .no_telp);
                // Atur tautan Email
                $('#emailLink').attr('href', 'mailto:' + response.user.email);
                // Buka modal
                $('#detail').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

</script>
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
