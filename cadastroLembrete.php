<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Cadastrar Lembrete');
define('BTN', 'cadastrarLembrete');
define('IDENTIFICACAO', '0');

use Classes\Entity\Lembrete;

$lembretes = new Lembrete;

if (isset($_POST[BTN])) {
    $lembretes->titulo = $_POST['titulo'];
    $lembretes->descricao = ($_POST['descricao'] != null ? $_POST['descricao'] : 'Sem comentários');
    $lembretes->dataLembrete = $_POST['dataLembrete'];
    $lembretes->Funcionario = $_SESSION['idFuncionario'];
    /* echo "<pre>"; print_r($lembretes); echo "<pre>";exit; */
    $lembretes->cadastrarLembrete();
    
    if ($lembretes->idLembrete > 0) {
        header('location: listaLembrete.php?pagina=1&status=success1&id=' . $lembretes->idLembrete);
    } else {
        header('location: listaLembrete.php?pagina=1&status=error1');
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioLembrete.php';
include __DIR__ . '/includes/footer.php';
