<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\ServicoTerceiro;

define('TITLE', 'Register Service');
define('BTN', 'Salvar');
define('IDENTIFICACAO', '0');
$objServicoTerceiro = new ServicoTerceiro;
if (isset($_POST['Salvar'])) {

    $objServicoTerceiro->nomeServico = $_POST['nomeServico'];
    $objServicoTerceiro->descricao = ($_POST['descricao'] != null ? $_POST['descricao'] : 'Sem comentários');
    $objServicoTerceiro->statusServicoTerceiro = $_POST['statusServicoTerceiro'];
    /* echo '<pre>';print_r($objServicoTerceiro);echo '<pre>';exit; */

    $objServicoTerceiro->cadastro();

    if ($objServicoTerceiro->idServico > 0) {
        header('Location: listaServicoTerceiro.php?pagina=1&status=success1&id=' . $objServicoTerceiro->idServico);
    } else {
        header('Location: listaServicoTerceiro.php?pagina=1&status=error1');
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioServicoTerceiro.php';
include __DIR__ . '/includes/footer.php';
