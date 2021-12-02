<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use \Classes\Entity\ServicoTerceiro;

define('TITLE', 'Editar Serviço Terceiro');
define('IDENTIFICACAO', '0');

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}

$objServicoTerceiro = ServicoTerceiro::getServicoTerceiro($_GET['id']);



if (!$objServicoTerceiro instanceof ServicoTerceiro) {
    header('Location: index.php?status=error');
    exit;
}

if (isset($_POST['nomeServico'], $_POST['statusServicoTerceiro'])) {

    $objServicoTerceiro = new ServicoTerceiro;
    $objServicoTerceiro->idServico = $_GET['id'];
    $objServicoTerceiro->nomeServico = $_POST['nomeServico'];
    $objServicoTerceiro->descricao = ($_POST['descricao']);
    $objServicoTerceiro->statusServicoTerceiro = $_POST['statusServicoTerceiro'];
    //echo '<pre>';print_r($objServicoTerceiro);echo '<pre>';exit;

    $objServicoTerceiro->AtualizarServicoTerceiro();

    header('Location: index.php?status=success');

    /*     if ($objServicoTerceiro->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioServicoTerceiro.php';
include __DIR__ . '/includes/footer.php';
