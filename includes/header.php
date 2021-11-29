
<!DOCTYPE html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icone do site -->

    <link rel="icon" href="includes/img/icone2.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select-picker.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/bootstrap-select-picker.min.css">
    <link rel='stylesheet' type='text/css' href='FullCalendar/main.min.css' />
    <link rel='stylesheet' type='text/css' href='FullCalendar/style.css' />

<!--     <link rel="stylesheet" href="css/css-debug.css"> -->

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
    <script type='text/javascript'>
        function click(id) {
            var btn = document.getElementById(id);
            btn.click();
            $("#exampleModalLabel").html('Cadastro Consulta Teste')
            $('.selectpicker').selectpicker();
        }
        
    </script>
</head>

<body style="border:10px;border-color:red;background-repeat: no-repeat; background-size: cover">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #47b8d8;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./includes/img/DL_Logo_wStrap_Black-01.png" alt="" width="200" height="100" style="position: center">
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
                        <a class="nav-link" href="./listaPaciente.php?pagina=1">
                            <div id="passar_mouse">
                                <img src="./includes/img/user.png" width="30" height="30" alt="carteira id" />
                                <div id="mostrar">Paciente</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link active" aria-current="page" href="agendamento.php?pagina=1">
                            <div id="passar_mouse">
                                <img src="./includes/img/miniAgenda.png" width="30" height="30" alt="home" />
                                <div id="mostrar">Agenda</div>
                            </div>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pesquisarConsulta.php?pagina=1">
                            <div id="passar_mouse">
                                <img src="./includes/img/consulta.png" width="30" height="30" alt="consulta" />
                                <div id="mostrar">Consulta</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pesquisarProtese.php?pagina=1">
                            <div id="passar_mouse">
                                <img src="./includes/img/dentadura.png" width="30" height="30" alt="dentadura" />
                                <div id="mostrar">Dentadura</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaFuncionario.php?pagina=1">
                            <div id="passar_mouse">
                                <img src="./includes/img/carteira-de-identidade.png" width="30" height="30" alt="dentadura" />
                                <div id="mostrar">Funcionario</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <div id="passar_mouse">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./includes/img/3pontos.png" title="Outros" width="30" height="30" alt="sentings" />
                            </a>

                            <ul class="dropdown-menu offset-3" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./listaDentista.php?pagina=1">Dentista</a></li>
                                <li><a class="dropdown-item" href="./listaClinica.php?pagina=1">Clinica</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./listaRastreio.php?pagina=1">Rastreio</a></li>

                                <li><a class="dropdown-item" href="./listaProcedimento.php?pagina=1">Procedimento</a></li>

                                <li><a class="dropdown-item" href="./listaTerceiro.php?pagina=1">Terceiro</a></li>
                                <li><a class="dropdown-item" href="./listaServicoTerceiro.php?pagina=1">ServiçoTerceirizado</a></li>
                                <li><a class="dropdown-item" href="./listaTerceirizado.php?pagina=1">Terceirizado</a></li>
                            </ul>
                    </li>
                    <div>
                </ul>

                <div class="border border-dark text-center">
                    <li class="nav-item dropdown" style="list-style:none">
                        <a class="nav-link dropdown-toggle" style="text-decoration:none;color:black" href="#" id="perfil" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            <img src="<?= ($_SESSION['perfil'] == 'Administrador' ? './includes/img/usuario.png' : './includes/img/abc.png') ?>" width="40" height="40" style="border-radius: 20px;" alt="sair" /><strong>Usuário: <?= $_SESSION['nome'] ?></strong>
                            <br><label><?= $_SESSION['perfil'] ?></label>
                        </a>
                        <ul class="dropdown-menu text-center" style="width:100%" aria-labelledby="perfil">
                            <li hidden><a class="dropdown-item" href="./listaDentista.php">DentistaDentistaDentistaDentistaDe</a></li>
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
                </div>

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
    <input hidden id = "identificacao" value = "<?=IDENTIFICACAO?>"></input>