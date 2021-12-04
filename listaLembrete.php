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
  header('location: listaLembrete.php?pagina=1&search=' . $pesquisa);
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

$registros_totais = Lembrete::getLembretesInner($where);

$lembretes =  $registros_filtrados = Lembrete::getLembretesInner($where, null, null, $inicio . ',' . $itens_por_pagina, 'idLembrete,titulo,descricao,dataLembrete,nomeFuncionario');

$num_registros_totais = count($registros_totais);

$num_pagina = ceil($num_registros_totais / $itens_por_pagina);

/* echo "<pre>"; print_r($lembretes); echo "<pre>";exit; */

$resultados = '';
$status = '';
if (isset($_POST['excluirLembrete'])) {
  $id = $_POST['ide'];
  $objLembrete->deletarLembrete($id);
  $status = "<script>
  Swal.fire({
    title: 'Lembrete deletado com sucesso!!',
    text: \"Tudo certo por aqui!!\",
    icon: 'success',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Ok'
  })
  </script>
  <meta http-equiv=\"refresh\" content=\"5;url=index.php\" />
  ";
}

foreach ($lembretes as $l) {
  $resultados .= '<tr> '
    . '<td> ' . $l->idLembrete . '</td>'
    . '<td> ' . $l->titulo . '</td>'
    . '<td style = "max-width:200px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
      "> ' . $l->descricao . '</td>'
    . '<td> ' . $l->dataLembrete . '</td>'
    . '<td> 
          <a href="editaLembrete.php?id=' . $l->idLembrete . '" 
              class="btn btn-info" >Editar</a>
              <button ' . $l->idLembrete . '" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal' . $l->idLembrete . '" >Excluir</button>
         </td>
         
         </tr>
         <div class="modal fade" id="exampleModal' . $l->idLembrete . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content bg-dark text-white" style = "margin-top:10rem;">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Excluir Lembrete ?</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body ">
                     <form method="post" action="">
                         <label><strong>Deseja excluir o produto
                                 ' . $l->titulo . '?</strong></label>
                         <input type="hidden" name="ide" value="' . $l->idLembrete . '">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" name="excluirLembrete" class="btn btn-success">Sim</button>
                     <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>';
}

$resultados = strlen($resultados) ? $resultados :
  '<tr>'
  . '<td colspan = "6" class = "text-center"> Nenhum Lembrete encontrado</td>'
  . '</tr>';

include './includes/header.php';
include './includes/formularioListaLembrete.php';
include './includes/mensagensCRUD.php';
include './includes/footer.php';
