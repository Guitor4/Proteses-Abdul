<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\Protese;
use Classes\Entity\MarcaDente;

define('TITLE', 'Editar Protese');
define('IDENTIFICACAO', '0');

//Validação do GET
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
}
$objProtese = Protese::getProtesePaciente($_GET['id']);
/* echo "<pre>"; print_r($objProtese); echo "<pre>";exit; */

$marcas = MarcaDente::getMarcas();

//echo "<pre>"; print_r($objProtese); echo "<pre>";exit;

//Validação da Prótese
/* if (!$objProtese instanceof Protese) {
    header('Location: index.php?status=error');
    exit;
} */

/**
 * Validação do POST, ainda incompleta pois não possui todos os campos necessários
 */
if (isset($_POST['tipo'], $_POST['qtdDentes'], $_POST['paciente'])) {
    /**
     * Aqui a classe Protese é instanciada e tem todos as sua variáveis preenchidas pelos valores recebidos do POST, exceto a dataRegistro
     * e a variável ID que são preenchidas automaticamente posteriormente.
     * Pode-se notar alguns tratamentos com operadores ternários para dureza, ouro, e quantidade
     */
    $objProtese = new Protese;
    $objProtese->tipo = $_POST['tipo'];
    $objProtese->posicao = $_POST['posicao'];
    $objProtese->extensao = $_POST['extensao'];
    $objProtese->qtdDente = $_POST['qtdDentes'];
    $objProtese->marcaDente = $_POST['marca'];
    $objProtese->ouro = ($_POST['ouroDente'] == "on" ? "sim" : "nao");
    $objProtese->qtdOuro = (isset($_POST['qtdOuro']) ? $_POST['qtdOuro'] : 0);
    $objProtese->paciente = $_POST['paciente'];
    $objProtese->status = $_POST['status'];
    $objProtese->observacao = $_POST['observacao'];

    /* echo "<pre>"; print_r($objProtese); echo "<pre>";exit; */
    //Executa a função cadastrar que está localizada na classe "Protese".
    $objProtese->atualizarProtese('idProtese =' . $_GET['id']);
    if ($objProtese->idProtese > 0) {
        header('Location: pesquisarProtese.php?pagina=1&status=success2&id=' . $objProtese->idProtese);
    } else {
        header('Location: pesquisarProtese.php?pagina=1&status=error2');
    }
    //Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objProtese->id será preenchido
    //Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
    /*     if ($objProtese->id > 0){
        header ('Location: index.php?status=success');
    }else{
        header ('Location: index.php?status=error');
    } */
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioProtese.php';
include __DIR__ . '/includes/footer.php';
