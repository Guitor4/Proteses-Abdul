<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Edit Patient');
define('BTN', 'editPaciente');
define('IDENTIFICACAO', '0');

use \Classes\Entity\paciente;


//consulta vaga
if (isset($_GET['prontuario'])) {
    $paciente = paciente::getPaciente($_GET['prontuario']);
}


//validação da vaga
if (!$paciente instanceof paciente) {
    header('location: index.php?status=error');
}

if (isset($_POST[BTN])) {

    if (!empty($_POST['nomePaciente'])) {

        $paciente->prontuario = $_GET['prontuario'];
        $paciente->nomePaciente = trim($_POST['nomePaciente']);
        $paciente->sexo = $_POST['sexo'];
        $paciente->telefone = $_POST['tel'];
        $paciente->email = $_POST['email'];

        /* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
        $paciente->editarPaciente();

        if ($paciente->prontuario > 0) {
            header('location:listaPaciente.php?pagina=1&status=success2&id=' . $paciente->prontuario);
        } else {
            header('location:listaPaciente.php?pagina=1&status=error2');
        }
    }
}



//echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
//URL='cadastroPaciente.php'\">";




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioPaciente.php';
include __DIR__ . '/includes/footer.php';
