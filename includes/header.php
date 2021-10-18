
<!DOCTYPE html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <!-- <link rel="stylesheet" href="css/css-debug.css"> -->
    
    <script src="js/sweetalert2.min.js"></script>

    <title>Abdull Proteses</title>
    
    <script>
            function mascara(t, mask) {
                var i = t.value.length;
                var saida = mask.substring(1, 0);
                var texto = mask.substring(i);
                if (texto.substring(0, 1) != saida) {
                    t.value += texto.substring(0, 1);

                }
            }

        </script>
  </head>
  <body style="border:10px;border-color:red;background-image: url(./includes/img/bg.jpg);background-repeat: no-repeat; background-size: cover">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #3a9fab;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./includes/img/DL_Logo_wStrap_Black-01.png" alt="" width="200" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                        <a class="nav-link active" aria-current="page" href="index.php">
                            <div id="passar_mouse">
                                <img src="./includes/img/home.png" width="30" height="30" alt="home" />
                                <div id="mostrar">Home</div>
                            </div>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./listaPaciente.php">
                            <div id="passar_mouse">
                                <img src="./includes/img/carteira-de-identidade.png" width="30" height="30" alt="carteira id" />
                                <div id="mostrar">Paciente</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pesquisarConsulta.php">
                            <div id="passar_mouse">
                                <img src="./includes/img/consulta.png" width="30" height="30" alt="consulta" />
                                <div id="mostrar">Consulta</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pesquisarProtese.php">
                            <div id="passar_mouse">
                                <img src="./includes/img/dentadura.png" width="30" height="30" alt="dentadura" />
                                <div id="mostrar">Dentadura</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./includes/img/settings.png" width="30" height="30" alt="sentings" />
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./listaDentista.php">Dentista</a></li>
                            <li><a class="dropdown-item" href="./listaClinica.php">Clinica</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./listaRastreio.php">Rastreio</a></li>
                            
                            <li><a class="dropdown-item" href="./listaProcedimento.php">Procedimento</a></li>
                            
                            <li><a class="dropdown-item" href="./listaTerceiro.php">Terceirizado</a></li>
                            <li><a class="dropdown-item" href="./listaServicoTerceiro.php">ServiçoTerceirizado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>


                <a class="nav-link" href="sessionDestroy.php">
                    <div id="passar_mouse">
                        <img src="./includes/img/sair.png" width="40" height="40" alt="sair" />
                        <div id="mostrar" style="color: black">Sair</div>
                    </div>
                </a>

                <!--<form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </forma>-->
            </div>
        </div>

    </nav>

    
