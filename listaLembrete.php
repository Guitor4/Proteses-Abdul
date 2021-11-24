<?php

include __DIR__ . '   .\vendor\autoload.php';
include __DIR__ . './includes/sessionStart.php';

define('NAME', 'Lembrete');
define('LINK', 'listaLembrete.php?pagina=1');

use Classes\Entity\Lembrete;

$objLembrete = new Lembrete;

if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaLembretes.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'titulo LIKE "%' . str_replace('', '%', $search) . '%" or dataLembrete LIKE "%' . str_replace('', '%', $search) . '%"' : null

];

$where = implode(' AND ', $condicoes);
/* $where = "Guilherme Torquato"; */

$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 5;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$lembretes = $registros_totais = Lembrete::getLembretesInner($where);

$lembretes =  $registros_filtrados = Lembrete::getLembretesInner($where, null, null, $inicio . ',' . $itens_por_pagina, 'idLembrete,titulo,descricao,dataLembrete,nomeFuncionario');

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

/* echo "<pre>"; print_r($lembretes); echo "<pre>";exit; */

$resultados = '';
foreach ($lembretes as $l) {
  $resultados .= '<tr style="height:80px"> '
    . '<td> ' . $l->idLembrete . '</td>'
    . '<td> ' . $l->titulo . '</td>'
    . '<td style = "max-width:200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
      "> ' . $l->descricao . '</td>'
    . '<td> ' . $l->dataLembrete . '</td>'
    . '<td> 
          <a href="editaLembrete.php?id=' . $l->idLembrete . '" 
              class="btn btn-info" >Editar</a>
              <a href="editaLembrete.php?id=' . $l->idLembrete . '" 
              class="btn btn-danger" >Excluir</a>
         </td>
         
         </tr>';
}

$resultados = strlen($resultados) ? $resultados :
  '<tr>'
  . '<td colspan = "6" class = "text-center"> Nenhum Lembrete encontrado</td>'
  . '</tr>';

include './includes/header.php';
include './includes/formularioListaLembrete.php';
include './includes/mensagensCRUD.php';
include './includes/footer.php';
