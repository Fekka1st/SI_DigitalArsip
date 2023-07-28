@extends('layout.Master')

@section('title')
    Kelola User
@endsection

@section('rute')
    Kelola User
@endsection

@section('content')
    <div class="registration-form">
        @foreach ($user as $data)
        <form action="/profilesettings/update" method="post" enctype="multipart/form-data"> 
            @csrf
            @method('PATCH')
            <div class="form-icon" id="preview-container">
                <span>
                    <i class="fas fa-user" id="icon-placeholder"></i>
                    <img id="preview-image" src="" alt="" style="display: none; max-width: 150px; max-height: 150px; border-radius: 35%;">
                </span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="name" id="name" placeholder="Nama" value="{{$data->name}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control item" name="email" id="email" placeholder="Email" value="{{$data->email}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="notelp" id="notelp" placeholder="No Telpon" value="{{$data->no_telp}}">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item"name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group row">
                <div class="col-sm-5 text-right">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePasswordVisibility()">
                        <label class="form-check-label" for="showPassword">Tampilkan Password</label>
                    </div>
                </div>
                <div class="col-sm-6 ">
                </div>
            </div>
            <div class="form-group">
                <select class="form-control" id="role" name="role" value="{{$data->role}}">
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="form-group">
                <label for="profile-picture">Profile Picture:</label> <p>*Abaikan jika tidak ingin ganti foto profile</p>
                <input type="file" class="form-control" id="profile-picture" name="filename">
                <input hidden type="text" class="form-control" name="id" id="id"
                placeholder="........" value="{{ $data->id }}">
            </div>
            
            <div class="form-group">
                <button type="submit" value="Simpan Data" class="btn btn-block create-account">Edit Akun</button>
            </div>
        </form>
        @endforeach
        <div class="social-media">
            <h4>GOO</h4>
        </div>
    </div>
@endsection

@section('plugin')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script >
    $(document).ready(function(){
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
    const profilePictureInput = document.getElementById('profile-picture');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');
    const iconPlaceholder = document.getElementById('icon-placeholder');

    profilePictureInput.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                iconPlaceholder.style.display = 'none';
                previewImage.src = reader.result;
                previewImage.style.display = 'block';
            });

            reader.readAsDataURL(file);
        } else {
            // Reset the preview if no file is selected
            iconPlaceholder.style.display = 'block';
            previewImage.src = '#';
            previewImage.style.display = 'none';
        }
    });
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
    body{
    background-color: #dee9ff;
}

.registration-form{
	padding: 50px 0;
}

.registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
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

.registration-form .item{
	border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 600px;
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

.registration-form .social-icons{
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
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

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}
</style>
@endsection

