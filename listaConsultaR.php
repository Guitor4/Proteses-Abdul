<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\Rastreio;
use Classes\Entity\tratamento;

define('IDENTIFICACAO',1);

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'AND nomePaciente LIKE "%'. str_replace('', '%', $busca).'%" OR prontuario='.'"'.trim($busca).'"': null
    
];//echo "<pre>"; print_r($condicoes); echo "<pre>";exit;

$where = implode(' AND ', $condicoes);
 
//echo "<pre>"; print_r($condicoes); echo "<pre>";exit;

$innerTratamentos = tratamento::getTratamentosInner($where); //  tentando implementar consulta 


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

foreach ($innerTratamentos as $dados) {
    //foreach($rastreio as $r){ ***comentário inserido: Fernando
    $disabled = ($dados->idProtese==$dados->fkProtese ? 'class = "btn btn-secondary" disabled = disabled' : 'class = "btn btn-primary"');
    //$disabled = ($disabled2 == 'ok' ? 'hidden=""' : $disabled);

    $resultados .= '<tr ">
                    <td class "table-success >' . $dados->prontuario . '</td>
                        <td>' . $dados->nomePaciente . '</td>
                        <td>' . $dados->idConsulta . '</td>
                    <td>' . date('d/m/Y', strtotime($dados->dataConsulta)) . '</td>
                    <td>' . date(' H:i', strtotime($dados->horaConsulta)) . '</td>
                    <td>' . $dados->statusConsulta . '</td>
                    <td>' . $dados->nomeDentista . '</td>
                    <td>' . $dados->nomeClinica . '</td>
                    <td>' . $dados->nomeProcedimento . '</td>
                    
                    <td>
                    
                    <a ' . $disabled . 'href = cadRastreio.php?rProtese='.$dados->idProtese .'>Confirmar</a>
                    </td>
                    </tr>';
    //}***comentário inserido: Fernando
}

$resultados = strlen($resultados) ? $resultados :
        '<tr>'
        . '<td colspan = "12" class = "text-center"> Nenhuma Consulta foi encontrada no histórico</td>'
        . '</tr>';

//$rastreio = Rastreio::getRastreios(null,null,null,null,'fkProtese');
/* echo "<pre>"; print_r($rastreio); echo "<pre>";exit; */
//echo "<pre>"; print_r($innerTratamentos); echo "<pre>";exit;


//$innerTratamentos = tratamento::getTratamentosInner();

//echo "<pre>"; print_r($innerTratamento); echo "<pre>";exit; 


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/lConsultaR.php';
include __DIR__ . '/includes/footer.php';
