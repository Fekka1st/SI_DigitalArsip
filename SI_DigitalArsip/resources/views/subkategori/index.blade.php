@extends('layout.Master')

@section('title')
Kelola Sub-Kategori
@endsection

@section('rute')
Kelola Sub-Kategori
@endsection


@section('content')
@include('subkategori.form')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table List Sub-Kategori</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                <i class="fa fa-plus"></i> Tambah Data
            </button>
            <div class="mb-2"></div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered data-table table-striped dataTable dtr-inline" id="subkategoriTable">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th width="20px">Aksi</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endsection


    @section('plugin')
    <script>
        let table;
        $(document).ready(function () {
            table = $('#subkategoriTable').DataTable({
                select: true,
                serverSide: true,
                processing: true,
                responsive: true,
                lengthChange: true,
                autoWidth: false,
                ajax: {
                    url: "{{ route('subkategori.data') }}",
                    dataSrc: 'data'
                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'Nama_SubKategori',
                        name: 'Nama_SubKategori'
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
                    },


                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10', '25', '50', 'Semua']
                ],


            });
            table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $(document).on('click', '.btn-edit', function () {
                var dataId = $(this).data('id');
                var formAction = '/kelola_sub-kategori/update/' + dataId;
                $('#editForm').attr('action', formAction);
                $.ajax({
                    url: '/kelola_sub-kategori/' + dataId + '/edit',
                    method: 'GET',
                    success: function (response) {
                        var data = response.subkategori;
                        $('#editModal').find('#nama').val(data.Nama_SubKategori);
                        $('#editModal').find('#Keterangan').val(data.Keterangan);
                        $('#editModal').modal('show');
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
            $(document).on('click', '.btn-hapus', function () {
                console.log('Hapus');
                var dataId = $(this).data('id');
                $('#hapusModalForm').attr('action', '/kelola_sub-kategori/' + dataId);
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
        // Ambil semua elemen dengan class "nav-link"
        const navLinks = document.querySelectorAll('.sub');
        const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

        navLinks.forEach(link => {
            link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
        });

    </script>
    @endsection
    @section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    @endsection
