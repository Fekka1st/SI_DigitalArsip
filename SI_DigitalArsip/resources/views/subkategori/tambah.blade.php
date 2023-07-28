@extends('layout.Master')

@section('title')
    Sub Kategori
@endsection

@section('rute')
    Sub Kategori Tambah
@endsection

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center"> <!-- Menampilkan card di tengah kolom -->
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="card rounded-card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Tambah Kategori</h5>
                </div>
                <div class="card-body">
                    <form action="/sub-kategori/store" method="post">
                        {{ csrf_field() }}
                        <!-- Isi form kedua di sini -->
                        <div class="form-group">
                            <label for="input3">Nama Kategori</label>
                            <input type="text" class="form-control" name="namakategori" id="namakategori"
                            aria-describedby="Nama Kategori" placeholder="Masukan Nama kategori"required>
                        </div>
                        <div class="form-group">
                            <label for="input4">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="........"required>
                        </div>
                        <button type="submit" value="Simpan Data" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugin')
<script>
    // Ambil semua elemen dengan class "nav-link"
    const navLinks = document.querySelectorAll('.sub');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });
    </script>
@endsection
