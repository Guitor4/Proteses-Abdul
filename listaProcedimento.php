<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\Procedimento;

define('NAME', 'Procedimento');
define('LINK', 'listaProcedimento.php');
define('IDENTIFICACAO', 2);

if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaProcedimento.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'nomeProcedimento LIKE "%' . str_replace('', '%', $search) . '%"' : null

];

$where = implode(' AND ', $condicoes);


$pagina_atual = intval($_GET['pagina']);


$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 5;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$registros_totais = $objProcedimento = Procedimento::getProcedimentos($where);

$registros_filtrados = $objProcedimento = Procedimento::getProcedimentos($where, null, 'nomeProcedimento', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);
/* echo "<pre>"; print_r($num_pagina); echo "<pre>";exit; */
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaProcedimento.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
