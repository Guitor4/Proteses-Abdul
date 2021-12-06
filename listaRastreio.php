<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\rastreio;

define('NAME', 'Rastreio');
define('LINK', 'listaRastreio.php');
define('IDENTIFICACAO', 1);

if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaRastreio.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'where nomePaciente LIKE "%' . str_replace('', '%', $search) . '%" OR prontuario=' . '"' . trim($search) . '"' : null

];


$where = implode(' AND ', $condicoes);

$objRastreio = new rastreio;


$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$registros_totais = $objRastreio->getRastreios();
/* echo "<pre>"; print_r($inicio); print_r($itens_por_pagina);echo "<pre>";exit; */
$registros_filtrados = $rastreio = $objRastreio->getRastreiosInner( $where,'statusRastreio asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

/* echo "<pre>"; print_r($where); echo "<pre>";exit; */






include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/lRastreio.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
