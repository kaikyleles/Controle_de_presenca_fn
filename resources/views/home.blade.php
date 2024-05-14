{{-- @extends('layouts.app')

@section('content') --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">

    <title>Controle de presença</title>
</head>

<body class="container-login100" style="background-image: url('images/5566879-cortado.jpg');">


    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0">Controle de Presença</a>
                    </h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="ctive"><a href="index.html"><span class="text-dark">Home</span></a></li>
                            <li><a href="listings.html"><span class="text-dark">Fechamento</span></a></li>
                            <li><a href="about.html"><span class="text-dark"><i class="bi bi-person-fill"></i> Minha
                                        conta</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                        href="#" class="site-menu-toggle js-menu-toggle text-white"><span
                            class="icon-menu h3"></span></a></div>
            </div>
        </div>
        </div>

        <br>

        <div class="row p-5">
            <div class="col d-flex justify-content-center">
                <div class="card rounded shadow" id="card-esquerda">
                    <div class="card-header d-flex justify-content-center container">
                        <label class="card-title">Confirmação de Presença</label>
                    </div>
                    <div class="card-body text-center">
                        <div class="login100-pic js-tilt" data-tilt>
                            <img class="h-50 w-50"src="images/raquete.jpg" alt="IMG">
                        </div>
                        <p class="card-text">Por favor, confirme sua presença no evento a seguir:</p>
                        <h6>Tenis de mesa no SESC</h6>
                        <label for="data_confirma" class="form-label">Data:</label>
                        <input type="date" id="data_confirma" class="form-control p-2 m-2">
                        <button class="btn btn-warning btn-lg rounded-pill mt-3 text-light"
                            onclick="confirmaPresenca()">Confirmar</button>
                    </div>
                </div>
            </div>


            <div class="col d-flex justify-content-center">
                <div class="card rounded shadow" id="card-direita">
                    <div class="card-header d-flex justify-content-center container">
                        <label class="card-title">Confirmação de Presença</label>
                    </div>
                    <div class="card-body text-center">
                        <div class="list-group" id="lista_confirmados">

                        </div>
                    </div>
                </div>
                </div-col>

            </div>
        </div>

    </header>


<!-- Add the evo-calendar.js for.. obviously, functionality! -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
    <script src="js/home.js"></script>
</body>

</html> --}}
{{-- @endsection --}}
