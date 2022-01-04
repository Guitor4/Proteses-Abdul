<div class="container-fluid">
    <main>

        <section>
            <a href="pesquisarConsulta.php">
                <button class="btn btn-success mt-4">Return</button>
            </a>

        </section>



    </main>
    <div class="col-8 offset-2">
        <div class="p-3 bg-dark" style="border-radius:25px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <div id = "alerta" class="bg-danger text-white text-center" role="alert" style = "display:none;max-height:30px">
                    </div>
                <form name="formConsulta" method="post" action = "" style="color: white">
                    <div class="d-flex">
                        <div class="form-group col-6 p-1">
                            <label>Patient attended</label>
                            <select id="paciente" name="paciente" required class="selectpicker form-control" data-live-search="true" data-size=5>
                                <option value=" " selected hidden="">[Select]</option>
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
                                <input type="text" hidden name="horarioAUX" id="horarioAUX" value="">
                                <label>Time</label>
                                <select readonly class="selectpicker form-control" name="horarios" id="horarios" data-live-search="true" data-size=5>
                                    <option value=" ">---[Select the date]---</option>
                                    <option <?= (TITLE != "Register Appointment" ? 'selected = selected' : '') ?> hidden="hidden"><?= $objConsulta->horaConsulta ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-6 p-1">
                            <label>Dentist</label>
                            <select name="dentista" class="selectpicker form-control" data-live-search="true" data-size=5>
                                <option value=" " hidden="">[Select]</option>
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
                                    <option value=" " hidden="">[Select]</option>
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
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Confirmed' ? print('selected = selected') : '') ?>>Confirmed</option>
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Canceled' ? print('selected = selected') : '') ?>>Canceled</option>
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'In progress' ? print('selected = selected') : '') ?>>In progress</option>
                                    <option <?= (TITLE == 'Cadastrar Nova Consulta' ? print('hidden = hidden') : '') ?> <?= ($objConsulta->statusConsulta == 'Finished' ? print('selected = selected') : '') ?>>Finished</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <label>Pré-Appointment Observations</label>
                    <textarea name="relatorio" class="form-control" rows="3"><?= (TITLE != 'Register Appointment'  ? $objConsulta->relatorio : '') ?></textarea>
                    <div class="d-flex justify-content-center p-2">

                        <input type="button" onclick="validaConsulta()" name="<?= BTN ?>" id="<?= BTN ?>"class="  btn btn-lg btn-success btInput" style="width:20%" value="<?= (TITLE == "Register Appointment" ? 'Register' : 'Edit') ?>">
                        

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $erro ?>
<script src="js/JQuery2.min.js"></script>
<?php
if (TITLE != "Cadastrar Nova Consulta") {
    echo "<script>
    $( document ).ready(function() {
        data = document.getElementById('datepicker');
        document.getElementById('horarios').value = getHorarios(data.value);
});
</script>";
}
?>