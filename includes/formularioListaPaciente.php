<?php
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
?>


<div class="container-fluid">

    <section class="d-flex justify-content-center mt-2">
        <div class="col-4">
            <input hidden id="identificacao" value="<?= IDENTIFICACAO ?>"></input>
            <div class="bg-dark rounded p-2">
                <h5 style="color: white; text-align: center ">Pacientes</h5>
                <form method="post" action="">
                    <div class="col-10 form-group p-2" style="margin:auto">

                        <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?=isset($_GET['search']) ? $_GET['search'] : ''?>">
                    </div>
                    <input type="submit" name="listaPaciente" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

                </form>

            </div>
            <div class="row">
                <div class="col-6 p-2">
                    <a href="listaPaciente.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
                </div>
                <div class="col-6 p-2">
                    <a href="cadastroPaciente.php"> <input type="submit" value="Cadastrar Paciente" class="btn btn-success w-100" /> </a>
                </div>
            </div>
        </div>

    </section>
    <br>
</div>


<div class="container-fluid">

    <div class="row">

        <div class="col-12 mt-2">

            <table class="table bg-light table-striped table-hover mt-1 table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Prontuário</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>


                <tbody>
                    <?= $resultados ?>


                </tbody>

            </table>
            <div class="d-flex justify-content-center">
                <nav class="" aria-label="...">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="listaPaciente.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>" tabindex="-1">Anterior</a>
                        </li>
                        <?php
                        for ($i = 1; $i <= $num_pagina; $i++) {
                            $estilo = "";
                            if ($pagina_atual == $i) {
                                $estilo = "active";
                            }
                        ?>
                            <li class="page-item <?= $estilo ?>"><a class="page-link" href="listaPaciente.php?pagina=<?= $i; ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>"><?= $i; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link " href="listaPaciente.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>">Próximo</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

    </div>