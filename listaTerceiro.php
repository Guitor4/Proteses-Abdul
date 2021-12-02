<?php

require 'vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';
define('NAME', 'Terceiro');
define('LINK', 'listaTerceiro.php?pagina=1');

use Classes\Entity\Terceiro;

if (!isset($_GET['pagina'])) {
    header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

isset($_SESSION['pesquisa']) ? $pesquisa = $_SESSION['pesquisa'] : $pesquisa = $busca;
if ($pesquisa != null) {
    header('location: listaTerceiro.php?pagina=1&search=' . $pesquisa);
}
isset($_GET['search']) ? $search = $_GET['search'] : $search = '';

//condições sql
$condicoes = [
    strlen($search) ? 'nomeTerceiro LIKE "%' . str_replace('', '%', $search) . '%"' : null

];


$where = implode(' AND ', $condicoes);

$objTerceiro = new Terceiro;


$pagina_atual = intval($_GET['pagina']);


$itens_por_pagina = 6;

$inicio = ($itens_por_pagina * $pagina_atual) - $itens_por_pagina;

$registros_totais = $objTerceiro->getTerceiros();

$registros_filtrados = $objTerceiro->getTerceiros($where, null, 'nomeTerceiro asc', $inicio . ',' . $itens_por_pagina);

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

$objTerceiro = Terceiro::getTerceiros($where);

$resultados = '';
foreach ($objTerceiro as $objTerceiro) {
    $resultados .= '<tr>
                        <td>' . $objTerceiro->idTerceiro . '</td>
                        <td>' . $objTerceiro->nomeTerceiro . '</td>
                        <td>' . $objTerceiro->telefone . '</td>
                        <td>' . $objTerceiro->statusTerceiro . '</td>

                        
                        <td>
                        <a href = editaTerceiro.php?id=' . $objTerceiro->idTerceiro . '>
                        <button type="button" class="btn btn-info">Editar</button>
                        </a>
                        </td>
                        </tr>';
}
$resultados = strlen($resultados) ? $resultados :
    '<tr>'
    . '<td colspan = "12" class = "text-center"> Nenhum Terceiro foi registrado por enquanto...</td>'
    . '</tr>';




include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioListaTerceiro.php';
include __DIR__ . '/includes/mensagensCRUD.php';
include __DIR__ . '/includes/footer.php';
