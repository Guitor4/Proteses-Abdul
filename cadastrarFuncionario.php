<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
include __DIR__ . './includes/nivelAcesso.php';

use \Classes\Entity\funcionario;

define('BTN', 'Salvar');
define('TITLE', 'Cadastrar Funcionário');
define('IDENTIFICACAO', '0');
$objFuncionario = new Funcionario;
if (isset($_POST[BTN])) {
    /* echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $objFuncionario->nomeFuncionario = $_POST['nomeFuncionario'];
    $objFuncionario->dtContrato = $_POST['dtContrato'];
    $objFuncionario->sexo = $_POST['sexo'];
    $objFuncionario->telefone = $_POST['telefone'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->perfil = $_POST['perfil'];
    $objFuncionario->login = $_POST['login'];
    $objFuncionario->senha = $_POST['senha'];
    $objFuncionario->statusFuncionario = ($_POST['status'] == 'on' ? 'Ativo' : 'Inativo');
    /* echo '<pre>';print_r($objFuncionario);echo '<pre>';exit; */

    $objFuncionario->cadastrar();

    if ($objFuncionario->idFuncionario > 0) {
        header('Location: listaFuncionario.php?pagina=1&status=success1&id=' . $objFuncionario->idFuncionario);
    } else {
        header('Location: listaFuncionario.php?pagina=1&status=error1');
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioFuncionario.php';
include __DIR__ . '/includes/footer.php';
