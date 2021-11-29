<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\Funcionario;

define('TITLE', 'Editar Funcionário');
define('BTN', 'editarFuncionario');
define('IDENTIFICACAO', '0');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}

$objFuncionario = Funcionario::getFuncionario($_GET['id']);
/* echo '<pre>';print_r($objFuncionario);echo '<pre>';exit; */


if (!$objFuncionario instanceof Funcionario) {
    header('Location: index.php?status=error');
    exit;
}

if (isset($_POST['editarFuncionario'])) {
    if (isset($_POST['nome'], $_POST['login'], $_POST['status'])) {

        $objFuncionario = new Funcionario;
        $objFuncionario->idFuncionario = $_GET['id'];
        $objFuncionario->nome = $_POST['nome'];
        $objFuncionario->dtContrato = $_POST['dtContrato'];
        $objFuncionario->sexo = $_POST['sexo'];
        $objFuncionario->telefone = ($_POST['telefone']);
        $objFuncionario->email = $_POST['email'];
        $objFuncionario->perfil = $_POST['perfil'];
        $objFuncionario->login = $_POST['login'];
        $objFuncionario->senha = $_POST['senha'];
        $objFuncionario->statusFuncionario = $_POST['status'];
        //echo '<pre>';print_r($objFuncionario);echo '<pre>';exit;

        $objFuncionario->AtualizarFuncionario();

        header('Location: index.php?status=success');

        /*     if ($objFuncionario->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
    }
}
//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroFuncionario.php'\">";

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioFuncionario.php';
include __DIR__ . '/includes/footer.php';
