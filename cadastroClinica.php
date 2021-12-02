<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Cadastrar Clinica');
define('BTN', 'cadastrarClinica');
define('IDENTIFICACAO', '0');

use Classes\Entity\clinica;

$clinica = new clinica();

if (isset($_POST['cadastrarClinica'])) {

    if (!empty($_POST['nomeClinica'])) {


        $clinica->nomeClinica = trim($_POST['nomeClinica']);
        $clinica->statusClinica = $_POST['status'];

        unset($_POST['cadastrarClinica']);
        /* echo "<pre>"; print_r($clinica); echo "<pre>";exit; */
        $clinica->cadastrarClinica();

        if ($clinica->idClinica > 0) {
            header('Location: listaClinica.php?pagina=1&status=success1&id=' . $clinica->idClinica[1]);
        } else {
            header('Location: listaClinica.php?pagina=1&status=error1');
        }
        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroClinica.php'\">";
    }
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioClinica.php';
include __DIR__ . '/includes/footer.php';
