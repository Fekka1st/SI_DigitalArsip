@extends('layout.Master')

@section('title')
Dashboard
@endsection

@section('rute')

@endsection

@section('content')
<div class="container-fluid">
    <div class="card-header">
        <h1>Beranda</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="card rounded">
                <div class="card-body">
                    <div class="card-header">
                        <h4>Selamat Datang</h4>
                    </div>
                    <div>
                        <div class="text-center">
                            <img src="{{$user->url}}" alt="Gambar Selamat Datang" class="img-fluid rounded mb-3"
                                width="200" height="400">
                            <p>{{$user->name}}</p>
                        </div>
                        <p class="lead">
                            <table>
                                <thead>
                                    <tr>
                                        <td><b>Tanggal Register </b> {{$user->created_at}}</td </tr> <tr>
                                        <td><b>Departement </b> {{$department->nama_departement	}}</td </tr> <tr>
                                        <td><b>Email </b> {{$user->email}}</td </tr> <tr>
                                        <td><b>No Telpon </b> {{$user->no_telp}}</td </tr> </thead> <tbody>
                                        </tbody>
                            </table>
                        </p>
                        <a href="/kelolaberkas" class="btn btn-primary">Mulai Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-9">
            <div class="card rounded">
                <div class="card-body">
                    <div class="card-header">
                        <h4>Visualisasi Data Riwayat Unduhan</h4>
                        <canvas id="myChart" width="1000" height="420"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
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
   var chartData = @json($chartData);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.map(item => item.day),
            datasets: [{
                label: 'Jumlah Berkas per Hari',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: chartData.map(item => item.count),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                    ticks: {
                        min: 1,
                        max: 1000,
                    }
                }
            }
        }
    });
    const navLinks = document.querySelectorAll('.dashboard');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>
@endsection
