<div class="container-fluid">

    <section class="d-flex justify-content-center mt-2">
        <div class="col-4">
            <input hidden id="identificacao" value="<?= IDENTIFICACAO ?>"></input>
            <div class="bg-dark rounded p-2">
                <h5 style="color: white; text-align: center ">Patients</h5>
                <form method="post" action="">
                    <div class="col-10 form-group p-2" style="margin:auto">

                        <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    </div>
                    <input type="submit" name="listaPaciente" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Search">

                </form>

            </div>
            <div class="row">
                <div class="col-6 p-2">
                    <a href="listaPaciente.php"> <input type="submit" value="Clear search" class="btn btn-danger w-100" /> </a>
                </div>
                <div class="col-6 p-2">
                    <a href="cadastroPaciente.php"> <input type="submit" value="Add new Patient" class="btn btn-success w-100" /> </a>
                </div>
            </div>
        </div>

    </section>
    <br>
</div>


<div class="container-fluid">

    <div class="row">

        <div class="col-12 ">

            <table class="table bg-light table-striped table-hover  table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Medical record</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Actions</th>
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
                            <a class="page-link" href="listaPaciente.php?pagina=1<?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>"><<</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="listaPaciente.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" tabindex="-1">Previous</a>
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
                                <li class="page-item <?= $estilo ?>"><a class="page-link" href="listaPaciente.php?pagina=<?= $i; ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>"><?= $i; ?></a></li>
                        <?php
                            }
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link " href="listaPaciente.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>">Next</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="listaPaciente.php?pagina=<?= $num_pagina ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>">>></a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

    </div>