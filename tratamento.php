<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\Tratamento;
use Classes\Entity\Paciente;

if(!isset($_GET['idConsulta'],$_GET['idProcedimento'])){
    header('location: pesquisarConsulta.php');
}

$tratamento = Tratamento::getTratamento('consulta,procedimento','fkConsulta = ' . $_GET['idConsulta'].' and fkProcedimento = ' . $_GET['idProcedimento'],'fkConsulta,idConsulta,fkProcedimento,idProcedimento');

$paciente = Paciente::getPaciente($tratamento->fkProntuario);

define('TITLE', $paciente->nomePaciente);
/* echo '<pre>';print_r($tratamento);print_r($paciente);echo'<pre>';exit; */

include(__DIR__ . '/includes/header.php');
include(__DIR__ . '/includes/abrirTratamento.php');
include(__DIR__ . '/includes/footer.php');


?>
