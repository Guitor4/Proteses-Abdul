<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\dentista;

define('NAME', 'Dentist');
define('LINK', 'listaDentista.php');
define('IDENTIFICACAO', 6);
if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaDentista.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'nomeDentista LIKE "%' . str_replace('', '%', $search) . '%"' : null

];


$where = implode(' AND ', $condicoes);

$objDentista = new dentista;


$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$dentista = $registros_totais = $objDentista->getDentistas($where);

$dentista = $registros_filtrados = $objDentista->getDentistas($where, null, 'nomeDentista asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

$resultados = '';
foreach ($dentista as $d) {
  $resultados .= '<tr> '
    . '<td> ' . $d->idDentista . '</td>'
    . '<td> ' . $d->nomeDentista . '</td>'
    . '<td> ' . $d->statusDentista . '</td>'
    . '<td> 
          <a href="editaDentista.php?idDentista=' . $d->idDentista . '" 
              class="btn btn-info" >Edit</a>
           
         </td>
         </tr>';
}

$resultados = strlen($resultados) ? $resultados :
  '<tr>'
  . '<td colspan = "6" class = "text-center"> No Dentists found!!</td>'
  . '</tr>';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaDentista.php';
include __DIR__ . '/includes/mensagensCRUD.php';

include __DIR__ . '/includes/footer.php';
