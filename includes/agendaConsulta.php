<button><a href="index.php">Voltar</a></button>

<!-- Identificacao da Página -->
<input hidden id="identificacao" value="<?= IDENTIFICACAO ?>"></input>

<!-- Button trigger modal -->
<button type="button" hidden id="botaoModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="vertical-align: middle;">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
                <div class="p-3 bg-dark">
                    <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                    <div id="alerta" class="bg-danger text-white text-center" role="alert" style="display:none;max-height:30px"></div>
                    <form method="post" name="formConsulta" id="formularioConsulta" style="color: white">
                        <div class="d-flex">

                            <div class="form-group col-6 p-1">
                                <label>Patient</label>
                                <select name="paciente" class="selectpicker form-control" id="paciente" data-live-search="true" data-size=5>
                                    <option value = " " selected hidden="">[Select]</option>
                                    <?php

                                    foreach ($objPaciente as $paciente) {
                                        $selected = ($objConsulta->fkProntuario == $paciente->prontuario ? 'selected = selected' : '');
                                        echo "<option value = " . $paciente->prontuario . " " . $selected . ">" . $paciente->nomePaciente . "</option>";
                                    }
                                    ?>
                                </select>

                                <div class="form-group">
                                    <label>Appointment's date</label>
                                    <input class="form-control" placeholder="YYYY- MM - DD" onkeypress="mascara(this, '####-##-##')" onchange="getHorarios(this.value)" type="text" id="datepicker" name="data" value="<?= $objConsulta->dataConsulta ?>">
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <select class="selectpicker form-control" name="horarios" id="horarios" data-live-search="true" data-size=5>
                                        <option value = " " hidden="hidden">---[SELECIONE UMA DATA]---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-6 p-1">
                                <label>Dentist</label>
                                <select name="dentista" class="selectpicker form-control" data-live-search="true" data-size=5>
                                    <option value = " " hidden="">[Select]</option>
                                    <?php
                                    foreach ($objDentista as $dentista) {
                                        $selected = ($objConsulta->CFKDentista == $dentista->idDentista ? 'selected = selected' : '');
                                        echo "<option value =" . $dentista->idDentista . " " . $selected . ">" . $dentista->nomeDentista . "</option>";
                                    }
                                    ?>
                                </select>
                                <div class="form-group">
                                    <label>Clinic</label>
                                    <select name="clinica" class="selectpicker form-control" data-live-search="true" data-size=5>
                                        <option value = " " hidden="">[Select]</option>
                                        <?php
                                        foreach ($objClinica as $clinica) {
                                            $selected = ($objConsulta->CFKClinica == $clinica->idClinica ? 'selected = selected' : '');
                                            echo "<option value =" . $clinica->idClinica . " " . $selected . ">" . $clinica->nomeClinica . "</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option>Scheduled</option>
                                        <option <?= (TITLE == 'Register Appointment' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Confirmed' ? print('selected = selected') : '') ?>>Confirmed</option>
                                        <option <?= (TITLE == 'Register Appointment' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Canceled' ? print('selected = selected') : '') ?>>Canceled</option>
                                        <option <?= (TITLE == 'Register Appointment' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'In Progress' ? print('selected = selected') : '') ?>>In Progress</option>
                                        <option <?= (TITLE == 'Register Appointment' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Finished' ? print('selected = selected') : '') ?>>Finished</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <label>Pre-appointment observations</label>
                        <textarea name="relatorio" class="form-control" rows="3"><?= (TITLE != 'Register Appointment'  ? $objConsulta->relatorio : '') ?></textarea>
                        <div class="d-flex justify-content-center p-2">
                            <div>
                                <input type="button" onclick="validaConsulta()" name="botao" class="  btn btn-lg btn-success btInput" style="width:95%" value="<?= (TITLE == "Register Appointment" ? 'Register' : 'Edit') ?>">
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-lg" style="left:10px" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>



            <div class="modal-footer bg-dark">

            </div>
        </div>
    </div>
</div>



<div id="aviso" class="text-center"></div>
<div id="calendar" class="calendar"></div>
<?= $alerta ?>