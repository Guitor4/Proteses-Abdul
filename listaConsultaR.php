<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\Rastreio;
use Classes\Entity\tratamento;

define('IDENTIFICACAO',1);

if(!isset($_GET['pagina'])){
    header('location: ?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'AND nomePaciente LIKE "%'. str_replace('', '%', $busca).'%" OR prontuario='.'"'.trim($busca).'"': null
    
];//echo "<pre>"; print_r($condicoes); echo "<pre>";exit;

$where = implode(' AND ', $condicoes);

$objTratamento = new tratamento;


$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$registros_totais = $objTratamento->getTratamentosInner($where);

$innerTratamentos = $registros_filtrados = $objTratamento->getTratamentosInner($where,'nomeDentista asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);
 

if (isset($_GET['rastreio']) == "check") {
    $disabledRastreio = 'class = "btn btn-secondary"';
    $disabled2 = 'ok';
    $disabled1 = 'hidden=""';
} else {
    $disabledRastreio = 'hidden=""';
    $disabled2 = '';
    $disabled1 = '';
}
$resultados = '';
/* echo "<pre>"; print_r($innerTratamentos); echo "<pre>";exit; */
foreach ($innerTratamentos as $dados) {
    //foreach($rastreio as $r){ ***comentário inserido: Fernando
    $disabled = 'class = "btn-primary btn"';
    //$disabled = ($disabled2 == 'ok' ? 'hidden=""' : $disabled);

    $resultados .= '<tr ">
                    <td class "table-success >' . $dados->idProtese . '</td>
                        <td>' . $dados->nomePaciente . '</td>
                        <td>' . $dados->idConsulta . '</td>
                    <td>' . date('m-d-Y', strtotime($dados->dataConsulta)) . '</td>
                    <td>' . date(' H:i', strtotime($dados->horaConsulta)) . '</td>
                    <td>' . $dados->statusConsulta . '</td>
                    <td>' . $dados->nomeDentista . '</td>
                    <td>' . $dados->nomeClinica . '</td>
                    <td>' . $dados->nomeProcedimento . '</td>
                    
                    <td>
                    
                    <a class = "btn btn-success" href = cadRastreio.php?rProtese='.$dados->idProtese .'>Select</a>
                    <a ' . $disabled . 'href = protese.php?idProtese='.$dados->idProtese .'&term=1 >Detail</a>
                    </td>
                    </tr>';
    //}***comentário inserido: Fernando
}

$resultados = strlen($resultados) ? $resultados :
        '<tr>'
        . '<td colspan = "12" class = "text-center"> No Dentures found in the history</td>'
        . '</tr>';

//$rastreio = Rastreio::getRastreios(null,null,null,null,'fkProtese');
/* echo "<pre>"; print_r($rastreio); echo "<pre>";exit; */
//echo "<pre>"; print_r($innerTratamentos); echo "<pre>";exit;


//$innerTratamentos = tratamento::getTratamentosInner();

//echo "<pre>"; print_r($innerTratamento); echo "<pre>";exit; 


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/lConsultaR.php';
include __DIR__ . '/includes/footer.php';
