<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\terceirizado;
use \Classes\Entity\terceiro;
use \Classes\Entity\ServicoTerceiro;


define('BTN', 'Salvar');
define('TITLE', 'Cadastro Tercerizado');
$objterceirizado = new terceirizado;
$objTerceiro = terceiro::getTerceiros();
$objServicoTerceiro = ServicoTerceiro::getServicoTerceiros();

if (isset($_POST['Salvar'])) {
    /*echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $objterceirizado->fkTerceiro = $_POST['Terceiro'];
    $objterceirizado->fkServicoTerceiro = $_POST['ServicoTerceiro'];



    $objterceirizado->cadastoTerceirizado();

    if ($objterceirizado->idterceirizado > 0) {
        header('Location: listaterceirizado.php?status=success1&id=' . $objterceirizado->idterceirizado);
    } else {
        header('Location: listaterceirizado.php?status=error1');
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioterceirizado.php';
include __DIR__ . '/includes/footer.php';
