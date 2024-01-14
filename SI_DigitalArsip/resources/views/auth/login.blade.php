<x-auth-session-status class="mb-4" :status="session('status')" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .wrap-input100 {
        position: relative;
    }

    .show-hide-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .show-password {
        display: none;
    }

</style>
<link href="{{ asset('/dist/css/layanan.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title"
                style="background-image: url(https://jabar.pojoksatu.id/wp-content/uploads/2015/08/univ-suryakencana.jpg);">
                <div class="login100-form-title-1">
                    <span class="moving-text">Sistem Digital Arsip</span>
                </div>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Email</span>
                    <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email"
                        name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <span class="focus-input100 invalid-feedback" role="alert"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                    <span class="label-input100">{{ __('Password') }}</span>
                    <input class="input100 form-control @error('password') is-invalid @enderror" type="password"
                        name="password" required autocomplete="current-password" id="password-input">
                    <span class="focus-input100"></span>
                    <i class="show-hide-icon fas fa-eye" id="show-password-icon"></i>
                    <i class="show-hide-icon fas fa-eye-slash show-password" id="hide-password-icon"></i>
                </div>


                <button type="submit" class="login100-form-btn bg-primary">
                    Login
                </button>

            </form>
            <div class="footer" style="background-color:#365757" >
                <h5 class="text-center text-white">Hubungi Admin Jika Mengalami Masalah</h5>
            </div>
        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#show-password-icon').click(function () {
            $('#password-input').attr('type', 'text');
            $('.show-password').show();
            $(this).hide();
        });

        $('.show-password').click(function () {
            $('#password-input').attr('type', 'password');
            $('#show-password-icon').show();
            $(this).hide();
        });
    });

</script>
