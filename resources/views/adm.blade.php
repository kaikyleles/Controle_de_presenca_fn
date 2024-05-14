<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- FULL CALENDER  --}}

    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>

    {{-- LINKS DA PAGINA HOME --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        < script src = "https://www.jsdelivr.com/package/npm/fullcalendar" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
    <script src="js/home.js"></script>

    <!-- CSS -->


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png" style="height: 70px; max-width: 70px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('principal') }}">Home</a></li>
                            <li class="scroll-to-section"> <a href="{{ route('principal') }}">Confirmados</a></li>
                            <li class="scroll-to-section"><a href="#services" class="active">Administração</a></li>
                            <li class="main-red-button-hover"><a class="main-red-button-hover"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Sair</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                </div>

                <div class="col-lg-6 align-self-center">
                    <div class="left-image">
                        <img src="assets/images/about-left-image.png" alt="Two Girls working together">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Resumo<em><br></em> &amp; <span>Contabilização </span>de presenças</h2>
                        <p>Aqui você pode ver em tempo real a contabilização de presença.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="fact-item">
                                    <div class="count-area-content">
                                        <div class="icon">
                                            <img src="assets/images/service-icon-01.png" alt="">
                                        </div>
                                        <div class="count-digit">{{ $contagem_registros_mes_atual }}</div>
                                        <div class="count-title">Presenças registradas</div>
                                        <p>Número de presenças registradas esse mês.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fact-item">
                                    <div class="count-area-content">
                                        <div class="icon">
                                            <img src="assets/images/service-icon-02.png" alt="">
                                        </div>
                                        <div class="count-digit">{{ $dia_atual }}</div>
                                        <div class="count-title">dias</div>
                                        <p>Dias recorrentes do mês.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="portfolio" class="our-portfolio section">
        <div class="portfolio-left-dec">
            <img src="assets/images/portfolio-left-dec.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading ">
                        <h2>Administração <em>presença</em></h2>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <select class="form-select" id="month">
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-select" id="year">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button onclick="contaCredito()" class="btn btn-primary"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </div>
                        <br>
                        <table
                            class="table table table-striped table-bordered table-hover table-ordered fs-7 w-100 nowrap"
                            id="tabela_datalhes_nf">
                            <thead class="bordered">
                                <tr>
                                    <th>Nome </th>
                                    <th>Registros no mês</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody id="body_table">
                                <tr>
                                    <td>
                                        Carregando...</td>
                                </tr>

                            <tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 float-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle h-20" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Gerenciar
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"> <a class="" data-bs-toggle="modal"
                                    data-bs-target="#Modal_credito">Adicionar
                                    Credito</a></li>
                            <li class="dropdown-item"><a class="" data-bs-toggle="modal"
                                    data-bs-target="#Modal_usuarios" onclick="TabelaUsuarios()">Gerenciar
                                    Usuarios</a></li>
                            <li class="dropdown-item"><a class="" onclick="GeraDOCRelatorio()">Exportar Relatótio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </div>

    <div class="footer-dec">
        <img src="assets/images/footer-dec.png" alt="">
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="about footer-item">
                        <div class="logo">
                            <a href="#"><img src="assets/images/logo.png" alt="Onix Digital TemplateMo"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 float-end">
                    <div class="float-end footer-item">
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>


<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Gerencie os Usuarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table table-striped table-bordered table-hover table-ordered fs-7 w-100 nowrap"
                    id="tabela_datalhes_nf">
                    <thead class="bordered">
                        <tr>
                            <th>Data de Registro</th>
                            <th>Situação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody id="body_table_detalhes">
                    <tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Voltar</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal usuarios --}}

<div class="modal fade" id="Modal_usuarios" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="Modal_usuarios" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Permissionamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table table-striped table-bordered table-hover table-ordered fs-7 w-100 nowrap"
                    id="tabela_usuarios">
                    <thead class="bordered">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center" >Nome</th>
                            <th class="text-center" >Saldo</th>
                            <th class="text-center" >Email</th>
                            <th class="text-center" >Permissão</th>
                        </tr>
                    </thead>
                    <tbody id="tabela_usuarios_detalhes">
                    <tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Voltar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal_credito" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="Modal_usuarios" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adiciona crédito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <label class="col-form-label"for="id_usuario">ID Usuario: </label>
                        <input class="form-control" id="id_usuario_credito" c type="text">
                    </div>
                    <div class="col-md-5">
                        <label class="col-form-label"for="id_usuario">N° créditos: </label>
                        <input class="form-control" id="numero_creditos" c type="text">
                    </div>
                    <div class="col-md-2 mt-4">
                        <button class="btn btn-success" onclick="AdicionaCreditosColab()">Adicionar</button>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Voltar</button>
            </div>
        </div>
    </div>
</div>
<style>
    @media only screen and (max-width: 760px),
    (min-width: 768px) and (max-width: 1024px) {
        select {
            width: 150px;
        }
    }
</style>
