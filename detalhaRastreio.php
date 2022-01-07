<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Tracking');
define('BTN', 'eRastreio');
define('BTN2', 'okRastreio');
define('IDENTIFICACAO', 0);

use Classes\Entity\rastreio;
use Classes\Entity\terceiro;
use Classes\Entity\servicoTerceiro;
use Classes\Entity\terceirizado;
use Classes\Entity\tratamento;

$detalhaRastreio = "";
//$consulta = consulta::getConsultas();
//$procedimento = procedimento::getProcedimentos();

$terceiro = terceiro::getTerceiros();
$servico = servicoTerceiro::getServicoTerceiros();

if (isset($_GET['id'])) {
    $detalhaRastreio = rastreio::getRastreioInner($_GET['id']);
    //echo'<pre>';print_r($detalhaRastreio);echo'</pre>';exit;
}

//echo'<pre>';print_r($innerTratamento);echo'</pre>';exit;
//echo'<pre>';print_r($procedimento);echo'</pre>';exit;

$rastreio = new rastreio();
$terceirizado = new terceirizado();

if (isset($_POST['cadastrarRastreio'])) {


    $rastreio->dtEntrega = ($_POST['dtEntrega']);
    $rastreio->dtRetorno = $_POST['dtRetorno'];
    $rastreio->obs = $_POST['obs'];
    $rastreio->vlrCobrado = $_POST['vlrCobrado'];
    $rastreio->statusRastreio = $_POST['status'];
    $rastreio->RFKTerceiro = $_POST['RFKTerceiro'];
    $rastreio->RFKServico = $_POST['RFKServico'];
    $rastreio->fkProtese = $_POST['fkProtese'];
    $terceirizado->fkTerceiro = $rastreio->RFKTerceiro;
    $terceirizado->fkServicoTerceiro = $rastreio->RFKServico;
    //echo'<pre>';print_r($rastreio);echo'</pre>';exit;
    unset($_POST['cadastrarRastreio']);

    $rastreio->cadastrarRastreio();


    header('Location: listaRastreio.php?status=success');

    //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
    //URL='cadastroDentista.php'\">";

}


if (isset($_POST['eRastreio'])) {

    header('Location: editaRastreio.php?id=' . $detalhaRastreio->idRastreio);
}

if (isset($_POST['okRastreio'])) {

    header('Location: listaRastreio.php');
}

/*if (isset($_POST['pConsultaRast'])){
    header ('Location: listaConsultaR.php?rastreio=check');
}*/

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/dtlRastreio.php';
include __DIR__ . '/includes/footer.php';
