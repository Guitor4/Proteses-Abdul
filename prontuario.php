<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Imagem;
use Classes\Dao\db;

if (isset($_GET['paciente'])) {

    $paciente = ($_GET['paciente']);
    $pac = $paciente;
}

$conexao = new db();


if (isset($_POST['cadFotoPerfil'])) {
    /* $cadFotoPerfil=filter_input(INPUT_POST, 'cadFotoPerfil', FILTER_SANITIZE_STRING);
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
     * 
     */

    if (isset($_FILES['imagem']) && basename($_FILES["imagem"]["name"]) != "") {
        $target_dir = "./imagens/";
        $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
        $imagem = $target_file;
        $titulo = 
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            //$msg->setMsg("Aruivo não é uma imagem.");
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $imagem = $target_file;
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["imagem"]["size"] > 500000) {
            //$msg->setMsg("O arquivo excedeu o limite do tamanho permitido (500KB).");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jfif" && $imageFileType != "gif") {
            //$msg->setMsg("A extensão da imagem deve ser JPG, JPEG, PNG & "
            //. "GIF.");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //$msg->setMsg("A imagem não foi gravada.");
            // if everything is ok, try to upload file
        } else {
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
        }
    } else {
        $imagem = "./imagens/usuario.png";
    }

    $objImagem = new Imagem();
    unset($_POST['cadFotoPerfil']);
    $objImagem->titulo = $titulo;
    $objImagem->img = $imagem;
    $objImagem->fkProntuario = $fk;
    $objImagem->CadastrarImagem($pac);

    //echo $msg->getMsg();
    //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
    //URL='prontuario.php'\">";
}

if (isset($_POST['edFotoPerfil'])) {
    $msgBool = false;
    if (isset($_FILES['imagem']) && basename($_FILES["imagem"]["name"]) != "") {
        $target_dir = "./imagens/";
        $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
        $imagem = $target_file;
        $uploadOk = 1;
        $msgBool = true;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
            $msgBool = true;
        } else {
            //$msg->setMsg("Aruivo não é uma imagem.");
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
            $imagem = "./imagens/usuario.png";
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
        }
        if ($msgBool == false) {

            //echo $msg->getMsg();
        }
    
    $objImagem = new Imagem();
    unset($_POST['edFotoPerfil']);
    $objImagem->img = $imagem;
    $objImagem->EditarImagem();
    
}
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirProntuario.php';
include __DIR__ . '/includes/footer.php';

