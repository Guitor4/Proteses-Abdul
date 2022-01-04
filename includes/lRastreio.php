<div class="container-fluid">
    <main>
        <section class="d-flex justify-content-center mt-2">
            <div class="col-4">
                <div class="bg-dark rounded p-2">
                    <h5 style="color: white; text-align: center ">Trackings</h5>
                    <form method="post" action="">
                        <div class="col-10 form-group p-2" style="margin:auto;">

                            <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= $busca ?>">
                        </div>
                        <input type="submit" name="pesquisarRastreio" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Search">

                    </form>

                </div>
                <div class="row">
                    <div class="col-6 p-2">
                        <a href="listaRastreio.php"> <input type="submit" value="Clear search" class="btn btn-danger w-100" /> </a>
                    </div>
                    <div class="col-6 p-2">
                        <a href="listaConsultaR.php?pagina=1"> <input type="submit" value="Register Tracking" class="btn btn-success w-100" /> </a>
                    </div>
                </div>
            </div>

        </section>
        <?php

        $resultados = '';
        foreach ($rastreio as $ras) {
            $resultados .= '<tr>
                            <td class "table-success>' . $ras->idRastreio . '</td>
                            <td>' . date('m-d-Y', strtotime($ras->dtEntrega)) . '</td>
                            <td>' . date('m-d-Y', strtotime($ras->dtRetorno)) . '</td>
                            <td>' . $ras->idProtese . '</td>
                            <td>' . $ras->tipo . '</td>
                            <td>' . $ras->posicao . '</td>
                            <td>' . $ras->nomePaciente . '</td>
                            <td>' . $ras->prontuario . '</td>
                            <td>' . $ras->idConsulta . '</td>
                            <td>' . $ras->nomeTerceiro . '</td>
                            <td>' . $ras->nomeServico . '</td>
                            <td>' . $ras->statusRastreio . '</td>
                            <td>
                            <a href = detalhaRastreio.php?id=' . $ras->idRastreio . '& pagina=>
                            <button class = "btn btn-primary">Detail</button>
                            </a>
                            </td>
                            </tr>';
        }

        $resultados = strlen($resultados) ? $resultados :
            '<tr>'
            . '<td colspan = "12" class = "text-center">No records found</td>'
            . '</tr>';

        ?>

        <section>

            <table class="table bg-light mt-2">
                <thead class="bg-dark text-light">
                    <tr>
                        <th style = "text-align:center">ID</th>
                        <th style = "text-align:center">Send</th>
                        <th style = "text-align:center">Return</th>
                        <th style = "text-align:center">Denture ID</th>
                        <th style = "text-align:center">Denture option</th>
                        <th style = "text-align:center">Position</th>
                        <th style = "text-align:center">Patient</th>
                        <th style = "text-align:center">Medical Record</th>
                        <th style = "text-align:center">Appointment</th>
                        <th style = "text-align:center">Provider</th>
                        <th style = "text-align:center">Service</th>
                        <th style = "text-align:center">Status</th>
                        <th style = "text-align:center"></th>
                        <th style = "text-align:center"></th>


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
                            <a class="page-link" href="listaRastreio.php?pagina=<?= ($pagina_atual > 1 ? $pagina_atual - 1 : $pagina_atual) ?>" tabindex="-1">Previous</a>
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
                            <a class="page-link" href="listaRastreio.php?pagina=<?= ($pagina_atual < $num_pagina ? $pagina_atual + 1 : $pagina_atual) ?>">Next</a>
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