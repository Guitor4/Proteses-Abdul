<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Consulta;
use \Classes\Entity\Procedimento;
use \Classes\Entity\tratamento;

$erro = 0;
$alerta = '';
$ConsultaInnerJoin = consulta::getConsultaInnerJoin('paciente,dentista,clinica,funcionario', 'idConsulta = ' . $_GET['id'], 'fkProntuario,prontuario,CFKDentista,idDentista,CFKClinica,idClinica,fkFuncionario,idFuncionario');
if (!$ConsultaInnerJoin instanceof consulta) {
    header('location: pesquisarConsulta.php?status=error');
}
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
                        <td><a style="display:block;text-decoration:none;color:red" href="pesquisarProtese.php?pagina=1&idConsulta=' . $_GET["id"] . '&idProcedimento=' . $tratamento->idProcedimento . '&prontuario=' . $ConsultaInnerJoin->prontuario . '">' . $tratamento->nomeProcedimento . '</a></td>
                        </tr>';
        } else {
            $resultados .= '<tr>
            <td><a href="tratamento.php?idConsulta=' . $_GET["id"] . '&idProcedimento=' . $tratamento->idProcedimento . '&prontuario=' . $ConsultaInnerJoin->prontuario . '" style = "display:block;text-decoration:none;color:red">' . $tratamento->nomeProcedimento . '</a></td>
            </tr>';
        }
    }
}
/* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
define('TITLE', 'Dados da consulta de ' . $ConsultaInnerJoin->nomePaciente);
define('NAME', 'Consulta ');
define('LINK', '');
define('IDENTIFICACAO', '0');

$visibilidadiv = '';
if ($ConsultaInnerJoin->statusConsulta == 'Finalizada') {
    $visibilidadiv = "style = display:none;";
}
//Validação do GET
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: pesquisarConsulta.php?status=error');
}
/* echo "<pre>"; print_r($erro); echo "<pre>";exit; */
$objTratamento = new Tratamento;
if ($objProcedimento == null && $ConsultaInnerJoin->statusConsulta != "Finalizada") {

    $alerta = "<script>
    Swal.fire({
      title: 'Sem procedimentos disponíveis para essa Consulta',
      text: \"Essa consulta será finalizada pois já não existem procedimentos possíveis a serem cadastrados\",
      icon: 'success',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    }).then((result) => {
      if (result.isConfirmed) {
        redirecionamento()
    }
    })
    function redirecionamento(){
      window.location.href = \"Consulta.php?id=" . $_GET['id'] . "\"
    }
    </script>
    <meta http-equiv=\"refresh\" content=\"5;url=Consulta.php?id=" . $_GET['id'] . "\" />
    ";
    $objTratamento->atualizarStatusConsulta($_GET['id'], 'Finalizada');
}

if (isset($_POST['Finalizar'])) {
    /*     echo '<pre>';
    print_r($_POST);
    echo '<pre>';
    exit; */
    if (isset($_POST['observacoes'], $_POST['procedimento']) && $_POST['procedimento'] != '-[SELECIONE O PROCEDIMENTO A SER REALIZADO]-') {
        $erro = 0;

        if (count($_POST['procedimento']) > 1) {
            /* echo '<pre>';print_r('teste');echo'<pre>';exit; */
            for ($i = 0; $i < count($_POST['procedimento']); $i++) {
                $objTratamento->observacao = ($_POST['observacoes'] == '' ? 'Sem observações' : $_POST['observacoes']);
                $objTratamento->fkProcedimento = $_POST['procedimento'][$i];
                $objTratamento->fkConsulta = $ConsultaInnerJoin->idConsulta;


                $teste = $objTratamento->cadastrarTratamento();
                echo "<pre>"; print_r($teste); echo "<pre>";exit;
                if (gettype($teste[0]) == 'object') {
                    if (isset($_POST['finalizarConsulta']) && $_POST['finalizarConsulta'] == 'on') {
                        $objTratamento->atualizarStatusConsulta($_GET['id'], 'Finalizada');
                    } else {
                        $erro = 0;
                    }
                } else {
                    $erro = 1;
                }
            }
            if ($erro == 0) {
                header('location: Consulta.php?id=' . $ConsultaInnerJoin->idConsulta);
            }
        } else {
            $objTratamento->observacao = ($_POST['observacoes'] == '' ? 'Sem observações' : $_POST['observacoes']);
            $objTratamento->fkProcedimento = $_POST['procedimento'][0];
            $objTratamento->fkConsulta = $ConsultaInnerJoin->idConsulta;


            $teste = $objTratamento->cadastrarTratamento();

            if (gettype($teste[0]) == 'object') {
                if (isset($_POST['finalizarConsulta']) && $_POST['finalizarConsulta'] == 'on') {
                    $objTratamento->atualizarStatusConsulta($_GET['id'], 'Finalizada');
                }
                $alerta = "<script>
                Swal.fire({
                  title: 'Tratamento para a " . NAME . " n° " . $_GET['id'] . " cadastrado com sucesso!!',
                  text: \"Caso haja alguma alteração a ser feita, utilize a lista de consultas fora da agenda\",
                  icon: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Ok'
                }).then((result) => {
                  if (result.isConfirmed) {
                    redirecionamento()
                }
                })
                function redirecionamento(){
                  window.location.href = \"Consulta.php?id=" . $_GET['id'] . "\"
                }
                </script>
                <meta http-equiv=\"refresh\" content=\"5;url=Consulta.php?id=" . $_GET['id'] . "\" />
                ";
            } else {
                print("<script>
             Swal.fire({
               title: 'Houve um erro ao finalizar a " . NAME . "!!',
               text: \"Algo ocorreu, tente novamente!!\",
               icon: 'error',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Ok'
             })
             </script>");
            }
        }
    } else {
        $erro = 1;
    }
}

//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/abrirConsulta.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
