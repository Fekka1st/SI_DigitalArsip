@extends('layout.Master')

@section('title')
    Sub Kategori
@endsection

@section('rute')
    Sub Kategori Update
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
                    @foreach ($subkategori as $data)
                    <form action="/sub-kategori/update" method="post">
                        @csrf
                        @method('PATCH')
                        <!-- Isi form kedua di sini -->
                        <div class="form-group">
                            <label for="input3">Nama Kategori</label>
                            <input type="text" class="form-control" name="namakategori" id="namakategori"
                            aria-describedby="Nama Standar" placeholder="Masukan Nama Standar" value="{{$data->Nama_SubKategori}}"required>
                        </div>
                        <div class="form-group">
                            <label for="input4">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="........" value="{{$data->Keterangan}}"required>
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
