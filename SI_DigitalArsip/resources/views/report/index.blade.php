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

        <div class="row">
            <form action="{{ route('report.cetak')}}" method="post">
                {{ csrf_field() }}
                <input type="date" class="form-control" name="mulai" id="Mulai" hidden>
                <input type="date" class="form-control" name="akhir" id="akhir" hidden>

                <div class="row">
                    <div class="col-6 mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                            <i class="fa fa-print"></i> Cetak Pilihan
                        </button>
                    </div>
                    <div class="col-6 mb-2">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Semua</button>
                    </div>
                </div>



            </form>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Nama Standar</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Jumlah Berkas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($berkas as $data => $berkas)
                                <tr>
                                    <td>{{ $data + 1 }}</td>
                                    <td>{{ $berkas->nama_standarisasi }}</td>
                                    <td>{{ $berkas->jumlah_berkas }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4>Report Jumlah Berkas Berdasarkan Standar</h4>
                                    <canvas id="myChart" width="400" height="200"></canvas>
                                </div>
                            </div>
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
    var chartData = @json($chart);


// Proses data dan buat grafik
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line', // Ubah tipe grafik menjadi line
    data: {
        labels: chartData.map(item => item.nama_standarisasi),
        datasets: [{
            label: 'Jumlah Berkas per Bulan',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: chartData.map(item => item.jumlah_berkas),
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false,
                ticks: {
                    min: 1, // Nilai minimum
                    max: 1000, // Nilai maksimum
                }
            }
        }
    }
});
</script>

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
