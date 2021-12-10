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


if (
  //Checa se existem
  isset(
      $_POST['dtEntrega'],
      $_POST['dtRetorno'],
      $_POST['obs'],
      $_POST['RFKTerceiro'],
      $_POST['RFKServico'],
      $_POST['status']
  )
  //Checa se são diferentes de vazio
  && $_POST['dtEntrega'] != ""
  && $_POST['dtRetorno'] != ""
  && $_POST['RFKTerceiro'] != ""
  && $_POST['RFKServico'] != ""
  && $_POST['status'] != ""
) {
/*   echo'<pre>';print_r($_POST);echo'</pre>';exit; */
        
        $rastreioEdit->idRastreio = ($_GET['id']);
        $rastreioEdit->dtEntrega = ($_POST['dtEntrega']);
        $rastreioEdit->dtRetorno = $_POST['dtRetorno'];
        $rastreioEdit->obs = $_POST['obs'];
        $rastreioEdit->statusRastreio = $_POST['status'];
        $rastreioEdit->RFKTerceiro = $_POST['RFKTerceiro'];
        $rastreioEdit->RFKServico = $_POST['RFKServico'];
        $rastreioEdit->fkProtese = $_POST['fkProtese'];
        
              
        if($rastreioEdit->editarRastreio()){
          header ('Location: listaRastreio.php?pagina=1&status=success2&id='.$_GET['id']);
        }
       
        
        

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroDentista.php'\">";
    
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formRastreio.php';
include __DIR__.'/includes/footer.php';
