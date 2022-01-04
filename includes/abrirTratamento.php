<div class="container-fluid ">
    <section>
        <a href="Consulta.php?id=<?= $_GET['idConsulta'] ?>" .>
            <button class="btn btn-success mt-4">Return</button>
        </a>

    </section>
    <div class="d-flex justify-content-center mt-5">
        <div class="col-6">
            <div class="text-white  bg-gradient border border-primary p-5 rounded-3" style="background-color:black;border-width: 10px;">
                <div>
                    <h3 style="text-align: center;"><?= TITLE ?>'s treatment</h3>
                </div>

                <div class="row border p-3 d-flex justify-content-center">
                    <div class="col-8 border border-success text-center">
                        <div class="form-group">
                            <label><strong class="text-info">Patient:</strong> <?= $paciente->nomePaciente ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Performed in</strong> : <?= date('m-d-Y', strtotime($tratamento->dataConsulta)) ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Appointment's time:</strong> <?= date('H:i', strtotime($tratamento->horaConsulta)) ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Procedure perfomed:</strong> <?= $tratamento->nomeProcedimento ?></label>
                        </div>
                    </div>

                    <label class="mt-3 text-info" for="relatorio"><strong>Pre-appointment observations:</strong></label>
                    <textarea readonly name="relatorio" style=" background-color: black;opacity:80%;resize:none" class="text-white" rows="3"><?= $tratamento->observacao ?></textarea>
                    <div class="row d-flex justify-content-center text-center mt-3">       
                            <a class="btn btn-success" href="Consulta.php?id=<?= $_GET['idConsulta'] ?>">OK</a>
                    </div>

                </div>

            </div>
        </div>

    </div>