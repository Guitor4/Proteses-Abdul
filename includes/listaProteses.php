<div class="container-fluid p-3">
<input hidden id = "identificacao" value = "<?=IDENTIFICACAO?>"></input>
    <main>
        <section class="p-2">
            <div class="col-4 offset-4">
                <div class="bg-dark rounded p-2">
                    <h5 style="color: white; text-align: center ">Proteses</h5>
                    <form method="post" action="">
                        <div class="col-10 form-group p-2" style="margin:auto">

                            <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= $busca ?>">
                        </div>
                        <input type="submit" name="pesquisarProtese" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

                    </form>

                </div>
                <div class="col-6 offset-3 p-2">
                    <a href="pesquisarProtese.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
                </div>

            </div>

        </section>

        <table class="table bg-light table-striped table-hover mt-1 table-responsive">
            <thead class="bg-dark text-light">
                <tr class="text-center">

                    <th scope="col">ID</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Extensão</th>
                    <th scope="col">Marca</th>
                    <th scope="col">qtdDentes</th>
                    <th scope="col">Ouro</th>
                    <th scope="col">qtdOuro</th>
                    <th scope="col">Data Registro</th>
                    <th scope="col">Ações</th>



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
            <a class="page-link" href="pesquisarConsulta.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>" tabindex="-1">Anterior</a>
          </li>
          <?php
          for ($i = 1; $i <= $num_pagina; $i++) {
            $estilo = "";
            if ($pagina_atual == $i) {
              $estilo = "active";
            }
          ?>
            <li class="page-item <?= $estilo ?>"><a class="page-link" href="pesquisarConsulta.php?pagina=<?= $i; ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>"><?= $i; ?></a></li>
          <?php
          }
          ?>
          <li class="page-item">
            <a class="page-link" href="pesquisarConsulta.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>">Próximo</a>
          </li>
        </ul>
      </nav>
    </div>

    </main>
</div>