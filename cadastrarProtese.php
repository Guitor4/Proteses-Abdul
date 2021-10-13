<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';


use \Classes\Entity\Protese;
use \Classes\Entity\Paciente;

define('TITLE', 'Cadastrar Prótese');
/**
 * Validação do POST, ainda incompleta pois não possui todos os campos necessários
 */
if (isset($_GET['prontuario'])) {
    $pacientes = paciente::getPaciente($_GET['prontuario']);
} else {
    $pacientes = paciente::getPacientes();
}
/* echo "<pre>"; print_r($pacientes); echo "<pre>";exit; */
$objProtese = new Protese;
/* if (isset($_POST['cadastrarProtese'])){
    echo "<pre>"; print_r($_POST); echo "<pre>";exit;
} */
if (isset($_POST['cadastrarProtese'])) {
    /**
     * Aqui a classe Protese é instanciada e tem todos as sua variáveis preenchidas pelos valores recebidos do POST, exceto a dataRegistro
     * e a variável ID que são preenchidas automaticamente posteriormente.
     * Pode-se notar alguns tratamentos com operadores ternários para dureza, ouro, e quantidade
     */

    $objProtese->tipo = $_POST['tipo'];
    $objProtese->posicao = $_POST['posicao'];
    $objProtese->material = $_POST['material'];
    $objProtese->dureza = (isset($_POST['nivelDureza']) ? $_POST['nivelDureza'] : "Metal");
    $objProtese->extensao = $_POST['extensao'];
    $objProtese->qtdDente = $_POST['qtdDentes'];
    $objProtese->dente = $_POST['tipoDente'];
    $objProtese->ouro = ($_POST['denteOuro'] == "on" ? "sim" : "nao");
    $objProtese->qtdOuro = (isset($_POST['qtdOuro']) ? $_POST['qtdOuro'] : 0);
    $objProtese->paciente = $_POST['paciente'];
    $objProtese->status = 'Cadastrada';
    $objProtese->observacao = $_POST['observacao'];
    $objProtese->fkConsultaT = $_GET['idConsulta'];
    $objProtese->fkProcedimentoT = $_GET['idProcedimento'];

    /* echo "<pre>"; print_r($objProtese); echo "<pre>";exit; */
    //Executa a função cadastrar que está localizada na classe "Protese".
    $objProtese->cadastrar();
    //Caso a função cadastrar rode sem problemas, obrigatóriamente o valor do $objProtese->id será preenchido
    //Assim fazendo uma validação por meio dessa variável, e passando isso pro url da página.
    if ($objProtese->idProtese > 0) {
        header('Location: pesquisarProtese.php?status=success&id='.$objProtese->idProtese);
    } else {
        header('Location: pesquisarProtese.php?status=error');
    }
}
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioProtese.php';
include __DIR__ . '/includes/footer.php';
