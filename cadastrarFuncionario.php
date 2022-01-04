<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
include __DIR__ . './includes/nivelAcesso.php';

use \Classes\Entity\funcionario;

define('BTN', 'Salvar');
define('TITLE', 'Register Employee');
define('IDENTIFICACAO', '0');
$objFuncionario = new Funcionario;
if (
    //Checa se existem
    isset(
        $_POST['nomeFuncionario'],
        $_POST['sexo'],
        $_POST['email'],
        $_POST['telefone'],
        $_POST['perfil'],
        $_POST['login'],
        $_POST['senha'],
        $_POST['status'],
    )
    //Checa se são diferentes de vazio
    && $_POST['nomeFuncionario'] != ""
    && $_POST['sexo'] != ""
    && $_POST['email'] != ""
    && $_POST['telefone'] != ""
    && $_POST['perfil'] != ""
    && $_POST['login'] != ""
    && $_POST['senha'] != ""
    && $_POST['status'] != ""
  ) {
/*     echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $objFuncionario->nomeFuncionario = $_POST['nomeFuncionario'];
    $objFuncionario->sexo = $_POST['sexo'];
    $objFuncionario->telefone = $_POST['telefone'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->perfil = $_POST['perfil'];
    $objFuncionario->login = $_POST['login'];
    $objFuncionario->senha = $_POST['senha'];
    $objFuncionario->statusFuncionario = ($_POST['status'] == 'on' ? 'Active' : 'Inactive');
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
