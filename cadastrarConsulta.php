<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';


use \Classes\Entity\consulta;
use \Classes\Entity\clinica;
use \Classes\Entity\dentista;
use \Classes\Entity\paciente;
use \Classes\Entity\funcionario;


define('TITLE', 'Cadastrar Nova Consulta');
define('IDENTIFICACAO', '0');
$erro = "";
$select = "";
$objClinica = clinica::getClinicas('statusClinica != "inativo"');
if (count($objClinica) < 1){
    $erro = ("<script>
    Swal.fire({
      title: 'Sem clínicas!!',
      text: \"Não foram encontradas clínicas registradas ou ativas, por favor registre ao menos uma antes de cadastrar a consulta\",
      icon: 'error',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    })
    </script>"."<meta http-equiv=\"refresh\" content=\"5;url=listaClinica.php\" />");
}
/* echo '<pre>';print_r($objClinica);echo'<pre>';exit; */
$objDentista = dentista::getDentistas('statusDentista != "inativo"');
if (count($objDentista) < 1){
    $erro = ("<script>
    Swal.fire({
      title: 'Sem Dentistas!!',
      text: \"Não foram encontrados dentistas registrados ou ativas, por favor registre ao menos uma antes de cadastrar a consulta\",
      icon: 'error',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    })
    </script>"."<meta http-equiv=\"refresh\" content=\"5;url=listaDentista.php\" />");
}
/* echo '<pre>';print_r($objDentista);echo'<pre>';exit; */
$objPaciente = paciente::getPacientes();
if (count($objPaciente) < 1){
    $erro = ("<script>
    Swal.fire({
      title: 'Sem Pacientes!!',
      text: \"Não foram encontrados pacientes registrados, por favor registre ao menos uma antes de cadastrar a consulta\",
      icon: 'error',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    })
    </script>"."<meta http-equiv=\"refresh\" content=\"5;url=listaPaciente.php\" />");
}
/* echo '<pre>';print_r($objPaciente);echo'<pre>';exit; */
$objFuncionario = funcionario::getFuncionarios();
/* echo "<pre>"; print_r($objFuncionario); echo "<pre>";exit; */

$objConsulta = new consulta;
if (isset($_POST['paciente'], $_POST['horarios'], $_POST['dentista'], $_POST['clinica'])) {
    $objConsulta->dataConsulta = date('Y-m-d',strtotime($_POST['data']));
    $objConsulta->horaConsulta = $_POST['horarios'];
    $objConsulta->statusConsulta = ($_POST['status'] != '' ? $_POST['status'] : 'Agendada');
    $objConsulta->relatorio = ($_POST['relatorio'] != null ? $_POST['relatorio'] : 'Sem observações');
    $objConsulta->fkProntuario = $_POST['paciente'];
    $objConsulta->fkFuncionario = $_SESSION['idFuncionario'];
    $objConsulta->CFKClinica = $_POST['clinica'];
    $objConsulta->CFKDentista = $_POST['dentista'];
        /* echo "<pre>"; print_r($objConsulta); echo "<pre>";exit; */

    //echo '<pre>';print_r($objConsulta);echo'<pre>';exit;
    $objConsulta->cadastrarConsulta();

    if ($objConsulta->idConsulta > 0) {
        header('Location: pesquisarConsulta.php?pagina=1&status=success1&id=' . $objConsulta->idConsulta);
    } else {
        header('Location: pesquisarConsulta.php?pagina=1&status=error1');
    }
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioConsulta.php';
include __DIR__ . '/includes/footer.php';
