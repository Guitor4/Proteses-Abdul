<?php

require __DIR__.'/vendor/autoload.php';

use \Classes\Entity\funcionario;

define('TITLE','Cadastrar Funcionário');

$objFuncionario = new Funcionario;
if (isset($_POST['nomeFuncionario'],$_POST['login'],$_POST['status'])){

    $objFuncionario->nomeFuncionario = $_POST['nomeFuncionario'];
    $objFuncionario->dtNasc = $_POST['dtNasc'];
    $objFuncionario->sexo = $_POST['sexo'];
    $objFuncionario->telefone = $_POST['telefone'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->perfil = $_POST['perfil'];
    $objFuncionario->login = $_POST['login'];
    $objFuncionario->senha = $_POST['senha'];
    $objFuncionario->statusFuncionario = $_POST['status'];
    /* echo '<pre>';print_r($objFuncionario);echo '<pre>';exit; */
    
    $objFuncionario->cadastrar();
   
    if ($objFuncionario->idFuncionario > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    }
}

include __DIR__.'/includes/headerS.php';
include __DIR__.'/includes/formularioFuncionario.php';
include __DIR__.'/includes/footer.php';
