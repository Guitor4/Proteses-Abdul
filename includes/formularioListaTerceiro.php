<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </section>
    <section class="d-flex justify-content-center mt-2">
        <div class="col-4">
            <div class="bg-dark rounded p-2">
                <h5 style="color: white; text-align: center ">Terceiros</h5>
                <form method="post" action="">
                    <div class="col-10 form-group p-2" style="margin:auto">
                        <input hidden name="tabela" value="terceiro"></input>
                        <input type="text" class="form-control p-1" id="busca" name="busca" required="" value="<?= $busca ?>">
                    </div>
                    <input type="submit" name="pesquisarTerceiro" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

                </form>

            </div>
            <div class="row">
                <div class="col-6 p-2">
                    <a href="listaTerceiro.php?pagina=1"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
                </div>
                <div class="col-6 p-2">
                    <a href="cadastroTerceiro.php"> <input type="submit" value="Cadastrar Terceiro" class="btn btn-success w-100" /> </a>
                </div>
            </div>
        </div>

    </section>

<div class="container-fluid">

        <div class="row">

            <div class="mt-2">

                <table class="table bg-light table-striped table-hover mt-1 table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th>Número do ID</th>
                            <th>Nome Serviço Terceiro</th>
                            <th>Descrição</th>
                            <th>Status Serviço Terceiro</th>
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
                                <a class="page-link" href="listaTerceiro.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>" tabindex="-1">Anterior</a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $num_pagina; $i++) {
                                $estilo = "";
                                if ($pagina_atual == $i) {
                                    $estilo = "active";
                                }
                            ?>
                                <li class="page-item <?= $estilo ?>"><a class="page-link" href="listaTerceiro.php?pagina=<?= $i; ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>"><?= $i; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="listaTerceiro.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?><?=isset($_GET['search']) ? '&search='.$_GET['search'] : ''?>">Próximo</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>


        </div>

    </div>
</main>