<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Imagem;

define('IDENTIFICACAO', 0);
if (isset($_GET['paciente'])) {

    $paciente = ($_GET['paciente']);
    $pac = $paciente;
    
}

if (isset($_POST['edFotoPerfil'])) {
    $msgBool = false;
    if (isset($_FILES['imagem']) && basename($_FILES["imagem"]["name"]) != "") {
        $target_dir = "./Imagens/";
        $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
        $imagem = $target_file;
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $iId = filter_input(INPUT_POST, 'idImg', FILTER_SANITIZE_STRING);
        $uploadOk = 1;
        $msgBool = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
            $msgBool = true;
        } else {
            //$msg->setMsg("Arquivo não é uma imagem.");
            $uploadOk = 0;
            $msgBool = false;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $imagem = $target_file;
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["imagem"]["size"] > 500000) {
            //$msg->setMsg("O arquivo excedeu o limite do tamanho permitido (500KB).");
            $imagem = "./Imagens/usuario.png";
            $uploadOk = 0;
            $msgBool = false;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jfif" && $imageFileType != "gif") {
            //$msg->setMsg("A extensão da imagem deve ser JPG, JPEG, PNG & "
            //. "GIF.");
            $uploadOk = 0;
            $msgBool = false;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
            
            //$msg->setMsg("A imagem não foi gravada.");
            // if everything is ok, try to upload file
//        }else{
//           $imagem = "./imagens/usuario.png";
//        }if ($msgBool == false) {

            //echo $msg->getMsg();
        }
    
    $objImagem = new Imagem();
    
    $objImagem->idImagem = $iId;
    $objImagem->titulo = $titulo;
    $objImagem->img = $imagem;
    $objImagem->fkProntuario = $pac;
    $objImagem->EditarImagem();
    unset($_POST['edFotoPerfil']);
    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
        \">";
}


}

if (isset($_POST['delFotoPerfil'])){
    
        $target_dir = "./Imagens/";
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        
        $target_file = $target_dir . $nome;
        $imagem = $target_file;
        $iId = filter_input(INPUT_POST, 'idImg', FILTER_SANITIZE_STRING);
        
        //echo'<pre>';print_r($iId);echo'</pre>';exit;
        // Check if file already exists
        if (file_exists($target_file)) {
            $imagem = $target_file;
            unlink($imagem);
            
        }

    $objImagem = new Imagem();
    
    $objImagem->idImagem = $iId;
    $objImagem->titulo = "perfil_";
    $objImagem->img = "./Imagens/usuario.png";
    $objImagem->fkProntuario = $pac;
    $objImagem->EditarImagem();
    unset($_POST['delFotoPerfil']);
    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
        \">";
    
}



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProntuario.php';
include __DIR__ . '/includes/footer.php';

