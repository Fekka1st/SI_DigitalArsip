@extends('layout.Master')

@section('title')
Kelola Kategori
@endsection

@section('rute')
Kelola Kategori
@endsection

@section('content')
@include('kelolakategori.form')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table List Kategori</h3>
    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                <i class="fa fa-plus"></i> Tambah Data
            </button>
            <div class="mb-2"></div>
            <div class="row">
                <div class="col-sm-12">
                    {{-- table --}}
                    <table id="tablekategori" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th width=30px>No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Nama Kategori
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Keterangan</th>
                                <th width=30px>Aksi
                                </th>
                            </tr>
                        </thead>
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
{{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}
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
    // $(function () {
    //     $("#example1").DataTable({
    //         "responsive": true,
    //         "lengthChange": true,
    //         "autoWidth": false,
    //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // });
    let table;
    $(document).ready(function () {
        table = $('#tablekategori').DataTable({
            "buttons": true,
            serverSide: true,
            processing: true,
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('kategori.data') }}",
                dataSrc: 'data'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'Nama_Kategori',
                    name: 'Nama_Kategori'
                },
                {
                    data: 'Keterangan',
                    name: 'Keterangan'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Membuat tombol ditambahkan ke dalam elemen yang benar
        table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $(document).on('click', '.btn-edit', function () {
            var dataId = $(this).data('id');
            var formAction = '/kelola_kategori/update/' + dataId;
            $('#editForm').attr('action', formAction);

            // Membuat permintaan Ajax untuk mendapatkan data informasi
            $.ajax({
                url: '/kelola_kategori/' + dataId + '/edit',
                method: 'GET',
                success: function (response) {
                    // Isi formulir penyuntingan dengan data yang diambil dari server
                    var data = response.kategori;
                    $('#editModal').find('#namakategori').val(data.Nama_Kategori);
                    $('#editModal').find('#keterangan').val(data.Keterangan);
                    $('#editModal').modal('show');
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Button Hapus
        $(document).on('click', '.btn-hapus', function () {
            console.log('Hapus');
            var dataId = $(this).data('id');
            $('#hapusModalForm').attr('action', '/kelola_kategori/' + dataId);
        });
    });

</script>


<script>
    const navLinks = document.querySelectorAll('.kategori');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>

@endsection
