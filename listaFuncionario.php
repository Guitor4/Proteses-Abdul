<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
include __DIR__ . './includes/nivelAcesso.php';

use Classes\Entity\Funcionario;

define('NAME', 'Funcionário');
define('LINK', 'listaFuncionario.php');
define('IDENTIFICACAO', 3);
if (!isset($_GET['pagina'])) {
  header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
  header('location: listaFuncionario.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';


//condições sql
$condicoes = [
  strlen($search) ? 'nomeFuncionario LIKE "%' . str_replace('', '%', $search) . '%"' : null

];


$where = implode(' AND ', $condicoes);

$objFuncionario = new Funcionario;


$pagina_atual = intval($_GET['pagina']);

$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$funcionario = $registros_totais = $objFuncionario->getFuncionarios();

$funcionario = $registros_filtrados = $objFuncionario->getFuncionarios($where, null, 'nomeFuncionario asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);



$resultados = '';
foreach ($funcionario as $objFuncionario) {
  $resultados .= '<tr>
                        <td>' . $objFuncionario->idFuncionario . '</td>
                        <td>' . $objFuncionario->nomeFuncionario . '</td>
                        <td>' . $objFuncionario->sexo . '</td>
                        <td>' . $objFuncionario->telefone . '</td>
                        <td>' . $objFuncionario->email . '</td>
                        <td>' . $objFuncionario->perfil . '</td>
                        <td>' . $objFuncionario->login . '</td>
                        <td>' . $objFuncionario->statusFuncionario . '</td>
                        <td>' . $objFuncionario->dtContrato  . '</td>
                        <td>
                        <a href = editaFuncionario.php?id=' . $objFuncionario->idFuncionario . '>
                        <button type="button" class="btn btn-info">Editar</button>
                        </a>
                        </td>
                        </tr>';
}
$resultados = strlen($resultados) ? $resultados :
  '<tr>'
  . '<td colspan = "12" class = "text-center"> Nenhum Funcionário foi encontrada no histórico</td>'
  . '</tr>';



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaFuncionario.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
