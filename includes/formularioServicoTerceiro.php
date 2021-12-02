<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>

        <section>
            <a href="listaServicoTerceiro.php?pagina=1">
                <button class="btn btn-success mt-4">Menu</button>
            </a>

        </section>

    </main>

    <div class="col-4 mt-4 offset-4">
        <div class="p-3 bg-dark" style = "border-radius:25px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form class="d-flex justify-content-center" method="post" style="color: white">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Nome: </label>
                            <input type="text" class="form-control" name="nomeServico" placeholder="Serviço Terceiro " required="" value="<?= $objServicoTerceiro->nomeServico ?>">
                        </div>

                        <div class="form-group">
                            <label>Descrição:</label>
                            <input type="tel" class="form-control" name="descricao" placeholder="Relato sobre" required="" value="<?= $objServicoTerceiro->descricao ?>">
                        </div>
                        <label>Status do Serviço Terceiro: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusServicoTerceiro" value="Ativo" checked="">
                            <label class="form-check-label">
                                Ativo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusServicoTerceiro" value="Inativo" <?= $objServicoTerceiro->statusServicoTerceiro == 'Inativo' ? 'checked' : '' ?>>
                            <label class="form-check-label">
                                Inativo
                            </label>
                        </div>
                        <div class="d-flex justify-content-center p-2">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Serviço Terceiro" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                                                ?>>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>