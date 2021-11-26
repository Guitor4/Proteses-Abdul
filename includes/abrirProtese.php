<div class="container-fluid ">
    <section>
        <a href="pesquisarProtese.php?pagina=1" .>
            <button class="btn btn-success mt-4">Retornar</button>
        </a>

    </section>
    <div class="d-flex justify-content-center mt-5">
        <div class="col-8">
            <div class="text-white  bg-gradient border border-primary p-5 rounded-3" style="background-color:black;border-width: 10px;">
                <div>
                    <h3 style="text-align: center;">Prótese de <?= TITLE ?></h3>
                </div>

                <div class="row border p-3">

                    <div class="col-5 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Nome do paciente:</strong> <?= $objProtese->nomePaciente ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Data da Consulta</strong> : <?= date('d/m/Y á\s H:i', strtotime($objProtese->dataRegistro)) ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Tipo:</strong> <?= $objProtese->tipo ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Posicao:</strong> <?= $objProtese->posicao ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Marca do Dente:</strong> <?= $objProtese->marcaDente ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Extensão:</strong> <?= $objProtese->extensao ?></label>
                        </div>
                    </div>
                    <div class="col-5 offset-2 border border-success">
                        <div class="form-group">
                            <label><strong class="text-info">Quantidade de dentes: </strong><?= $objProtese->qtdDente ?></label>
                        </div>
                        <div class="form-group">

                            <label><strong class="text-info">Status:</strong> <?= $objProtese->status ?></label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:<?= $progresso ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $progresso ?></div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Telefone do Paciente: </strong><?= $objProtese->telefone ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong class="text-info">Email do Paciente: </strong><?= $objProtese->email ?></label>
                        </div>
                    </div>
                    <label class="mt-3 text-info" for="relatorio"><strong>Observações pré-Consulta:</strong></label>
                    <textarea readonly name="relatorio" style=" background-color: black;opacity:80%;resize:none" class="text-white" rows="3">Relatório da prótese: <?= $objProtese->observacao . "\n Observações do tratamento: " . $objProtese->relatorio ?></textarea>
                    <div class="row d-flex justify-content-center text-center mt-3">
                        <a class="btn btn-success" href="pesquisarProtese.php">OK</a>
                    </div>

                </div>

            </div>
        </div>

    </div>