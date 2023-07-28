@extends('layout.Master')

@section('title')
Standarisasi
@endsection

@section('rute')
Standarisasi
@endsection

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center"> <!-- Menampilkan card di tengah kolom -->
        <div class="col-md-6 mt-4 mt-md-0">
            <div class="card rounded-card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Tambah Standar</h5>
                </div>
                <div class="card-body">
                    @foreach ($standar as $data)
                    <form action="/standar/update" method="post">
                        @csrf
                        @method('PATCH')
                        <!-- Isi form kedua di sini -->
                        <div class="form-group">
                            <label for="input3">Nama Standar</label>
                            <input type="text" class="form-control" name="namastandar" id="namastandar"
                            aria-describedby="Nama Standar" placeholder="Masukan Nama Standar" value="{{$data->nama_standarisasi}}"required>
                        </div>
                        <div class="form-group">
                            <label for="input4">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="........" value="{{$data->keterangan}}"required>
                        </div>
                        <input hidden type="text" class="form-control" name="id" id="id"
                            placeholder="........" value="{{ $data->id }}">
                        <button type="submit" value="Simpan Data" class="btn btn-primary">Submit</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection


<script>
     const navLinks = document.querySelectorAll('.Standar');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });
</script>

@endsection