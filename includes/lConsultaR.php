<div class="container-fluid">
    <main>
    <section class="d-flex justify-content-center mt-2">
      <div class="col-4">
        <div class="bg-dark rounded p-2">
          <h5 style="color: white; text-align: center ">Buscar Prontuário</h5>
          <form method="post" action="">
            <div class="col-10 form-group p-2" style="margin:auto">

              <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= $busca ?>">
            </div>
            <input type="submit" name="pesquisarPron" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

          </form>

        </div>
        <div class="d-flex justify-content-center">
          <div class="col-6 p-2">
            <a href="listaConsultaR.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
          </div>
        </div>
      </div>

    </section>


        <section>
          
                
            <table class="table bg-light bg-gradient mt-3">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Prontuário</th>
                        <th>Paciente</th>
                        <th>Consulta</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>status</th>
                        <th>Dentista</th>
                        <th>Clínica</th>
                        <th>Procedimento</th>

                        <th></th>


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
                                <a class="page-link" href="listaConsultaR.php?pagina=1"><<</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="listaConsultaR.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" tabindex="-1">Anterior</a>
                            </li>
                            <?php
                            $limite_paginacao = ceil(($num_pagina + $pagina_atual) / 2);
                            $pagina1 = $pagina_atual < 2 ? $pagina_atual : $pagina_atual - 2;
                            for ($i = $pagina1; $i <= $limite_paginacao; $i++) {
                                $estilo = "";
                                if ($pagina_atual == $i) {
                                    $estilo = "active";
                                }
                                if ($i != 0) {
                            ?>
                                    <li class="page-item <?= $estilo ?>"><a class="page-link" href="listaConsultaR.php?pagina=<?= $i; ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>"><?= $i; ?></a></li>
                            <?php
                                }
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="listaConsultaR.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>">Próximo</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="listaConsultaR.php?pagina=<?= $num_pagina ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>">>></a>
                            </li>
                        </ul>
                    </nav>
                </div>


        </section>
    </main>
</div>