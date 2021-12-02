<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>

        <section>
            <a href="index.php">
                <button class="btn btn-success mt-4">Menu</button>
            </a>

        </section>

    </main>
    <div class="col-6 mt-2 offset-3">
        <div class="p-3 bg-dark" style="border-radius:25px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form class="d-flex justify-content-center" method="post" style="color: white">
                    <div class="col-11">
                        <div class="form-group">
                            <label>Nome: </label>
                            <input type="text" class="form-control" name="nomeTerceiro" placeholder="Terceiro " required="" value="<?= $objTerceiro->nomeTerceiro ?>">
                        </div>

                        <div class="form-group">
                            <label>Celular:</label>
                            <input type="tel" class="form-control" name="telefone" placeholder="+55(DD)00000-0000" required="" value="<?= $objTerceiro->telefone ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label>Status do Funcionário: </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" name="statusTerceiro" id="success-outlined" autocomplete="off" <?= $objTerceiro->statusTerceiro == 'Inativo' ? '' : 'checked' ?>>
                                <label class="btn btn-outline-success" for="success-outlined">Ativo</label>


                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" name="statusTerceiro" id="danger-outlined" autocomplete="off" <?= $objTerceiro->statusTerceiro == 'Inativo' ? 'checked' : '' ?>>
                                <label class="btn btn-outline-danger" for="danger-outlined">Inativo</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center p-4">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Terceiro" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                                        ?>>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>