@extends('layout.Master')

@section('title')
    Aktifitas
@endsection

@section('rute')
    AKTIFITAS
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">History Aktifitas Sistem</h3>
        </div>

        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Filter
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item filter-button" href="#" data-aktifitas="">Semua</a>
                        <a class="dropdown-item filter-button" href="#" data-aktifitas="Menambahkan">Menambahkan</a>
                        <a class="dropdown-item filter-button" href="#" data-aktifitas="Hapus">Hapus</a>
                        <a class="dropdown-item filter-button" href="#" data-aktifitas="Mengedit">Mengedit</a>
                    </div>
                </div>
                <div class="mb-2">
                </div>
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
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Kegitatan Aktifitas</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">Staff
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">
                                        Tanggal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aktifitas as $item => $aktifitas)
                                    <tr class="odd">

                                        <td>{{ $item + 1 }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $aktifitas->Aktifitas }}
                                        </td>
                                        <td>{{ $aktifitas->Staff }}</td>
                                        <td>{{ $aktifitas->created_at }}</td>


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
          function filterByAktifitas(aktifitas) {
        var table = $("#example1").DataTable();
        table.column(1).search(aktifitas).draw();
        console.log(aktifitas);

        if(aktifitas == ""){
        $(".btn-primary.dropdown-toggle").text("Filter");
        }else{
        $(".btn-primary.dropdown-toggle").text("Filter : "+aktifitas);
        }
    }
         $(function() {
            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });

            // Fungsi untuk menambahkan filter berdasarkan tipe aktifitas
            $(".filter-button").on("click", function(event) {
            event.preventDefault();
            var aktifitas = $(this).data("aktifitas");
            filterByAktifitas(aktifitas);
        });
            table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>

<script>
const navLinks = document.querySelectorAll('.aktifitas');
   const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

   navLinks.forEach(link => {
       link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
   });
</script>
@endsection
