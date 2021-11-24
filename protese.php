<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Protese;

$objProtese = Protese::getProtesePaciente($_GET['idProtese']);
/* echo "<pre>"; print_r($objProtese); echo "<pre>";exit; */


define('TITLE',$objProtese->nomePaciente);

switch ($objProtese->status){
    case 'Cadastrada':
        $progresso = '25%';
    case 'Produção':
        $progresso = "50%";
    case 'Com terceiros' :
        $progresso = "75%";
    case 'Entregue':
        $progresso = "100%";        
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProtese.php';
include __DIR__ . '/includes/footer.php';
