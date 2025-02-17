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


define('TITLE', 'Register Appointment');
define('IDENTIFICACAO', '0');
define('BTN', 'cadastrarConsulta');
$erro = "";
$select = "";
$objClinica = clinica::getClinicas('statusClinica != "Inactive"');
if (count($objClinica) < 1) {
  $erro = ("<script>
  Swal.fire({
    title: 'No clinics!!',
    text: \"No registered or active clinics were found, please register at least one before registering the Appointment\",
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
    title: 'No Dentists!!',
    text: \"No registered or active dentists were found, please register at least one before registering the consultation\",
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
    title: 'No Patients!!',
    text: \"No registered or active patients were found, please register at least one before registering the consultation\",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Ok'
  })
  </script>" . "<meta http-equiv=\"refresh\" content=\"5;url=listaPaciente.php\" />");
}
/* echo '<pre>';print_r($objPaciente);echo'<pre>';exit; */
$objFuncionario = funcionario::getFuncionarios();
/* echo "<pre>"; print_r($objFuncionario); echo "<pre>";exit; */
/* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
$objConsulta = new consulta;
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
    /* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
    $objConsulta->dataConsulta = date('Y-m-d',strtotime($_POST['data']));
    $objConsulta->horaConsulta = $_POST['horarios'];
    $objConsulta->statusConsulta = ($_POST['status'] != '' ? $_POST['status'] : 'Scheduled');
    $objConsulta->relatorio = ($_POST['relatorio'] != null ? $_POST['relatorio'] : 'No Observations');
    $objConsulta->fkProntuario = $_POST['paciente'];
    $objConsulta->fkFuncionario = $_SESSION['idFuncionario'];
    $objConsulta->CFKClinica = $_POST['clinica'];
    $objConsulta->CFKDentista = $_POST['dentista'];
    
    /* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
    // Validação dos campos select

 /*    if($_POST['paciente'] == "[SELECIONE]"){
        echo "<pre>"; print_r('teste'); echo "<pre>";exit;
    } */
 



    /* echo '<pre>';print_r($_POST);echo'<pre>';exit; */
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
