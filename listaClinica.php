<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\clinica;
if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nomeClinica LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);

$objClinica = new clinica;

if(strlen($where)){

    $pagina_atual = 1;
  }else{
    $pagina_atual = intval($_GET['pagina']);
  }
  
  $itens_por_pagina = 6;
  
  $inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;
  
  $registros_totais = $objClinica->getClinicas();
  
  $registros_filtrados = $objFuncionario->getClinicas(null,$where,'nomeFuncionario asc',$inicio.','.$itens_por_pagina);
  
  $num_registros_totais = count($registros_totais);
  
  $num_pagina = ceil($num_registros_totais/$itens_por_pagina);

$objClinica= clinica::getClinicas($where);


$clinica = $objClinica->getClinicas($where);

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



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaClinica.php';
include __DIR__.'/includes/footer.php';