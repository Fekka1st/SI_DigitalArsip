@extends('layout.Master')

@section('title')
Daftar
@endsection

@section('Rute')
Dashboard
@endsection

@section('content')
<div class="container-fluid">

    <!-- Small boxes (Stat box) -->

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $berkas }}</h3>

                    <p>JUMLAH BERKAS</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-file"></i>
                </div>
                <a href="/kelola_berkas" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $kategori }}</h3>

                    <p>JUMLAH KATEGORI</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-table-list"></i>
                </div>
                <a href="/kelola_kategori" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $akun }}</h3>

                    <p>JUMLAH USER</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <a href="/kelolauser" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $aktifitas }}</h3>

                    <p>Jumlah Aktifitas</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <a href="/aktifitas" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>


</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="col-6"></div>
                    <h1 class="font-weight-Normal"> Selamat Datang {{ auth()->user()->name }}


                        <br> Sistem Informasi Digital Arsip </h1>
                    <img width="300" height="300" src="assets/img/jobs.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>Report Jumlah Berkas</h4>
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>Report Jumlah Aktifitas</h4>
                    <canvas id="myChart2" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('plugin')

<script>
    // Ambil data dari controller
    var chartData = @json($chartData);


    // Proses data dan buat grafik
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Ubah tipe grafik menjadi line
        data: {
            labels: chartData.map(item => item.month),
            datasets: [{
                label: 'Jumlah Berkas per Bulan',
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
                        min: 1, // Nilai minimum
                        max: 1000, // Nilai maksimum
                    }
                }
            }
        }
    });

    var chartData = @json($aktifitasData);


    // Proses data dan buat grafik
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Ubah tipe grafik menjadi line
        data: {
            labels: chartData.map(item => item.day),
            datasets: [{
                label: 'Jumlah Aktifitas per Hari',
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
                        min: 1, // Nilai minimum
                        max: 1000, // Nilai maksimum
                    }
                }
            }
        }
    });

</script>
<script>
    // Ambil semua elemen dengan class "nav-link"
    const navLinks = document.querySelectorAll('.dashboard');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
