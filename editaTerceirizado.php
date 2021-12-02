<?php

require __DIR__ . '/vendor/autoload.php';

use \Classes\Entity\terceirizado;

define('TITLE', 'Editar Terceirizado');
define('BTN', 'editarterceirizado');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}

$objterceirizado = terceirizado::getTerceirizados($_GET['id']);
/* echo '<pre>';print_r($objterceirizado);echo '<pre>';exit; */


if (!$objterceirizado instanceof terceirizado) {
    header('Location: index.php?status=error');
    exit;
}

if (isset($_POST['editarterceirizado'])) {
    if (isset($_POST['nome'])) {

        $objterceirizado = new terceirizado;
        $objterceirizado->idterceirizado = $_GET['id'];
        $objterceirizado->nome = $_POST['nome'];
        
        header('Location: index.php?status=success');

        /*     if ($objterceirizado->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
    }
}
//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroterceirizado.php'\">";

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioterceirizado.php';
include __DIR__ . '/includes/footer.php';
