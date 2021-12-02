<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\clinica;

define('NAME', 'Clinica');
define('LINK', 'listaClinica.php?pagina=1');
define('IDENTIFICACAO', 5);

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
  strlen($search) ? 'nomeClinica LIKE "%' . str_replace('', '%', $search) . '%"' : null

];


$where = implode(' AND ', $condicoes);

$objClinica = new clinica;

$pagina_atual = intval($_GET['pagina']);


$itens_por_pagina = 5;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$clinica = $registros_totais = $objClinica->getClinicas();

$clinica = $registros_filtrados = $objClinica->getClinicas($where, null, 'nomeClinica asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);



$resultados = '';
foreach ($clinica as $c) {
  $resultados .= '<tr> '
    . '<td> ' . $c->idClinica . '</td>'
    . '<td> ' . $c->nomeClinica . '</td>'
    . '<td> ' . $c->statusClinica . '</td>'
    . '<td> 
          <a href="editaClinica.php?idClinica=' . $c->idClinica . '" 
              class="btn btn-info" >Editar</a>
           
         </td>
         </tr>';
}

$resultados = strlen($resultados) ? $resultados :
  '<tr>'
  . '<td colspan = "6" class = "text-center"> Nenhuma clínica encontrada</td>'
  . '</tr>';



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaClinica.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
