<input hidden id = "identificacao" value = "<?=IDENTIFICACAO?>"></input>
<div class="container-fluid p-4">


    <section>
        <a href="<?= (TITLE == 'Cadastrar Nova Consulta' ? 'index.php' : 'pesquisarConsulta.php') ?>">
            <button class="btn btn-success">Return</button>
        </a>
    </section>
    <br>
    <main>
        <div class = "d-flex justify-content-center">
            <div class="col-8 text-white  bg-gradient border border-primary p-5 rounded-3" style="background-color:black;border-width: 10px;">
                <div>
                    <h3 style="text-align: center;"><?= TITLE ?></h3>
                </div>
                <div class="row border p-3">
                    <div class="col-4 offset-1 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Patient's name:</strong> <?= $ConsultaInnerJoin->nomePaciente ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Appointment's date</strong> : <?= date('m-d-Y', strtotime($ConsultaInnerJoin->dataConsulta)) ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Hour:</strong> <?= date('H:i', strtotime($ConsultaInnerJoin->horaConsulta)) ?></label>
                        </div>
                    </div>
                    <div class="col-4 offset-2 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Dentist: </strong><?= $ConsultaInnerJoin->nomeDentista ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Clinic:</strong> <?= $ConsultaInnerJoin->nomeClinica ?></label>

                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Status: </strong><?= $ConsultaInnerJoin->statusConsulta ?></label>
                        </div>
                    </div>
                    <label class="mt-3 text-info" for="relatorio"><strong>Pre-appointment observations:</strong></label>
                    <textarea readonly name="relatorio" style=" background-color: black;opacity:80%;resize:none" class="text-white" rows="3"><?= $ConsultaInnerJoin->relatorio ?></textarea>
                </div>
                <form <?= $visibilidadiv ?> method="post" class="mt-4">
                    <div class="col-10 offset-1 form-group p-4">
                        <label for="procedimento[]">Proceedings</label>
                        <select name="procedimento[]" class="selectpicker form-control" multiple="multiple" data-live-search="true" data-size=5>
                            
                            <?php
                            foreach ($objProcedimento as $procedimento) {
                                echo '<option value = ' . $procedimento->idProcedimento . '>' . $procedimento->nomeProcedimento . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="checkbox" name = "finalizarConsulta" class="btn-check" id="btn-check-2-outlined" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-2-outlined">End Appointment ?</label><br>
                    </div>
                    <div class="row">
                        <label class="mt-3 text-info" for="relatorio"><strong>Post-Appointment observations:</strong></label>
                        <textarea name="observacoes" style="opacity:80%;resize:none" class="text-black" rows="5"></textarea>
                    </div>
                    <div class="row py-3">
                        <div class="text-center">
                            <input type="submit" class="btn btn-success btn-large" style="width:25%" name="Finalizar" value="Register"></input>
                        </div>

                    </div>
                </form>
                <?php
                if ($visibilidadiv != '') {
                    echo "<table class=\"table bg-light text-center table-hover col-6 bg-gradient mt-3\">
                    <thead class=\"bg-dark text-light\">
                        <tr>
                            <th>Procedures Performed in this Consultation</th>
                
                        </tr>
                
                    </thead>
                    <tbody>
                         $resultados 
                
                    </tbody>
                
                </table>";
                }
                ?>
            </div>
        </div>
    </main>
</div>
<?=$alerta;?>