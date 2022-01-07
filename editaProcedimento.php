<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\Procedimento;

define('TITLE', 'Edit Proceeding');
define('BTN', 'editProcedimento');
define('IDENTIFICACAO', '0');
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}

$objProcedimento = Procedimento::getProcedimento($_GET['id']);


if (!$objProcedimento instanceof Procedimento) {
    header('Location: index.php?status=error');
    exit;
}

if (isset($_POST['editarProcedimento'])) {
    if (isset($_POST['nomeProcedimento'], $_POST['statusProcedimento'])) {

        $objProcedimento = new Procedimento;
        $objProcedimento->idProcedimento = $_GET['id'];
        $objProcedimento->nomeProcedimento = $_POST['nomeProcedimento'];
        $objProcedimento->statusProcedimento = $_POST['statusProcedimento'];
        //echo '<pre>';print_r($objProcedimento);echo '<pre>';exit;

        if ($objProcedimento->AtualizarProcedimento()) {
            header('Location: listaProcedimento.php?pagina=1&status=success2&id='.$_GET['id']);
        } else {
            header('Location: listaProcedimento.php?pagina=1&status=error2');
        }
    }
}
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioProcedimento.php';
include __DIR__ . '/includes/footer.php';
