<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Edit Clinic');
define('BTN', 'editClinica');
define('IDENTIFICACAO', '0');

use \Classes\Entity\clinica;


//consulta vaga
if (isset($_GET['idClinica'])) {
    $clinica = clinica::getClinica($_GET['idClinica']);
}


//validação da vaga
if (!$clinica instanceof clinica) {
    header('location: index.php?status=error');
}

if (isset($_POST['editarClinica'])) {

    if (!empty($_POST['nomeClinica'])) {

        $clinica->idClinica = $_GET['idClinica'];
        $clinica->nomeClinica = trim($_POST['nomeClinica']);
        $clinica->statusClinica = $_POST['status'];

        unset($_POST['editarClinica']);

        if ($clinica->editarClinica()) {
            header('Location: listaClinica.php?pagina=1&status=success2&id=' . $clinica->idClinica);
        } else {
            header('Location: listaClinica.php?pagina=1&status=error2');
        }
    }
}



//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroClinica.php'\">";




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioClinica.php';
include __DIR__ . '/includes/footer.php';
