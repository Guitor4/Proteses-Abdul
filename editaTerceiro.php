<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use \Classes\Entity\Terceiro;

define('TITLE', 'Editar Terceiro');
define('BTN', 'editarTerceiro');
define('IDENTIFICACAO', '0');

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}

$objTerceiro = Terceiro::getTerceiro($_GET['id']);



if (!$objTerceiro instanceof Terceiro) {
    header('Location: index.php?status=error');
    exit;
}

if (isset($_POST['editarTerceiro'])) {

    if (isset($_POST['nomeTerceiro'], $_POST['statusTerceiro'])) {

        $objTerceiro = new Terceiro;
        $objTerceiro->idTerceiro = $_GET['id'];
        $objTerceiro->nomeTerceiro = $_POST['nomeTerceiro'];
        $objTerceiro->telefone = ($_POST['telefone']);
        $objTerceiro->statusTerceiro = $_POST['statusTerceiro'];
        //echo '<pre>';print_r($objTerceiro);echo '<pre>';exit;

        $objTerceiro->AtualizarTerceiro();

        header('Location: index.php?status=success');

        /*     if ($objTerceiro->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
    }
}
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioTerceiro.php';
include __DIR__ . '/includes/footer.php';
