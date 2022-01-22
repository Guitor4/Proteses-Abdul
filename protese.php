<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Protese;
define('IDENTIFICACAO', 1);
$objProtese = Protese::getProtesePaciente($_GET['idProtese']);

$term = 'pesquisarProtese.php?pagina=1';
if(isset($_GET['term']) && $_GET['term'] == 1 ){
    $term='listaConsultaR.php?pagina=1';
}


define('TITLE', $objProtese->nomePaciente);

switch ($objProtese->status) {
    case 'Registered':
        $progresso = '25%';
        break;
    case 'In production':
        $progresso = "50%";
        break;
    case 'In third-party treatment':
        $progresso = "75%";
        break;
    case 'Delivered':
        $progresso = "100%";
        break;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProtese.php';
include __DIR__ . '/includes/footer.php';
