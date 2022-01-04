<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\Protese;

define('NAME', 'Protese');
define('LINK', 'pesquisarProtese.php');
define('IDENTIFICACAO', 4);
if (!isset($_GET['pagina'])) {
    header('location:?pagina=1');
}
//busca

$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
    header('location: pesquisarProtese.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
    strlen($search) ? 'nomePaciente LIKE "%' . str_replace('', '%', $search) . '%"' : null

];


$where = implode(' AND ', $condicoes);
/**
 * Instancia a classe Protese, para fazer uso do seu método de pesquisa "GetProteses" localizado em Protese.php
 * 
 */

$objProtese = new Protese;

if (
    isset($_GET['idConsulta'], $_GET['idProcedimento'], $_GET['prontuario']) && is_numeric($_GET['idConsulta']) &&
    is_numeric($_GET['idProcedimento']) && is_numeric($_GET['prontuario']) && $_GET['idConsulta'] > 0 && $_GET['idProcedimento'] > 0 && $_GET['prontuario'] > 0
) {
    if (isset($_GET['number']) && $_GET['number'] == 1) {
        $registros_totais = $objProtese->getProtesesPaciente('fkConsultaT =' . $_GET['idConsulta'], '
        dataRegistro desc');
        $registros_filtrados = $proteses = $objProtese->getProtesesPaciente('fkConsultaT =' . $_GET['idConsulta'], '
        dataRegistro desc');
        /*     echo "<pre>"; print_r($protese); echo "<pre>";exit; */
        if ($registros_totais == null) {
            header('location:cadastrarProtese.php?idConsulta=' . $_GET['idConsulta'] . '&idProcedimento=' . $_GET['idProcedimento'] . '&prontuario=' . $_GET['prontuario']);
        }
    } else if (isset($_GET['number']) && $_GET['number'] == 2) {
        $registros_totais = $objProtese->getProtesesPaciente('fkConsultaT =' . $_GET['idConsulta'], '
        dataRegistro desc');
        $registros_filtrados = $proteses = $objProtese->getProtesesPaciente('fkConsultaT =' . $_GET['idConsulta'], '
        dataRegistro desc');
        /* echo "<pre>"; print_r(count($registros_filtrados)); echo "<pre>";exit; */
        if (count($registros_filtrados) == 0) {
            header('location:cadastrarProtese.php?idConsulta=' . $_GET['idConsulta'] . '&idProcedimento=' . $_GET['idProcedimento'] . '&prontuario=' . $_GET['prontuario'] . '&number=1');
        } else if (count($registros_filtrados)  < 2) {
            header('location:cadastrarProtese.php?idConsulta=' . $_GET['idConsulta'] . '&idProcedimento=' . $_GET['idProcedimento'] . '&prontuario=' . $_GET['prontuario'] . '&number=2');
        }
    } else {
        $registros_totais = $objProtese->getProtesesPaciente('fkConsultaT =' . $_GET['idConsulta'], '
        dataRegistro desc');
        $registros_filtrados = $proteses = $objProtese->getProtesesPaciente('fkConsultaT =' . $_GET['idConsulta'], '
        dataRegistro desc');
    }
} else {
    $registros_totais = $objProtese->getProtesesPaciente($where, '
        dataRegistro desc');
    /* echo "<pre>"; print_r($proteses); echo "<pre>";exit; */
}
/* echo "<pre>"; print_r($registros_totais); echo "<pre>";exit; */
//Roda o método getProteses que está localizado em Protese.php para trazer todos os registros do banco no formato de um array de objetos.
if (strlen($where)) {

    $pagina_atual = 1;
} else {
    $pagina_atual = intval($_GET['pagina']);
}

$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;


if (!isset($registros_filtrados)) {
    $registros_filtrados = $proteses = $objProtese->getProtesesPaciente($where, 'statusConsulta,dataConsulta  desc ', $inicio . ',' . $itens_por_pagina);
    /* echo "<pre>"; print_r($registros_filtrados); echo "<pre>";exit; */
}
$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

$resultados = '';
foreach ($proteses as $protese) {
    $table = ($protese->tipo == "Fixa" ? 'class = "table-active text-center"' : '');
    $resultados .= '<tr class = "text-center">

                            <td >' . $protese->idProtese . '</td>
                            <td>' . $protese->nomePaciente . '</td>
                            <td>' . $protese->status . '</td>
                            <td>' . $protese->marcaDente . '</td>
                            <td>' . $protese->qtdDente . '</td>
                            <td>' . ($protese->ouro == 'sim' ? 'Sim' : 'Não') . '</td>
                            <td>' . $protese->qtdOuro . '</td>
                            <td>' . date('m-d-Y à\s H:i', strtotime($protese->dataRegistro)) . '</td>
                            <td>
                            <a href = "editaProtese.php?id=' . $protese->idProtese . '">
                            <button class = "btn btn-primary">Edit</button>
                            </a>
                            <a href = "protese.php?idProtese=' . $protese->idProtese . '">
                            <button class = "btn btn-primary">Detail</button>
                            </a>
                            </td>

        
                            </tr>';
}
$resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhuma Prótese foi encontrada no histórico</td>'
    . '</tr>';



//echo "<pre>"; print_r($proteses); echo "<pre>";exit;





//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listaProteses.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
