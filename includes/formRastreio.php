<div class="container-fluid">

    <section>
        <a href="listaRastreio.php">
            <button class="btn btn-success mt-4">Retornar</button>
        </a>
    </section>

    <input type="text" hidden value="<?= IDENTIFICACAO ?>" />
    <div class="row">

        <div class="col-4 mt-2 <?= (isset($_GET['rProtese']) ? 'offset-3' : 'offset-4') ?> p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form class="p-2" method="post" style="color: white">

                    <div class="form-group">
                        <label>Data de Envio</label>
                        <input type="date" class="form-control" name="dtEntrega" value="<?= $rastreio->dtEntrega ?>">
                    </div>

                    <div class="form-group">
                        <label>Data de Retorno</label>
                        <input type="date" class="form-control" name="dtRetorno" value="<?= $rastreio->dtRetorno ?>">
                    </div>

                    <div class="form-group">
                        <label>Observação</label>
                        <input type="text" class="form-control" name="obs" value="<?= $rastreio->obs ?>">
                    </div>
                    <div class="form-group " hidden="">
                        <label>Prótese</label>
                        <input type="text" class="form-control" name="fkProtese" value="<?= $rastreio->fkProtese ?>">
                    </div>



                    <div class="form-group">
                        <label>Terceirizado</label>
                        <select type="text" class="form-control" name="RFKTerceiro" id="id_terceiro" onchange="getServicoTerceiro(this.value)">
                            <option hidden="" value="0">[SELECIONE]</option>

                            <?php
                            if (TITLE == "Editar Rastreio") { //executado quando na pág editar
                                foreach ($terceiro as $terc) {
                                    $selected = ($rastreio->RFKTerceiro == $terc->idTerceiro ? 'selected = selected' : '');
                                    echo "<option value =" . $terc->idTerceiro . " hidden " . $selected . ">" . $terc->nomeTerceiro . "</option>";
                                }
                            } else {
                                foreach ($terceiro as $terc) {
                                    $selected = ($rastreio->RFKTerceiro == $terc->idTerceiro ? 'selected = selected' : '');
                                    echo "<option value =" . $terc->idTerceiro . " " . $selected . ">" . $terc->nomeTerceiro . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label>Serviço Terceirizado</label>
                        <select id="servico_terceiro" class="form-control" name="RFKServico">
                            <option value="" hidden>Escolher Servico</option>

                            <?php
                            if (TITLE == "Editar Rastreio") {
                                foreach ($servico as $serv) {
                                    $selected = ($rastreio->RFKServico == $serv->idServico ? 'selected = selected' : '');
                                    echo "<option value =" . $serv->idServico . " hidden " . $selected . ">" . $serv->nomeServico . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option hidden="">[SELECIONE]</option>

                            <?php
                            if (TITLE == "Editar Rastreio") { //executado quando na pág editar
                            ?>
                                <option value="aberto" <?= 'aberto' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Aberto</option>
                                <option value="finalizado" <?= 'finalizado' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Finalizado</option>
                                <option value="cancelado" <?= 'cancelado' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Cancelado</option>
                            <?php
                            } else {
                                echo "<option hidden value='aberto' selected=''>Aberto</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="d-flex justify-content-center p-2">

                        <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Rastreio" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                                ?>>

                    </div>
            </div>

            </form>

        </div>
        <?php
        if (isset($_GET['rProtese'])) {
        ?>
            <div class="col-4 mt-2">

                <div class="rounded-3" style=" background-color: black; opacity: 80%; text-align: left; line-height: 3 ; padding-left: 10px;  ">
                    <h4 class="text-white">Dados do paciente Selecionado</h4>
                    <label style="color: orange">
                        <?php
                        if ($innerTratamento != null) {
                            echo 'PRONTUÁRIO: <b>' . $innerTratamento->prontuario . ' </b> || PACIENTE: <b>' . $innerTratamento->nomePaciente .
                                '</b><br>CONSULTA: <b>' . $innerTratamento->idConsulta . '</b> || DATA: <b>' . date('d/m/Y', strtotime($innerTratamento->dataConsulta)) .
                                '</b><br>DENTISTA: <b>' . $innerTratamento->nomeDentista . '</b> || CLÍNICA: <b>' . $innerTratamento->nomeClinica . '<hr>' .
                                '</b>IDPRÓTESE: <b>' . $innerTratamento->idProtese . '</b> || TIPO: <b>' . $innerTratamento->tipo .
                                '</b><br>POSIÇÂO: <b>' . $innerTratamento->posicao . '</b> <br> DATA-REGISTRO: <b>' . date('d/m/Y', strtotime($innerTratamento->dataRegistro));
                        }
                        ?>

                    </label>

                </div>
            </div>
        <?php
        }
        ?>


    </div>

</div>