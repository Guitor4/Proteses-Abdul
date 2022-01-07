<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Register Appointment');
define('NAME', 'Appointment');
define('IDENTIFICACAO', 'Agendamento');


use \Classes\Entity\consulta;
use \Classes\Entity\clinica;
use \Classes\Entity\dentista;
use \Classes\Entity\paciente;
use \Classes\Entity\funcionario;
use \Classes\Entity\Procedimento;
use \Classes\Entity\tratamento;

$erro = 0;
if (isset($_GET['id'])) {
  $ConsultaInnerJoin = consulta::getConsultaInnerJoin('paciente,dentista,clinica,funcionario', 'idConsulta = ' . $_GET['id'], 'fkProntuario,prontuario,CFKDentista,idDentista,CFKClinica,idClinica,fkFuncionario,idFuncionario');


  /* echo "<pre>"; print_r($ConsultaInnerJoin); echo "<pre>";exit; */
  $objProcedimento = Procedimento::getProcedimentos('idProcedimento not in (select fkProcedimento from tratamento where fkConsulta =' . $_GET['id'] . ')');
  /* echo "<pre>"; print_r($objProcedimento); echo "<pre>";exit; */
  if ($ConsultaInnerJoin->statusConsulta == 'Finalizada') {
    $tratamentos = tratamento::getTratamentos('procedimento', 'fkConsulta =' . $_GET['id'], 'fkProcedimento,idProcedimento');
    /*  echo "<pre>"; print_r($tratamentos); echo "<pre>";exit; */
    $resultados = '';
    /* echo '<pre>';print_r($tratamentos);echo'<pre>';exit; */
    foreach ($tratamentos as $tratamento) {

      if ($tratamento->nomeProcedimento == 'Protese') {
        $resultados .= '<tr>
                        <td><a href="pesquisarProtese.php?pagina=1&idConsulta=' . $_GET["id"] . '&idProcedimento=' . $tratamento->idProcedimento . '&prontuario=' . $ConsultaInnerJoin->prontuario . '" style = "text-decoration:none;color:red">' . $tratamento->nomeProcedimento . '</a></td>
                        </tr>';
      } else {
        $resultados .= '<tr>
            <td><a href="tratamento.php?idConsulta=' . $_GET["id"] . '&idProcedimento=' . $tratamento->idProcedimento . '&prontuario=' . $ConsultaInnerJoin->prontuario . '" style = "text-decoration:none;color:red">' . $tratamento->nomeProcedimento . '</a></td>
            </tr>';
      }
    }
  }
}
$alerta = '';
$objConsulta = new consulta;


$objClinica = clinica::getClinicas('statusClinica != "Inactive"');
/* echo '<pre>';print_r($objClinica);echo'<pre>';exit; */
$objDentista = dentista::getDentistas('statusDentista != "Inactive"');
/* echo '<pre>';print_r($objDentista);echo'<pre>';exit; */
$objPaciente = paciente::getPacientes();
/* echo '<pre>';print_r($objPaciente);echo'<pre>';exit; */
$objFuncionario = funcionario::getFuncionarios();
/* echo "<pre>"; print_r($objFuncionario); echo "<pre>";exit; */
/* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */

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

    $objConsulta->dataConsulta = $_POST['data'];
    $objConsulta->horaConsulta = $_POST['horarios'];
    $objConsulta->statusConsulta = ($_POST['status'] != '' ? $_POST['status'] : 'Agendada');
    $objConsulta->relatorio = ($_POST['relatorio'] != null ? $_POST['relatorio'] : 'Sem observações');
    $objConsulta->fkProntuario = $_POST['paciente'];
    $objConsulta->fkFuncionario = $_SESSION['idFuncionario'];
    $objConsulta->CFKClinica = $_POST['clinica'];
    $objConsulta->CFKDentista = $_POST['dentista'];
        /* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */

    //echo '<pre>';print_r($objConsulta);echo'<pre>';exit;
    $objConsulta->cadastrarConsulta();
    $_POST = null;
    if ($objConsulta->idConsulta > 0) {
      $alerta = "<script>
        Swal.fire({
          title: '" . NAME . " n° " . $objConsulta->idConsulta . " succesfully registered!!',
          text: \"If there are any changes to be made, use the list of appointments outside the agenda\",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            redirecionamento()
        }
        })
        function redirecionamento(){
          window.location.href = \"agendamento.php\"
        }
        </script>";
    }
  }else{
    "<script>
        Swal.fire({
          title: 'There's an error!!',
          text: \"Contact the support\",
          icon: 'err',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ok'
        })";
  }


$calendario =
  "<script>
    Calendario();
</script>";

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/agendaConsulta.php';
include __DIR__ . '/includes/footer.php';
