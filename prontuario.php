<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\Imagem;
use Classes\Dao\db;


if (isset($_GET['paciente'])) {
    
    $paciente=($_GET['paciente']);
    
}

$conexao= new db();
$imagem= new Imagem();
if(isset($_POST['cadFotoPerfil'])||isset($_GET['id']) ){
$cadFotoPerfil=filter_input(INPUT_POST, 'cadFotoPerfil', FILTER_SANITIZE_STRING);
//print_r($cadFotoPerfil);
if ($cadFotoPerfil) {
    $nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nome_imagem= $_FILES['fotoPerfil']['name'];
    
    $imagem->nome=$nome;
    $imagem->img=$nome_imagem;
    unset($_POST['cadFotoPerfil']);
    $id=$_GET['id'];
    $imagem->CadastrarImagem($paciente);
    
    $diretorio='Imagens/'. $id;
    var_dump($id);
    mkdir($diretorio, 0755);
    
} else {
    
    header('location: prontuario.php?paciente='.$paciente.'&status=error');
}
    
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProntuario.php';
include __DIR__ . '/includes/footer.php';

