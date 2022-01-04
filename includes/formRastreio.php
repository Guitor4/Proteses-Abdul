<div class="container-fluid mt-5">

    <input type="text" hidden value="<?= IDENTIFICACAO ?>" />
    <div class="row">

        <div class="col-4 mt-2 <?= (isset($_GET['rProtese']) ? 'offset-3' : 'offset-4') ?> p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <div id = "alerta" class="bg-danger text-white text-center" role="alert" style = "display:none;max-height:30px">
                    </div>
                <form name = "formRastreio" class="p-2" method="post" style="color: white">

                    <div class="form-group">
                        <label>Send date</label>
                        <input type="date" class="form-control" min="<?= date('Y-m-d')?>" name="dtEntrega" value="<?= $rastreio->dtEntrega ?>">
                    </div>

                    <div class="form-group">
                        <label>Return date</label>
                        <input type="date" class="form-control" min="<?= date('Y-m-d')?>" name="dtRetorno" value="<?= $rastreio->dtRetorno ?>">
                    </div>

                    <div class="form-group">
                        <label>Observation</label>
                        <input type="text" placeholder="Opcional" class="form-control" name="obs" value="<?= $rastreio->obs ?>">
                    </div>
                    <div class="form-group " hidden="">
                        <label>Denture</label>
                        <input type="text" class="form-control" name="fkProtese" value="<?= $rastreio->fkProtese ?>">
                    </div>



                    <div class="form-group">
                        <label>Provider</label>
                        <select type="text" class="form-control" name="RFKTerceiro" id="id_terceiro" onchange="getServicoTerceiro(this.value)">
                            <option hidden="" value="">[Select]</option>

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
                        <label>Service</label>
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
                            <option hidden="">[Select]</option>

                            <?php
                            if (TITLE == "Edit Tracking") { //executado quando na pág editar
                            ?>
                                <option value="Open" <?= 'Open' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Open</option>
                                <option value="Finished" <?= 'Finished' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Finished</option>
                                <option value="Canceled" <?= 'Canceled' == $rastreio->statusRastreio ? 'selected = selected' : '' ?>>Canceled</option>
                            <?php
                            } else {
                                echo "<option hidden value='Open' selected=''>Open</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="d-flex justify-content-center p-2">

                        <input type="submit" onclick="validaRastreio()" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Register Tracking" ? 'Register' : 'Edit') ?>">

                    </div>
            </div>

            </form>

        </div>
        <?php
        if (isset($_GET['rProtese'])) {
        ?>
            <div class="col-4 mt-2">

                <div class="rounded-3" style=" background-color: black; opacity: 80%; text-align: left; line-height: 3 ; padding-left: 10px;  ">
                    <h4 class="text-white">Selected patient data</h4>
                    <label style="color: orange">
                        <?php
                        if ($innerTratamento != null) {
                            echo 'Medical Record: <b>' . $innerTratamento->prontuario . ' </b> || Patient: <b>' . $innerTratamento->nomePaciente .
                                '</b><br>Appointment: <b>' . $innerTratamento->idConsulta . '</b> || Date: <b>' . date('m-d-Y', strtotime($innerTratamento->dataConsulta)) .
                                '</b><br>Dentist: <b>' . $innerTratamento->nomeDentista . '</b> || Clinic: <b>' . $innerTratamento->nomeClinica . '<hr>' .
                                '</b>Denture ID: <b>' . $innerTratamento->idProtese . '</b> || Denture Option: <b>' . $innerTratamento->tipo .
                                '</b><br>Position: <b>' . $innerTratamento->posicao . '</b> <br> Registration Date: <b>' . date('m-d-Y', strtotime($innerTratamento->dataRegistro));
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