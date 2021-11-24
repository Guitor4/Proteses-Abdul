<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use Classes\Entity\paciente;

define('NAME', 'Paciente');
define('LINK', 'listaPaciente.php');
define('IDENTIFICACAO', 1);
if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}

//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaPaciente.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'nomePaciente LIKE "%' . str_replace('', '%', $search) . '%" or prontuario LIKE "%' . str_replace('', '%', $search) . '%"' : null

];

$where = implode(' AND ', $condicoes);
/* $where = "Guilherme Torquato"; */

$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 5;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$pacientes = $registros_totais = paciente::getPacientes($where);

$pacientes =  $registros_filtrados = paciente::getPacientes($where, null, null, $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

/* echo "<pre>"; print_r($pacientes); echo "<pre>";exit; */

$resultados = '';
foreach ($pacientes as $p) {
    $resultados .= '<tr> '
        . '<td> ' . $p->prontuario . '</td>'
        . '<td> ' . $p->nomePaciente . '</td>'
        . '<td> ' . $p->sexo . '</td>'
        . '<td> ' . $p->telefone . '</td>'
        . '<td> ' . $p->email . '</td>'
        . '<td> 
          <a href="editaPaciente.php?prontuario=' . $p->prontuario . '" 
              class="btn btn-info" >Editar</a>
              
            <a href="prontuario.php?paciente=' . $p->prontuario . '"
                class="btn btn-primary" >Abrir prontuário</a>
         </td>
         </tr>';
}

$resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "6" class = "text-center"> Nenhum paciente encontrado</td>'
    . '</tr>';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaPaciente.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
