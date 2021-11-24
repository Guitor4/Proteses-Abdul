<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Cadastrar Paciente');
define('BTN', 'cadastrarPaciente');
define('IDENTIFICACAO', '0');

use Classes\Entity\paciente;

$paciente = new paciente();

if (isset($_POST['cadastrarPaciente'])) {

    if (!empty($_POST['nomePaciente'])) {


        $paciente->nomePaciente = trim($_POST['nomePaciente']);
        $paciente->sexo = $_POST['sexo'];
        $paciente->tel = $_POST['tel'];
        $paciente->email = $_POST['email'];

        $paciente->cadastrarPaciente();

        if ($paciente->prontuario > 0) {
            header('Location: listaPaciente.php?pagina=1&status=success1&id=' . $paciente->prontuario[1]);
        }else{
            header('Location: listaPaciente.php?pagina=1&status=error1');
        }
        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroPaciente.php'\">";
    }
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioPaciente.php';
include __DIR__ . '/includes/footer.php';
