@extends('layout.Master')

@section('title')
Pengaturan Profile
@endsection

@section('rute')
Pengaturan Profile
@endsection


@section('content')
<div class="registration-form">
    @foreach ($user as $data)
    <form action="/profilesettings/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="text-center">
            <img src="{{$data->url}}" class="img-thumbnail rounded" style="height: 200px; width: 200px " alt="">
            <p>FOTO PROFILE</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control item" name="name" id="name" placeholder="Nama"
                        value="{{$data->name}}">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control item" name="email" id="email" placeholder="Email"
                        value="{{$data->email}}">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-8">
                <label for="notelpon">Nomor Telpon:</label>
                <input type="text" class="form-control item" name="notelp" id="notelp" placeholder="No Telpon"
                    value="{{$data->no_telp}}">
                <label for="profile-picture">Profile Picture:</label>
                <input type="file" class="form-control-file " name="filename">
                <p>*Abaikan jika tidak ingin ganti foto profile</p>
            </div>
            <div class="form-group col-8">
                <label for="Password">Password</label>
                <input type="password" class="form-control item" name="password" id="password" placeholder="Password">
            </div>
            <div class="input-group mb-3"> </div>
            <div class="form-group col-6">
                <button type="submit" value="Simpan Data" class="btn btn-block create-account">Simpan Pengaturan</button>
            </div>
        </div>
    </form>
    @endforeach
    {{-- <div class="social-media"> --}}

</div>
</div>
@endsection

@section('plugin')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
</script>
<script>
    $(document).ready(function () {
        $('#notelp').mask('0000-0000-0000-0000');
    });

</script>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var showPasswordCheckbox = document.getElementById('showPassword');

        // Jika checkbox dicentang, ubah tipe input menjadi "text"
        // Jika tidak dicentang, ubah tipe input menjadi "password" kembali
        passwordInput.type = showPasswordCheckbox.checked ? 'text' : 'password';
    }

</script>


<script>
    const navLinks = document.querySelectorAll('.profile');
    const currentPath = window.location.pathname; // Mendapatkan path dari URL saat ini

    navLinks.forEach(link => {
        link.classList.add('active'); // Tambahkan class "active" pada link yang sesuai dengan halaman aktif
    });

</script>
@endsection




@section('css')
<style>
    .form-control {
        padding-bottom: 38px;
        border-radius: 20px;
        padding-left: 10px;
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: -0.625rem 0.75rem;
        padding-top: 10px;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 15px;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    body {
        background-color: #dee9ff;
    }

    .registration-form {
        padding: 0px 0;
    }

    .registration-form form {
        background-color: #fff;
        max-width: 1200px;
        margin: auto;
        padding: 50px 70px;
        border-radius: 30px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .form-icon {
        text-align: center;
        background-color: #5891ff;
        border-radius: 50%;
        font-size: 40px;
        color: white;
        width: 100px;
        height: 100px;
        margin: auto;
        margin-bottom: 50px;
        line-height: 100px;
    }

    .registration-form .item {
        border-radius: 20px;
        margin-bottom: 25px;
        padding: 10px 20px;
    }

    .registration-form .create-account {
        border-radius: 30px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #5791ff;
        border: none;
        color: white;
        margin-top: 20px;
    }

    .registration-form .social-media {
        max-width: 1200px;
        background-color: #fff;
        margin: auto;
        padding: 35px 0;
        text-align: center;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        color: #9fadca;
        border-top: 1px solid #dee9ff;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .social-icons {
        margin-top: 30px;
        margin-bottom: 16px;
    }

    .registration-form .social-icons a {
        font-size: 23px;
        margin: 0 3px;
        color: #5691ff;
        border: 1px solid;
        border-radius: 50%;
        width: 45px;
        display: inline-block;
        height: 45px;
        text-align: center;
        background-color: #fff;
        line-height: 45px;
    }

    .registration-form .social-icons a:hover {
        text-decoration: none;
        opacity: 0.6;
    }

    @media (max-width: 576px) {
        .registration-form form {
            padding: 50px 20px;
        }

        .registration-form .form-icon {
            width: 70px;
            height: 70px;
            font-size: 30px;
            line-height: 70px;
        }
    }

</style>
@endsection
