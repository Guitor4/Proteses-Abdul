<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
define('TITLE', 'Cadastrar Lembrete');
define('BTN', 'cadastrarLembrete');
define('IDENTIFICACAO', '0');

use Classes\Entity\Lembrete;
$lembretes = new Lembrete;

if(isset($_POST[BTN])){
    $lembretes->titulo = $_POST['titulo'];
    $lembretes->descricao = $_POST['descricao'];
    $lembretes->dataLembrete = $_POST['dataLembrete'];
    $lembretes->Funcionario = $_SESSION['idFuncionario'];

    $lembretes->cadastrarLembrete();
/* echo "<pre>"; print_r($lembretes); echo "<pre>";exit; */
    if($lembretes->idLembrete > 0){
        header('location: listaLembrete.php?pagina=1&status=success&id='.$lembretes->idLembrete);
    }else{
        header('location: listaLembrete.php?pagina=1&status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioLembrete.php';
include __DIR__.'/includes/footer.php';