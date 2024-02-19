@extends('layout.Master')

@section('title')
Kelola Departement
@endsection

@section('rute')
Kelola Departement
@endsection

@section('content')
@include('keloladepartment.form')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table List Departement</h3>
    </div>

    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                <i class="fa fa-plus"></i> Tambah Data
            </button>
            {{-- Table --}}
            <div class="mb-2"></div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered data-table" id="departementTable">
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
    </div>
</div>


@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}
@endsection

@section('plugin')
<script>
    let table;
    $(document).ready(function () {
        table = $('#departementTable').DataTable({
            select: true,
            serverSide: true,
            processing: true,
            responsive: true,
            lengthChange: true,
            autoWidth: false,

            ajax: {
                url: "{{ route('department.data') }}",
                dataSrc: 'data'
            },

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_departement',
                    name: 'nama_departement'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
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

        // Membuat tombol ditambahkan ke dalam elemen yang benar
        table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $(document).on('click', '.btn-edit', function () {
            var dataId = $(this).data('id');
            var formAction = '/kelola_departement/update/' + dataId;
            $('#editForm').attr('action', formAction);

            // Membuat permintaan Ajax untuk mendapatkan data informasi
            $.ajax({
                url: '/kelola_departement/' + dataId + '/edit',
                method: 'GET',
                success: function (response) {
                    // Isi formulir penyuntingan dengan data yang diambil dari server
                    var data = response.departement;
                    $('#editModal').find('#nama').val(data.nama_departement);
                    $('#editModal').find('#Keterangan').val(data.keterangan);
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
            $('#hapusModalForm').attr('action', '/kelola_departement/' + dataId);
        });
    });

</script>
<script>
    const navLinks = document.querySelectorAll('.departement');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>
<!-- DataTables  & Plugins -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

{{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> --}}
@endsection
