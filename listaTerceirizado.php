<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Terceirizado;

define("IDENTIFICACAO", 9);
define("NAME", 'Serviço Prestado');
define("LINK", 'listaTerceirizado.php?pagina=1');

if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaClinica.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';

//condições sql
$condicoes = [
  strlen($search) ? 'nome LIKE "%' . str_replace('', '%', $search) . '%"' : null

];


$where = implode(' AND ', $condicoes);

$objTerceirizado = new Terceirizado;


$pagina_atual = intval($_GET['pagina']);


$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$Terceirizado = $registros_totais = $objTerceirizado->getTerceirizadoInnerJoin('terceiro,servicoterceiro', $where, 'fkterceiro,idTerceiro,fkServicoTerceiro,idServico');

$Terceirizado = $registros_filtrados = $objTerceirizado->getTerceirizadoInnerJoin('terceiro,servicoterceiro', $where, 'fkterceiro,idTerceiro,fkServicoTerceiro,idServico', null, 'nomeTerceiro asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

$objTerceirizado = Terceirizado::getTerceirizadoInnerJoin('terceiro,servicoterceiro', null, 'fkterceiro,idTerceiro,fkServicoTerceiro,idServico');
/* echo '<pre>';print_r($objTerceirizado);echo '<pre>';exit; */

$resultados = '';
foreach ($Terceirizado as $Terceirizado) {
  /* echo '<pre>';print_r($Terceirizado);echo '<pre>';exit; */
  $resultados .= '<tr>
    <td></td>
    <td>' . $Terceirizado->nomeTerceiro . '</td>
    <td>' . $Terceirizado->nomeServico . '</td>
    <td>
    <a href = editaFuncionario.php?id=' . $Terceirizado->fkTerceiro . '>
    <button type="button" class="btn btn-info">Editar</button>
    </a>
    </td>
    </tr>';
}


$resultados = strlen($resultados) ? $resultados :
  '<tr>'
  . '<td colspan = "12" class = "text-center"> Nenhum Terceirizado foi encontrada no histórico</td>'
  . '</tr>';




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaTerceirizado.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
