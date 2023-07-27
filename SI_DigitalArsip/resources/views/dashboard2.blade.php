@extends('layout.Master')

@section('title')
Dashboard
@endsection

@section('rute')

@endsection

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card rounded">
                        <div class="card-body text-center">
                            <h1 class="display-4">Selamat Datang {{ auth()->user()->name }}</h1>
                            <img src="https://akupintar.id/documents/20143/0/ghvbhbhnmjh.png/33c38760-ea46-8ac8-2aac-d86430d11607?version=1.0&t=1642494197498&imagePreview=1"
                                alt="Gambar Selamat Datang" class="img-fluid mb-3">
                            <p class="lead">Anda telah berhasil Login ke Sistem Informasi Digital Arsip . Selamat
                                menggunakan aplikasi kami
                                dan
                                semoga hari Anda menyenangkan.</p>
                            <a href="/kelolaberkas" class="btn btn-primary">Mulai Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    // Ambil semua elemen dengan class "nav-link"
    const navLinks = document.querySelectorAll('.dashboard');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>
@endsection
