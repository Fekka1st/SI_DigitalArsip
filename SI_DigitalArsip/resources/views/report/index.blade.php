@extends('layout.Master')

@section('title')
    Report Berkas
@endsection

@section('rute')
    Report Berkas
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Report Berkas</h3>
        </div>

        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">



                <div class="row">

                    <form action="{{ route('report.cetak')}}" method="post">
                        {{ csrf_field() }}
                            <input type="date" class="form-control" name="mulai" id="Mulai"
                              hidden>
                            <input type="date" class="form-control" name="akhir" id="akhir"
                            hidden>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                            <i class="fa fa-print"></i> Cetak Pilihan
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Semua</button>
                    </form>
                    <div class="mb-2">
                    </div>
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
                                        Nama Berkas</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Standarisasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Kategori</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Sub-Kategori</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">Keterangan
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">
                                        Nama Staff
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">
                                        Tanggal Masuk
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($berkas as $data => $berkas)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $berkas->NamaBerkas }}</td>
                                    <td>{{ $berkas->nama_standarisasi }}</td>
                                    <td>{{ $berkas->Nama_Kategori }}</td>
                                    <td>{{ $berkas->Nama_SubKategori }}</td>
                                    <td>{{ $berkas->keterangan }}</td>
                                    <td>{{ $berkas->nama_staff }}</td>
                                    <td>{{ $berkas->created_at }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal  Tambah --}}
 <div class="modal fade" id="tambahModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Cetak Rekap Data </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form action="{{ route('report.cetak')}}" method="post">
                 {{ csrf_field() }}
                 <!-- Isi form kedua di sini -->
                 <div class="form-group">
                     <label for="nama">Mulai</label>
                     <input type="date" class="form-control" name="mulai" id="Mulai"
                       >
                     <div id="kodeWarning" class="text-danger"></div>
                 </div>
                 <h5>Sampai</h5>
                 <div class="form-group">
                     <label for="akhir">Akhir</label>
                     <input type="date" class="form-control" name="akhir" id="akhir"
                       >
                 </div>

                 <button type="submit" class="btn btn-primary">Cetak</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
             </form>
         </div>
         <div class="modal-footer">

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

const navLinks = document.querySelectorAll('.Report');
   const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

   navLinks.forEach(link => {
       link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
   });

   $(function() {
            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": [
                    "copy"
                    ,"excel"]
            });


            table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
