<?php

require __DIR__.'/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';

define('TITLE', 'Editar Rastreio');
define('BTN', 'editarRastreio');
define('IDENTIFICACAO', '0');


use Classes\Entity\rastreio;
use Classes\Entity\terceiro;
use Classes\Entity\servicoTerceiro;

$rastreio= "";

$terceiro = terceiro::getTerceiros();
$servico = servicoTerceiro::getServicoTerceiros();

if (isset($_GET['id'])) {
    $rastreio = rastreio::getRastreioInner($_GET['id']);
    //echo'<pre>';print_r($innerTratamento);echo'</pre>';exit;
}

  //echo'<pre>';print_r($innerTratamento);echo'</pre>';exit;
//echo'<pre>';print_r($procedimento);echo'</pre>';exit;

$rastreioEdit = new rastreio();


if (isset($_POST['editarRastreio'])) {

        
        $rastreioEdit->idRastreio = ($_POST['idRastreio']);
        $rastreioEdit->dtEntrega = ($_POST['dtEntrega']);
        $rastreioEdit->dtRetorno = $_POST['dtRetorno'];
        $rastreioEdit->obs = $_POST['obs'];
        $rastreioEdit->vlrCobrado = $_POST['vlrCobrado'];
        $rastreioEdit->statusRastreio = $_POST['status'];
        $rastreioEdit->RFKTerceiro = $_POST['RFKTerceiro'];
        $rastreioEdit->RFKServico = $_POST['RFKServico'];
        $rastreioEdit->fkProtese = $_POST['fkProtese'];
        
       echo'<pre>';print_r($rastreioEdit);echo'</pre>';exit;
        unset($_POST['editarRastreio']);
        
        $rastreioEdit->editarRastreio();
       
        
        header ('Location: listaRastreio.php?status=success');

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroDentista.php'\">";
    
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formRastreio.php';
include __DIR__.'/includes/footer.php';
