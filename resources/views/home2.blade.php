<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="canonical" href="https://www.sescminastm.com.br">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- FULL CALENDER  --}}

    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>

    {{-- LINKS DA PAGINA HOME --}}

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

    <link rel="manifest" href="manifest.json" />

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
                        <li class="btn btn-primary rounded-pill m-5"><a class="text-light fs-7">Saldo: <span
                                    class="fs-5" id="saldo"> &nbsp;{{ $saldo }} &nbsp;</span></a></li>
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">

                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a <a href="#services">Confirmados</a></li>
                            <li class="scroll-to-section"><a data-bs-toggle="modal"
                                    data-bs-target="#HistoricoRegistros">Meu Histórico</a></li>
                            @if ($perm == 1)
                                <li> <a href="{{ route('adm') }}">Administração</a></li>
                            @endif
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


    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="owl-carousel owl-banner">
                                <div class="item header-text">
                                    <h6>Confirme sua presença</h6>
                                    <h2>Evento<em> Esportivo</em></h2>
                                    <br>
                                    <label for="data_confirma">Data</label>
                                    <input onchange="verifica_confirmacao()" type="date" id="data_confirma"
                                        class="form-control p-2 m-2">
                                    <br>
                                    <div class="down-buttons">
                                        <div class="main-blue-button-hover text-light" id="div_confirma">
                                            <a id="carregamento">
                                                <div class="spinner-border" role="status">
                                                    <span class="visually-hidden">Carregando...</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="our-services section">
        <div class="services-right-dec">
            <img src="assets/images/services-right-dec.png" alt="">
        </div>
        <div class="container">
            <div class="services-left-dec">
                <img src="assets/images/services-left-dec.png" alt="">
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2><em> confirmados</em></h2>
                        <span>Hoje</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="item">
                        <div class="card border border-dark">
                            <div class="list-group" id="lista_confirmados">
                                `<button type="button"
                                    class="list-group-item list-group-item-action">Carregando...</button>`
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  MODAL  --}}

        <!-- A modal -->
        <div class="modal fade" id="HistoricoRegistros">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Cabeçalho da modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Histórico de Registros</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </div>

                    <!-- Corpo da modal -->
                    <div class="modal-body">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="mes">Selecione o mês:</label>
                                <input type="month" class="form-control" name="data_pes" id="data_pesq">
                            </div>
                        </div>
                        <br>
                        <div style="max-height: 300px; overflow: auto;">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Data do registro</th>
                                    </tr>
                                </thead>
                                <tbody id="body_table_detalhes_historico">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Rodapé da modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>





        <!-- Scripts -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/owl-carousel.js"></script>
        <script src="assets/js/animation.js"></script>
        <script src="assets/js/imagesloaded.js"></script>
        <script src="assets/js/custom.js"></script>

        <script>
            // Acc
            $(document).on("click", ".naccs .menu div", function() {
                var numberIndex = $(this).index();

                if (!$(this).is("active")) {
                    $(".naccs .menu div").removeClass("active");
                    $(".naccs ul li").removeClass("active");

                    $(this).addClass("active");
                    $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

                    var listItemHeight = $(".naccs ul")
                        .find("li:eq(" + numberIndex + ")")
                        .innerHeight();
                    $(".naccs ul").height(listItemHeight + "px");
                }
            });
        </script>

</body>

</html>
