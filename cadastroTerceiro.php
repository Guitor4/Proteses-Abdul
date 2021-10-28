<?php

require __DIR__.'/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use \Classes\Entity\Terceiro;

define('TITLE','Cadastro Terceiro');
define('BTN','Salvar');
$objTerceiro = new Terceiro;
if (isset($_POST['Salvar'])){

    $objTerceiro->nomeTerceiro = $_POST['nomeTerceiro'];
    $objTerceiro->telefone = $_POST['telefone'];
    $objTerceiro->statusTerceiro = $_POST['statusTerceiro'];
    /* echo '<pre>';print_r($objTerceiro);echo '<pre>';exit; */
    
    $objTerceiro->cadastro();
   
    if ($objTerceiro->idTerceiro > 0){
        header ('Location: listaTerceiro.php?pagina=1&status=success&id='.$objTerceiro->idTerceiro);
    }else{
        header ('Location: listaTerceiro.php?pagina=1&status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioTerceiro.php';
include __DIR__.'/includes/footer.php';
