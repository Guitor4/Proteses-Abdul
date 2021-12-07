<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\Protese;
use \Classes\Entity\Paciente;
use Classes\Entity\MarcaDente;

define('TITLE', 'Cadastrar Prótese');
define('BTN', 'cadastrarProtese');
define('IDENTIFICACAO', '0');

if (!isset($_GET['prontuario'], $_GET['idConsulta'], $_GET['idProcedimento'])) {
    header('location: pesquisarProtese.php?pagina=1&status=error1');
}
/**
 * Validação do POST, ainda incompleta pois não possui todos os campos necessários
 */
if (isset($_GET['prontuario'])) {

    $pacientes = paciente::getPaciente($_GET['prontuario']);
} else {
    $pacientes = paciente::getPacientes();
}

$marcas = MarcaDente::getMarcas();
/* echo "<pre>"; print_r($marcas); echo "<pre>";exit; */

/* echo "<pre>"; print_r($pacientes); echo "<pre>";exit; */
$objProtese = new Protese;
/* if (isset($_POST['cadastrarProtese'])){
    echo "<pre>"; print_r($_POST); echo "<pre>";exit;
} */
if (isset($_POST[BTN])) {
    /**
     * Aqui a classe Protese é instanciada e tem todos as sua variáveis preenchidas pelos valores recebidos do POST, exceto a dataRegistro
     * e a variável ID que são preenchidas automaticamente posteriormente.
     * Pode-se notar alguns tratamentos com operadores ternários para dureza, ouro, e quantidade
     */

    /*  echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $objProtese->tipo = $_POST['tipo'];
    $objProtese->posicao = $_POST['posicao'];
    $objProtese->extensao = $_POST['extensao'];
    $objProtese->marcaDente = $_POST['marca'];
    $objProtese->qtdDente = $_POST['qtdDentes'];
    $objProtese->ouro = (isset($_POST['ouroDente']) == "on" ? "sim" : "nao");
    $objProtese->qtdOuro = (isset($_POST['qtdOuro']) ? $_POST['qtdOuro'] : 0);
    $objProtese->paciente = $_POST['paciente'];
    $objProtese->status = 'Cadastrada';
    $objProtese->observacao = $_POST['observacao'];
    $objProtese->fkConsultaT = (isset($_GET['idConsulta']) ? $_GET['idConsulta'] : 'Erro');
    $objProtese->fkProcedimentoT = (isset($_GET['idProcedimento']) ? $_GET['idProcedimento'] : 'Erro');

    /* echo "<pre>"; print_r($objProtese); echo "<pre>";exit; */
    //Executa a função cadastrar que está localizada na classe "Protese".
    $objProtese->cadastrar();
    //Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objProtese->id será preenchido
    //Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
    if ($objProtese->idProtese > 0) {
        if (isset($_GET['number']) && $_GET['number'] == 1) {
            header('location: pesquisarProtese.php?pagina=1&idConsulta=' . $_GET["idConsulta"] . '&idProcedimento=' . $_GET["idProcedimento"] . '&prontuario=' . $_GET["prontuario"] . '&number=2');
        } else if (isset($_GET['number']) && $_GET['number'] == 2) {
            header('Location: pesquisarProtese.php?pagina=1&status=success1&id=' . $objProtese->idProtese.'&idConsulta='.$_GET["idConsulta"]);
        } else {
            header('Location: pesquisarProtese.php?pagina=1&status=success1&id=' . $objProtese->idProtese);
        }
    } else {
        header('Location: pesquisarProtese.php?pagina=1&status=error1');
    }
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioProtese.php';
include __DIR__ . '/includes/footer.php';
