<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPENSA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="{{ asset("/adminlte/img/favicon.ico") }}">
    <!-- <link rel="icon" type="image/png" href="{{ asset("/loginv4/images/icons/favicon.ico") }}"/> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/vendor/bootstrap/css/bootstrap.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset("/loginv4/fonts/font-awesome-4.7.0/css/font-awesome.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset("/loginv4/fonts/iconic/css/material-design-iconic-font.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/vendor/animate/animate.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/vendor/css-hamburgers/hamburgers.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/vendor/animsition/css/animsition.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/vendor/select2/select2.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/vendor/daterangepicker/daterangepicker.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/css/util.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("/loginv4/css/main.css") }}">

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('/loginv4/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-10">
                        <a href="#"><img height="100px" width="100px"
                                src="{{ asset("/adminlte/img/logo_big.png")}}"></a>
                        <br>SIPENSA</br>
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">

                        <!-- <input class="input100" type="text" name="login" placeholder="NIP"> -->
                        <input type="text" class="input100 @error('email') is-invalid @enderror" name="login"
                            placeholder="NIP" value="{{ old('login') }}" required autocomplete="email" autofocus>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                            placeholder="Kata Sandi" name="password" required autocomplete="current-password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <input type="checkbox"
                        onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Lihat
                    kata sandi
                    <br></br>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Masuk
                            </button>
                        </div>
                    </div>
                </form>
                <br></br>
				<button class="btn btn-default btn-sm " onclick="return confirm('Silakan hubungi admin SIPENSA')">
				Lupa Kata Sandi?</button>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script src="{{ asset("/loginv4/vendor/jquery/jquery-3.2.1.min.js") }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset("/loginv4/vendor/animsition/js/animsition.min.js") }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset("/loginv4/vendor/bootstrap/js/popper.js") }}"></script>
    <script src="{{ asset("/loginv4/vendor/bootstrap/js/bootstrap.min.js") }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset("/loginv4/vendor/select2/select2.min.js") }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset("/loginv4/vendor/daterangepicker/moment.min.js") }}"></script>
    <script src="{{ asset("/loginv4/vendor/daterangepicker/daterangepicker.js") }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset("/loginv4/vendor/countdowntime/countdowntime.js") }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset("/loginv4/js/main.js") }}"></script>
</body>

</html>