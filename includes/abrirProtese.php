<div class="container-fluid ">
    <section>
        <a href="<?=(isset($_GET['term']) ? 'listaConsultaR.php?pagina=1': 'pesquisarProtese.php?pagina=1')?>" .>
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <div class="d-flex justify-content-center mt-5">
        <div class="col-8">
            <div class="text-white  bg-gradient border border-primary p-5 rounded-3" style="background-color:black;border-width: 10px;">
                <div>
                    <h3 style="text-align: center;"><?= TITLE ?>'s Denture</h3>
                </div>

                <div class="row border p-3">

                    <div class="col-5 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Patient's Name:</strong> <?= $objProtese->nomePaciente ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Date of the Appointment</strong> : <?= date('m-d-Y \a\t H:i', strtotime($objProtese->dataRegistro)) ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Denture Option:</strong> <?= $objProtese->tipo ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Position:</strong> <?= $objProtese->posicao ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Tooth Brand:</strong> <?= $objProtese->marcaDente ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Extension:</strong> <?= $objProtese->extensao ?></label>
                        </div>
                    </div>
                    <div class="col-5 offset-2 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Number of Teeths: </strong><?= $objProtese->qtdDente ?></label>
                        </div>
                        <div class="form-group">

                            <label><strong class="text-info">Status:</strong> <?= $objProtese->status ?></label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:<?= $progresso ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $progresso ?></div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Phone for contact: </strong><?= $objProtese->telefone ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Patient's Email: </strong><?= $objProtese->email ?></label>
                        </div>
                    </div>
                    <label class="mt-3 text-info" for="relatorio"><strong>Pré-appointment Observations:</strong></label>
                    <textarea readonly name="relatorio" style=" background-color: black;opacity:80%;resize:none" class="text-white" rows="3">Relatório da prótese: <?= $objProtese->observacao . "\n Observações do tratamento: " . $objProtese->relatorio ?></textarea>
                    <div class="row d-flex justify-content-center text-center mt-3">
                        <a class="btn btn-success" href="<?=$term?>">OK</a>
                    </div>

                </div>

            </div>
        </div>

    </div>