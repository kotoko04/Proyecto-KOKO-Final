<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Koko</title>
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

<body style="background: #ffffff">

<!-- ======= Header ======= -->
<header style="padding: 12px 5px;background: #1d68a7;" id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-11 d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="">koko.swimwear <img src="{{asset('img/logo.jpeg')}}" alt=""></a></h1>
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


<div style="margin-top:100px "class="container-xl">
        <div class="row">
            <div class="col-sm-3" style="padding: 10px;margin-bottom: 10%">
                <blockquote class="blockquote text-left">
                    <footer style="font-family: cursive;font-size: 20px" class="blockquote-footer">Categorias y Marcas</footer>
                </blockquote>
                <table class="table table-responsive-xl">
                    @if(!empty($dataCategorias))
                        @foreach($dataCategorias as $p)
                            <thead style="">
                            <tr style="background: #10707f" >
                                <th><form action="{{route('welcomeTotalA', [$p->id, 'no'])}}" method="POST">
                                    @csrf
                                    <button type="submit" style="padding: 6px;color: #ffffff; width: 100%">{{$p->descripcion}}</button>
                                </form>
                                </th>
                            </tr>
                            </thead>
                            @if(!empty($dataMarcas))
                                @foreach($dataMarcas as $c)
                                    <tbody>
                                    <tr>
                                        <td>
                                            <form action="{{route('welcomeTotalA', [$p->id, $c->id])}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary" style="width: 100%">{{$c->nombre}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        <tr style="background: #ff5157" >
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                    @endif
                </table>
            </div>
            <div class="col-sm-9" style="position: relative;right: -25px">
                <blockquote class="blockquote text-left">
                    <p style="font-size: 24px" class="mb-0">Variedad y Moda </p>
                </blockquote>
                @if(isset($dataProducto))
                @if($dataProducto->count()!=0)
                    <div class="">
                        <input id="buscador" onkeyup="capturar()" style="display: inline-block;width: 80%" class="form-control" type="text" placeholder="Buscar" aria-label="Search">
                        <a href="" onclick="duda(event)" ><i class="far fa-question-circle"></i></a>
                    </div>
                    <div id="dataConsulta" class="row justify-content-center" style="margin-top: 3%">
                        @foreach($dataProducto as $data)
                            <div class="card col-sm-3" style="width: 18rem;padding: 10px;margin-right:6%; margin-bottom: 5%;box-shadow: 10px 10px 18px -6px rgba(0,0,0,0.75)">
                                <img class="card-img-top" src="{{asset('storage/' . $data->id . '/' . $data->ruta )}}" alt="Card image cap" >
                                <div class="card-body">
                                    <p class="card-text">{{$data->nombre}}</p>
                                    <a id="categoria" style="color:white" onclick="verProducto('{{asset('storage/' . $data->id . '/' . $data->ruta )}}', '{{$data->descripcion}}', '{{$data->valor}}' )" class="btn btn-primary">Ver</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row-cols-sm-1" >
                        <div class="container">
                            <div class="row justify-content-center h-100">
                                <div id="mayor" class="card" style="width: 22rem; -webkit-box-shadow: 0px 3px 23px 0px rgba(0,0,0,0.75);-moz-box-shadow: 0px 3px 23px 0px rgba(0,0,0,0.75);box-shadow: 0px 3px 23px 0px rgba(0,0,0,0.75);">
                                    <img src="{{asset('img/logo.jpeg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Lo sentimos no contamos con ropa en esta seccion...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @else
                    <div class="row-cols-sm-1" >
                        <div class="container">
                            <div class="row justify-content-center h-100">
                                <div id="mayor" class="card" style="width: 22rem; -webkit-box-shadow: 0px 3px 23px 0px rgba(0,0,0,0.75);-moz-box-shadow: 0px 3px 23px 0px rgba(0,0,0,0.75);box-shadow: 0px 3px 23px 0px rgba(0,0,0,0.75);">
                                    <img src="{{asset('img/logo.jpeg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Bienvenido...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('assets/js/main.js')}}"></script>




</body>

</html>

