<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Koko</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/tienda.png" rel="icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">


    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet"> <!--load all styles -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body style="background: #fffbdb">

<!-- ======= Header ======= -->
<header style="padding: 12px 5px;background: #1d68a7;" id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-11 d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="">koko.swimwear <img src="img/logo.jpeg" alt=""></a></h1>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li ><a href="{{ route('welcomeI') }}">Home</a></li>
                        <li class="active"><a href="{{ route('login') }}">Inicio Sesion</a></li>
                    </ul>
                </nav><!-- .nav-menu -->
            </div>
        </div>

    </div>
</header><!-- End Header -->


    <div style="margin-top:80px "class="container-fluid">
        <div class="limiter">
            <div class="container-login100" style="background-image: url('img/fondo_3.jpg');">
                <div class="wrap-login100">

                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf

                            <span class="login100-form-logo">
                                <img src="img/women.jpg" alt="">
                            </span>

                                <span class="login100-form-title p-b-34 p-t-27">
                                Iniciar Sesion
                            </span>

                                <div style="margin-top: 10%"class="entrada">
                                    <label class="sr-only" for="inlineFormInputGroup"></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input id="inlineFormInputGroup" class="inp form-control {{ $errors->has('login') ? ' is-invalid' : '' }}" value="{{ old('login') }}" type="login" name="login"  placeholder="usuario o correo"></div>
                                    </div>
                                    @if ($errors->has('login'))
                                        <span style="padding: 10px;display: block" class="invalid-feedback" role="alert">
                                            <strong style="color: #c51f1a">{{ $errors->first('login') }}</strong>
                                        </span>
                                    @endif


                                <div style="margin-top: 5%"class="entrada">
                                    <label class="sr-only" for="inlineFormInputGroup"></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                                        </div>
                                        <input id="inlineFormInputGroup" class="inp form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" type="password" name="password"  placeholder="contraseña"></div>
                                    </div>
                                @if ($errors->has('password'))
                                    <span style="padding: 10px;display: block" class="invalid-feedback" role="alert">
                                        <strong style="color: #c51f1a">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


                                <div style="margin-top: 30%" class="container-login100-form-btn">
                                    <button type="submit" class="login100-form-btn">
                                        Ingresar
                                    </button>
                                </div>

                                <div style="margin-top: 7%" class="text-center p-t-90">
                                    <a style="color:#1d2124" class="txt1" href="#">
                                        Forgot Password?
                                    </a>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<script src="assets/js/main.js"></script>

</body>

</html>
