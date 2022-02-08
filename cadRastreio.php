<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('TITLE', 'Register Tracking');
define('BTN', 'cadastrarRastreio');
define('IDENTIFICACAO', '0');
//define('IDENTIFICACAO', 1);



/* echo "<pre>"; print_r($_SESSION); echo "<pre>";exit; */

use Classes\Entity\Lembrete;
use Classes\Entity\rastreio;
use Classes\Entity\terceiro;
use Classes\Entity\terceirizado;
use Classes\Entity\tratamento;

$innerTratamento = "";

//$consulta = consulta::getConsultas();
//$procedimento = procedimento::getProcedimentos();

$terceiro = terceiro::getTerceiros();



//$selectTerceiro= '<script>document.write(selectTerceiro)</script>';
//echo $selectTerceiro;

//echo'<pre>';print_r($selectTerceiro);echo'</pre>';exit;





if (isset($_GET['rProtese'])) {
    $innerTratamento = tratamento::getTratamentoInner($_GET['rProtese']);
    //echo'<pre>';print_r($innerTratamento);echo'</pre>';exit;
}

//echo'<pre>';print_r($innerTratamento);echo'</pre>';exit;


$rastreio = new rastreio();
$lembrete = new Lembrete();

$terceirizado = new terceirizado();

if (
    //Checa se existem
    isset(
        $_POST['dtEntrega'],
        $_POST['dtRetorno'],
        $_POST['obs'],
        $_POST['RFKTerceiro'],
        $_POST['RFKServico'],
        $_POST['status']
    )
    //Checa se são diferentes de vazio
    && $_POST['dtEntrega'] != ""
    && $_POST['dtRetorno'] != ""
    && $_POST['RFKTerceiro'] != ""
    && $_POST['RFKServico'] != ""
    && $_POST['status'] != ""
) {


    $rastreio->dtEntrega = ($_POST['dtEntrega']);
    $rastreio->dtRetorno = $_POST['dtRetorno'];
    $rastreio->obs = strlen($_POST['obs']) ? $_POST['obs'] : 'No Observations';
    $rastreio->statusRastreio = $_POST['status'];
    $rastreio->RFKTerceiro = $_POST['RFKTerceiro'];
    $rastreio->RFKServico = $_POST['RFKServico'];
    $rastreio->fkProtese = $_POST['fkProtese'];
    //$terceirizado->fkTerceiro = $rastreio->RFKTerceiro;
    //$terceirizado->fkServicoTerceiro = $rastreio->RFKServico;
    /* echo'<pre>';print_r($rastreio);echo'</pre>';exit; */
    unset($_POST['cadastrarRastreio']);
/* echo "<pre>"; print_r($_POST); echo "<pre>";exit; */
    $rastreio->cadastrarRastreio();
    $lembrete->titulo = 'Denture\'s return';
    $lembrete->dataLembrete = $_POST['dtRetorno'];
    $lembrete->descricao = 'Return of denture n°' . $_POST['fkProtese'];
    $lembrete->Funcionario = $_SESSION['idFuncionario'];


    $lembrete->cadastrarLembrete();

    if ($rastreio->idRastreio > 0) {
        header('Location: listaRastreio.php?pagina=1&status=success1&id=' . $rastreio->idRastreio);
    } else {
        header('Location: listaRastreio.php?pagina=1&status=error1');
    }
    //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
    //URL='cadastroDentista.php'\">";

}
if (isset($_GET['rProtese'])) {

    $rastreio->fkProtese = $_GET['rProtese'];
}


/*if (isset($_POST['pConsultaRast'])){
    header ('Location: listaConsultaR.php?rastreio=check');
}*/

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formRastreio.php';

include __DIR__ . '/includes/footer.php';
