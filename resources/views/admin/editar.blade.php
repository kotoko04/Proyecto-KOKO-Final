<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home Koko</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/tienda.png')}}" rel="icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">


    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet"> <!--load all styles -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body style="background:  #defcff  ">

<!-- ======= Header ======= -->
<header style="padding: 12px 5px;background: #1d68a7;" id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-11 d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="">koko.swimwear <img src="{{asset('img/logo.jpeg')}}" alt=""></a></h1>
                <nav class="nav-menu d-none d-lg-block">
                    <ul class="navbar-nav ml-auto">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a style="color: black"class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </ul>
                </nav><!-- .nav-menu -->
            </div>
        </div>

    </div>
</header><!-- End Header -->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<div class="container" style="padding: 10px;margin-top: 7%; margin-bottom: 7%">
    <div class="row-cols-sm-1 justify-content-center">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Editar Producto</h5>
                    <form action="{{ route('productoEditar') }}" method="POST" id="formularioEmpresa" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ !empty($producto) ? $producto->nombre : old('nombre') }}" required >
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"  required>{{ !empty($producto) ? $producto->descripcioncorta : old('descripcion') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="detalle">Detalle</label>
                            <input type="text" class="form-control" id="detalle" name="detalle" value="{{ !empty($producto) ? $producto->detalle : old('detalle') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="numer" class="form-control" id="valor" name="precio" value="{{ !empty($producto) ? $producto->valor : old('valor') }}"required>
                        </div>
                        <div class="form-group">
                            <label for="palabra">Palabra Clave</label>
                            <input type="text" class="form-control" id="palabra" name="palabra" value="{{ !empty($producto) ? $producto->palabraclave : old('palabra') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado"  required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Imagen</label>
                            <input id="file-input" name="imagen" type="file" value="{{ !empty($producto) ? $producto->ruta : old('imagen') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="c">Categoria</label>
                            <select id="c" name="valor" class="form-control " required>
                                @if(!empty($data))
                                    @foreach($data as $tipo)
                                        <option value="{{$tipo->id}}" selected="" >{{$tipo->descripcion}}</option>
                                    @endforeach
                                @else
                                    <option></option>
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="v">Marca</label>
                            <select id="v" name="valorM" class="form-control " required>
                                @if(!empty($dataM))
                                    @foreach($dataM as $tipo)
                                        <option value="{{$tipo->id}}" >{{$tipo->nombre}}</option>
                                    @endforeach
                                @else
                                    <option></option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
</div>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<!-- Footer -->
<footer style="background-color: black; bottom: 0px ; position: fixed; width: 100%"bclass="page-footer font-small blue row">
    <!-- Copyright -->
    <div style="color:white"class="footer-copyright text-center py-3">
        &copy; Copyright <strong>koko.swimwear</strong>. All Rights Reserved
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
