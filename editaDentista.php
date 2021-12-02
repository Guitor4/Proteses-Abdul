<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Editar Dentista');
define('BTN', 'editarDentista');
define('IDENTIFICACAO', '0');

use \Classes\Entity\dentista;


//consulta vaga
if (isset($_GET['idDentista'])) {
    $dentista = dentista::getDentista($_GET['idDentista']);
}


//validação da vaga
if (!$dentista instanceof dentista) {
    header('location: index.php?status=error');
}

if (isset($_POST['editarDentista'])) {

    if (!empty($_POST['nomeDentista'])) {

        $dentista->idDentista = $_GET['idDentista'];
        $dentista->nomeDentista = trim($_POST['nomeDentista']);
        $dentista->statusDentista = $_POST['status'];

        unset($_POST['editarDentista']);

        $dentista->editarDentista();

        header('Location: listaDentista.php?status=success');
    }
}



//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroDentista.php'\">";




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioDentista.php';
include __DIR__ . '/includes/footer.php';
