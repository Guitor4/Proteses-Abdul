<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Protese;

$objProtese = Protese::getProtesePaciente($_GET['idProtese']);
/* echo "<pre>"; print_r($objProtese); echo "<pre>";exit; */


define('TITLE',$objProtese->nomePaciente);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProtese.php';
include __DIR__ . '/includes/footer.php';
