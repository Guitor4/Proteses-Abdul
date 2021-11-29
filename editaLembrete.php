<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Editar Lembrete');
define('BTN', 'editarLembrete');
define('IDENTIFICACAO', '0');

use Classes\Entity\Lembrete;
$objLembrete = new Lembrete;
$lembretes = $objLembrete->getLembrete('idLembrete=' . $_GET['id']);
//$lembretes = $objLembrete->getLembrete('idLembrete'='.$_GET['id'],null,null,null,'idLembrete,titulo,descricao,dataLembrete,nomeFuncionario');
/* echo "<pre>"; print_r($lembretes); echo "<pre>";exit; */

if (isset($_POST[BTN])) {
    /* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
    $objLembrete->idLembrete = $_GET['id'];
    $objLembrete->titulo = trim($_POST['titulo']);
    $objLembrete->descricao = trim($_POST['descricao']);
    $objLembrete->dataLembrete = trim($_POST['dataLembrete']);
    $objLembrete->Funcionario = trim($_SESSION['idFuncionario']);
/* echo "<pre>"; print_r($objLembrete); echo "<pre>";exit; */

    $objLembrete->editarLembrete();

    if ($objLembrete->idLembrete > 0) {
        header('location: listaLembrete.php?pagina=1&status=success&id=' . $objLembrete->idLembrete);
    } else {
        header('location: listaLembrete.php?pagina=1&status=error');
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioLembrete.php';
include __DIR__ . '/includes/footer.php';
