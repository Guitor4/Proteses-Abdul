<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/includes/sessionStart.php';

use \Classes\Entity\terceirizado;
use \Classes\Entity\Terceiro;
use \Classes\Entity\ServicoTerceiro;

define('TITLE', 'Editar Terceirizado');
define('BTN', 'editTerceirizado');
define('IDENTIFICACAO', 0);


if (!isset($_GET['idTerceiro'], $_GET['idServico'])) {
    header('Location: listaTerceirizado.php?status=error');
}

$objTerceirizado = new terceirizado;
$terceirizado = $objTerceirizado->getTerceirizado($_GET['idServico'],$_GET['idTerceiro']);
/* echo "<pre>"; print_r($terceirizado); echo "<pre>";exit; */
$terceiro = terceiro::getTerceiro($terceirizado->fkTerceiro);
$selectTerceiro = '<option selected value ="' .  $terceiro->idTerceiro . '">' . $terceiro->nomeTerceiro . '</option>';
$servico = ServicoTerceiro::getServicoTerceiro($terceirizado->fkServicoTerceiro);
$selectServico = '<option selected value ="' .  $servico->idServico . '">' . $servico->nomeServico . '</option>';


if (!$objTerceirizado instanceof terceirizado) {
    header('Location: listaTerceirizado.php?status=error');
}

if (
    //Checa se existem
    isset(
        $_POST['Terceiro'],
        $_POST['ServicoTerceiro'],
        $_POST['status']

    )
    //Checa se são diferentes de vazio
    && $_POST['Terceiro'] != ""
    && $_POST['ServicoTerceiro'] != ""
    && $_POST['status'] != ""
  ) {
    /* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
    if (isset($_POST['terceiro2'], $_POST['servico2'], $_POST['status'])) {


        $objTerceirizado->fkTerceiro = $_GET['idTerceiro'];
        $objTerceirizado->fkServicoTerceiro = $_GET['idServico'];
        $objTerceirizado->statusTerceirizado = $_POST['status'];

        if ($objTerceirizado->atualizarTerceirizado()) {
            header('Location: listaTerceirizado.php?pagina=1&status=success2');
        } else {
            header('Location: listaTerceirizado.php?pagina=1&status=error2');
        }
    }
}
//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroterceirizado.php'\">";

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioterceirizado.php';
include __DIR__ . '/includes/footer.php';
