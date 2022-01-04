<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Consulta;
use \Classes\Entity\clinica;
use \Classes\Entity\dentista;
use \Classes\Entity\paciente;
use \Classes\Entity\funcionario;

define('TITLE', 'Editar Consulta');
define('IDENTIFICACAO', '0');
$objConsulta = consulta::getConsulta($_GET['id']);
/* echo "<pre>"; print_r($objConsulta); echo "<pre>";exit; */
$erro = "";
$select = "<script src=\"js/JQuery2.min.js\"></script>
<script>
    $( document ).ready(function() {
    preencherListaHome();
});";
$objClinica = clinica::getClinicas('statusClinica != "Inactive"');
if (count($objClinica) < 1) {
    $erro = ("<script>
    Swal.fire({
      title: 'Sem clínicas!!',
      text: \"Não foram encontradas clínicas registradas ou ativas, por favor registre ao menos uma antes de cadastrar a consulta\",
      icon: 'error',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    })
    </script>" . "<meta http-equiv=\"refresh\" content=\"5;url=listaClinica.php\" />");
}
/* echo '<pre>';print_r($objClinica);echo'<pre>';exit; */
$objDentista = dentista::getDentistas('statusDentista != "Inactive"');
if (count($objDentista) < 1) {
    $erro = ("<script>
    Swal.fire({
      title: 'Sem Dentistas!!',
      text: \"Não foram encontrados dentistas registrados ou ativas, por favor registre ao menos uma antes de cadastrar a consulta\",
      icon: 'error',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    })
    </script>" . "<meta http-equiv=\"refresh\" content=\"5;url=listaDentista.php\" />");
}
/* echo '<pre>';print_r($objDentista);echo'<pre>';exit; */
$objPaciente = paciente::getPacientes();
if (count($objPaciente) < 1) {
    $erro = ("<script>
    Swal.fire({
      title: 'Sem Pacientes!!',
      text: \"Não foram encontrados pacientes registrados, por favor registre ao menos uma antes de cadastrar a consulta\",
      icon: 'error',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    })
    </script>" . "<meta http-equiv=\"refresh\" content=\"5;url=listaPaciente.php\" />");
}
$objFuncionario = funcionario::getFuncionarios();
/* echo "<pre>"; print_r($objFuncionario); echo "<pre>";exit; */

$objConsulta2 = consulta::getConsultaInnerJoin('paciente,clinica,dentista,funcionario', 'idConsulta = ' . $_GET['id'], 'fkProntuario,prontuario,CFKClinica,idClinica,CFKDentista,idDentista,fkFuncionario,idFuncionario');
//Validação do GET
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}



/* if (!$objConsulta instanceof consulta){
    header ('Location: index.php?status=error');
    exit;
} */
/* if (!$objClinica instanceof clinica){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objDentista instanceof dentista){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objPaciente instanceof paciente){
    header ('Location: index.php?status=error');
    exit;
}
if (!$objFuncionario instanceof funcionario){
    header ('Location: index.php?status=error');
    exit;
} */

/**
 * Validação do POST, ainda incompleta pois não possui todos os campos necessários
 */

/**
 * Aqui a classe Protese é instanciada e tem todos as sua variáveis preenchidas pelos valores recebidos do POST, exceto a dataRegistro
 * e a variável ID que são preenchidas automaticamente posteriormente.
 * Pode-se notar alguns tratamentos com operadores ternários para dureza, ouro, e quantidade
 */
if (
    //Checa se existem
    isset(
        $_POST['paciente'],
        $_POST['data'],
        $_POST['horarios'],
        $_POST['dentista'],
        $_POST['clinica'],
        $_POST['status'],
        $_POST['relatorio']
    )
    //Checa se são diferentes de vazio
    && $_POST['paciente'] != ""
    && $_POST['data'] != ""
    && $_POST['horarios'] != ""
    && $_POST['dentista'] != ""
    && $_POST['clinica'] != ""
    && $_POST['status'] != ""
  ) {
    $objConsulta = new consulta;
    $objConsulta->idConsulta = $_GET['id'];
    $objConsulta->fkProntuario = $_POST['paciente'];
    $objConsulta->fkFuncionario = 1;
    $objConsulta->CFKDentista = $_POST['dentista'];
    $objConsulta->CFKClinica = $_POST['clinica'];
    $objConsulta->dataConsulta = $_POST['data'];
    $objConsulta->horaConsulta = $_POST['horarios'];
    $objConsulta->statusConsulta = $_POST['status'];
    $objConsulta->relatorio = $_POST['relatorio'];
    //Executa a função cadastrar que está localizada na classe "Protese".
    /* echo "<pre>"; print_r($objConsulta); echo "<pre>";exit; */
    $objConsulta->AtualizarConsulta($_GET['id']);

    header('location:pesquisarConsulta.php');
}
//header ('Location: pesquisarConsulta.php?status=success');

//Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objProtese->id será preenchido
//Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
/*     if ($objProtese->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */

//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioConsulta.php';
include __DIR__ . '/includes/footer.php';
