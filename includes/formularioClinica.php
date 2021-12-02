<div class="container-fluid">
    <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
        <div class="border border-white rounded p-2">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <form class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" class="form-control" name="idClinica" readonly placeholder="Número" value=" <?= $clinica->idClinica ?>">
                    </div>

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nomeClinica" required="" value="<?= $clinica->nomeClinica ?>">
                    </div>

                    <div class="form-group">
                        <label>Status: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="ativo" checked="">
                            <label class="form-check-label" for="exampleRadios1">
                                Ativo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="inativo" <?= $clinica->statusClinica == 'inativo' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleRadios2">
                                Inativo
                            </label>
                        </div>
                        <div class="d-flex justify-content-center p-2">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Clinica" ? 'Cadastrar' : 'Editar') ?>">

                        </div>
                    </div>

            </form>

        </div>
    </div>
</div>