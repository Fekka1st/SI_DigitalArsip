@extends('layout.Master')

@section('title')
Kelola Berkas
@endsection

@section('rute')
Kelola Berkas
@endsection

@section('content')
@include('berkas.form')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table List Berkas</h3>
    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                <i class="fa fa-plus"></i> Tambah Data
            </button>
            <div class="mb-2"></div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="berkasTable" class="table table-bordered table-striped dataTable dtr-inline"
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
                                    Standar</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Kategori</th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Nama Staff</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Department</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Aksi
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugin')
{{-- <script>
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
});
</script>
--}}
<script> let table;
    $(document).ready(function () {
        table = $('#berkasTable').DataTable({
            select: true,
            serverSide: true,
            processing: true,
            responsive: true,
            lengthChange: true,
            autoWidth: false,

            ajax: {
                url: "{{ route('kelolaberkas.data') }}",
                dataSrc: 'data'
            },

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'created_at',
                    render: function (data, type, full, meta) {
                    // Memformat tanggal menggunakan moment.js
                    return moment(data).format('YYYY-MM-DD HH:mm:ss');
                    }
                },
                {
                    data: 'NamaBerkas',
                    name: 'NamaBerkas'
                },
                {
                    data: 'standarisasi.nama_standarisasi',
                    name: 'standarisasi.nama_standarisasi'
                },
                {
                    data: 'subkategori.Nama_SubKategori',
                    name: 'subkategori.Nama_SubKategori'
                },

                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'department.nama_departement',
                    name: 'department.nama_departement'
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
            var formAction = '/kelolaberkas/update/' + dataId;
            $('#editForm').attr('action', formAction);

            // Membuat permintaan Ajax untuk mendapatkan data informasi
            $.ajax({
                url: '/kelolaberkas/' + dataId + '/edit',
                method: 'GET',
                success: function (response) {
                    // Isi formulir penyuntingan dengan data yang diambil dari server
                    var data = response.berkas;
            $('#editForm').find('#NamaBerkas').val(data.NamaBerkas);
            $('#editForm').find('#keterangan').val(data.keterangan);
            $('#editForm').find('#id_standar').val(data.id_standarisasi);
            $('#editForm').find('#id_kategori').val(data.id_kategori);
            $('#editForm').find('#id_subkategori').val(data.id_subkategori);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.btn-detail', function () {
        var dataId = $(this).data('id');
        $.ajax({
            url: '/kelolaberkas/detail/' + dataId,
            method: 'GET',
            success: function (response) {
                // Isi modal detail dengan data yang diambil dari server
                var data = response.berkas;
                $('#detailmodal').find('.modal-body').html(`
                    <p><strong>Nama Berkas:</strong> ${data.NamaBerkas}</p>
                    <p><strong>Standar Berkas:</strong> ${data.standarisasi.nama_standarisasi}</p>
                    <p><strong>Kategori Berkas:</strong> ${data.kategori.Nama_Kategori}</p>
                    <p><strong>Sub kategori Berkas:</strong> ${data.subkategori.Nama_SubKategori}</p>
                    <p><strong>Keterangan:</strong> ${data.keterangan}</p>
                    <p><strong>Nama File:</strong> ${data.original_name}</p>
                    <p><strong>Nama Staff yang upload:</strong> ${data.user.name}</p>
                    <p><strong>Dari Departement:</strong> ${data.department.nama_departement}</p>
                `);
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Handle preview berkas
    $(document).on('click', '.btn-preview', function () {
        var fileUrl = $(this).data('url');
        // Lakukan logika preview sesuai dengan kebutuhan Anda
        // Contoh: Membuka berkas dalam tab baru atau menampilkan dalam elemen iframe
        window.open(fileUrl, '_blank');
    });

        // Button Hapus
        $(document).on('click', '.btn-hapus', function () {
            console.log('Hapus');
            var dataId = $(this).data('id');
            $('#hapusModalForm').attr('action', '/kelolaberkas/' + dataId);
        });
    });
        </script>



<script>
    const navLinks = document.querySelectorAll('.berkas');
    const currentPath = window.location.pathname;

    navLinks.forEach(link => {
        link.classList.add('active');
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script>
    function validateFile() {
        const fileInput = document.getElementById('filename');
        const fileSize = fileInput.files[0].size;
        const maxSize = 2 * 1024 * 1024;
        const allowedExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
        const fileName = fileInput.value.toLowerCase();
        const fileExtension = fileName.split('.').pop();
        if (!allowedExtensions.includes(fileExtension)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jenis file tidak valid. Hanya diperbolehkan: PDF, DOC, DOCX, XLS, XLSX',
            });
            fileInput.value = '';
            return false;
        }
        if (fileSize > maxSize) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File terlalu besar. Maksimal 2 MB.',
            });
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
