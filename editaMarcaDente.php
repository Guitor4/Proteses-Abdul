<?php

include __DIR__ . ('./vendor/autoload.php');
include __DIR__ . ('./includes/sessionStart.php');

define('TITLE', 'Editar Marca');
define('BTN', 'editarMarca');

use Classes\Entity\MarcaDente;

$objMarcaDente = new MarcaDente;
$marca = $objMarcaDente->getMarca($_GET['prontuario']);
/* echo "<pre>"; print_r($marcaDente); echo "<pre>";exit; */

if (isset($_POST[BTN])) {
    /* echo "<pre>"; print_r('variable'); echo "<pre>";exit; */
    $objMarcaDente->idMarcaDente = $_GET['prontuario'];
    $objMarcaDente->nomeMarca = $_POST['nomeMarca'];
    $objMarcaDente->descricao = $_POST['descricao'];

    if ($objMarcaDente->updateMarcaDente()) {
        header('location:listaMarcaDente.php?pagina=1&status=success2&id=' . $objMarcaDente->idMarcaDente);
    } else {
        header('location:listaMarcaDente.php?pagina=1&status=error2');
    }
}

include __DIR__ . './includes/header.php';
include __DIR__ . './includes/formularioMarcaDente.php';
include __DIR__ . './includes/footer.php';
