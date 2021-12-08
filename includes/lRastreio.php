<div class="container-fluid">
    <main>
        <section class="d-flex justify-content-center mt-2">
            <div class="col-4">
                <div class="bg-dark rounded p-2">
                    <h5 style="color: white; text-align: center ">Rastreios</h5>
                    <form method="post" action="">
                        <div class="col-10 form-group p-2" style="margin:auto;">

                            <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= $busca ?>">
                        </div>
                        <input type="submit" name="pesquisarRastreio" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

                    </form>

                </div>
                <div class="row">
                    <div class="col-6 p-2">
                        <a href="listaRastreio.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
                    </div>
                    <div class="col-6 p-2">
                        <a href="listaConsultaR.php?pagina=1"> <input type="submit" value="Cadastrar rastreio" class="btn btn-success w-100" /> </a>
                    </div>
                </div>
            </div>

        </section>
        <?php
        $msg = '';
        if (isset($_GET['status'])) {
            switch ($_GET['status']) {
                case 'success':
                    $msg = '<div class ="alert alert-success"> Ação executada com sucesso!</div>';
                    break;
                case 'error':
                    $msg = '<div class ="alert alert-danger"> Ação não executada!</div>';
                    break;
            }
        }



        $resultados = '';
        foreach ($rastreio as $ras) {
            $resultados .= '<tr>
                            <td class "table-success>' . $ras->idRastreio . '</td>
                            <td>' . date('d/m/y', strtotime($ras->dtEntrega)) . '</td>
                            <td>' . date('d/m/y', strtotime($ras->dtRetorno)) . '</td>
                            <td>' . $ras->idProtese . '</td>
                            <td>' . $ras->tipo . '</td>
                            <td>' . $ras->posicao . '</td>
                            <td>' . $ras->nomePaciente . '</td>
                            <td>' . $ras->prontuario . '</td>
                            <td>' . $ras->idConsulta . '</td>
                            <td>' . $ras->nomeProcedimento . '</td>
                            <td>' . $ras->nomeTerceiro . '</td>
                            <td>' . $ras->nomeServico . '</td>
                            <td>' . $ras->statusRastreio . '</td>
                            <td>
                            <a href = detalhaRastreio.php?id=' . $ras->idRastreio . '& pagina=>
                            <button class = "btn btn-primary">Detalhes</button>
                            </a>
                            </td>
                            </tr>';
        }

        $resultados = strlen($resultados) ? $resultados :
            '<tr>'
            . '<td colspan = "12" class = "text-center"> Nenhum Registro encontrado</td>'
            . '</tr>';

        ?>

        <section>

            <table class="table bg-light mt-2">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>ID</th>
                        <th>Envio</th>
                        <th>Retorno</th>
                        <th>Prótese</th>
                        <th>Tipo</th>
                        <th>Posição</th>
                        <!--<th>obs</th> colocar no formulario de apresentação -->
                        <!--<th>valor</th>-->
                        <th>Paciente</th>
                        <th>Prontuário</th>
                        <th>Consulta</th>
                        <!--<th>Procedimento</th>-->
                        <th>Terceirizado</th>
                        <th>Serviço</th>
                        <th>Status</th>

                        <th></th>
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
                            <a class="page-link" href="listaRastreio.php?pagina=1<?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>"><<</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="listaRastreio.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?>" tabindex="-1">Anterior</a>
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
                                <li class="page-item <?= $estilo ?>"><a class="page-link" href="listaRastreio.php?pagina=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php
                            }
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="listaRastreio.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?>">Próximo</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="listaRastreio.php?pagina=<?= $num_pagina ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>">>></a>
                        </li>
                    </ul>
                </nav>
            </div>


        </section>
    </main>
</div>