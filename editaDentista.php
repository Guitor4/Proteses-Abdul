<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Editar Dentista');
define('BTN', 'editarDentista');
define('IDENTIFICACAO', '0');

use \Classes\Entity\dentista;

$objDentista = new dentista;
//consulta vaga
if (isset($_GET['idDentista'])) {
    $dentista = $objDentista->getDentista($_GET['idDentista']);
}

//validação da vaga
if (!$dentista instanceof dentista) {
    header('location: index.php?status=error');
}

if (isset($_POST['editarDentista'])) {

    if (!empty($_POST['nomeDentista'])) {

        $objDentista->idDentista = $_GET['idDentista'];
        $objDentista->nomeDentista = trim($_POST['nomeDentista']);
        $objDentista->statusDentista = $_POST['status'];

        unset($_POST['editarDentista']);

        if($objDentista->editarDentista()){
            header('Location: listaDentista.php?pagina=1&status=success2&id='.$_GET['idDentista']);
        }

        
    }
}



//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroDentista.php'\">";




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioDentista.php';
include __DIR__ . '/includes/footer.php';
