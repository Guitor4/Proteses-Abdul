<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';


if (isset($_GET['paciente'])) {
    
    $paciente=($_GET['paciente']);
    
}

if(isset($_POST['cadFotoPerfil'])){
$cadFotoPerfil=filter_input(INPUT_POST, 'cadFotoPerfil', FILTER_SANITIZE_STRING);
//print_r($cadFotoPerfil);
if ($cadFotoPerfil) {
    $nome=filter_input(INPUT_POST, 'fotoPerfil', FILTER_SANITIZE_STRING);
    $nome_imagem= $_FILES['fotoPerfil']['name'];
    
} else {
    //header('location: prontuario.php');
}
    
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProntuario.php';
include __DIR__ . '/includes/footer.php';

