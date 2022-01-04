<div class="container-fluid p-3">
<input hidden id = "identificacao" value = "<?=IDENTIFICACAO?>"></input>
    <main>
        <section class="p-2">
            <div class="col-4 offset-4">
                <div class="bg-dark rounded p-2">
                    <h5 style="color: white; text-align: center ">Dentures</h5>
                    <form method="post" action="">
                        <div class="col-10 form-group p-2" style="margin:auto">

                            <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= $search ?>">
                        </div>
                        <input type="submit" name="pesquisarProtese" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Search">

                    </form>

                </div>
                <div class="col-6 offset-3 p-2">
                    <a href="pesquisarProtese.php"> <input type="submit" value="Clear Search" class="btn btn-danger w-100" /> </a>
                </div>

            </div>

        </section>

        <table class="table bg-light table-striped table-hover mt-1 table-responsive">
            <thead class="bg-dark text-light">
                <tr class="text-center">

                    <th scope="col">ID</th>
                    <th scope="col">Patient</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tooth Brand</th>
                    <th scope="col">Number of teeth</th>
                    <th scope="col">Has Golden tooth</th>
                    <th scope="col">Golden teeth</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Actions</th>



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
            <a class="page-link" href="pesquisarProtese.php?pagina=1<?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>"><<</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="pesquisarProtese.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>" tabindex="-1">Previous</a>
          </li>
          <?php
          for ($i = 1; $i <= $num_pagina; $i++) {
            $estilo = "";
            if ($pagina_atual == $i) {
              $estilo = "active";
            }
          ?>
            <li class="page-item <?= $estilo ?>"><a class="page-link" href="pesquisarProtese.php?pagina=<?= $i; ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>"><?= $i; ?></a></li>
          <?php
          }
          ?>
          <li class="page-item">
            <a class="page-link" href="pesquisarProtese.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>">Next</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="pesquisarProtese.php?pagina=<?= $num_pagina?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>">>></a>
          </li>
        </ul>
      </nav>
    </div>

    </main>
</div>