<?php

include __DIR__.'./vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';

use Classes\Entity\MarcaDente;

define('NAME', 'Tooth Brand');
define('LINK', 'listaMarcaDente.php?pagina=1');
define('IDENTIFICACAO', 0);
if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaMarcaDente.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'nomeMarca LIKE "%' . str_replace('', '%', $search) . '%" or idMarcaDente LIKE "%' . str_replace('', '%', $search) . '%"' : null

];

$where = implode(' AND ', $condicoes);
/* $where = "Guilherme Torquato"; */

$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 5;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$registros_totais = MarcaDente::getMarcas($where);

$marcas =  $registros_filtrados = MarcaDente::getMarcas($where, null, null, $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

/* echo "<pre>"; print_r($pacientes); echo "<pre>";exit; */

$resultados = '';
foreach ($marcas as $m) {
    $resultados .= '<tr> '
        . '<td> ' . $m->idMarcaDente . '</td>'
        . '<td> ' . $m->nomeMarca . '</td>'
        . '<td style = "max-width:200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"> ' . $m->descricao . '</td>'
        . '<td> 
          <a href="editaMarcaDente.php?prontuario=' . $m->idMarcaDente . '" 
              class="btn btn-info" >Edit</a>
         </td>
         </tr>';
}

$resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "6" class = "text-center"> Nenhuma Marca de dente encontrada</td>'
    . '</tr>';

include __DIR__.'./includes/header.php';
include __DIR__.'./includes/formularioListaMarca.php';
include __DIR__.'./includes/mensagensCRUD.php';
include __DIR__.'./includes/footer.php';