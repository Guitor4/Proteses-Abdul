<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </main>

    <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
        <div class="border border-white rounded p-2">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <form class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">
                    <div class="form-group">
                        <label> Terceiro: </label>
                        <select class="form-control" name="Terceiro" value="">
                            <option selected="selected">[---SELECIONE---]</option>

                            <?php
                            foreach ($objTerceiro as  $terceiro) {

                                echo "<option value =" .  $terceiro->idTerceiro . ">" . $terceiro->nomeTerceiro . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label> Serviço Terceiro: </label>
                        <select class="form-control" name="ServicoTerceiro" value="">
                            <option>[---SELECIONE---]</option>

                            <?php
                            foreach ($objServicoTerceiro as  $ServicoTerceiro) {

                                echo "<option value =" .  $ServicoTerceiro->idServico . ">" . $ServicoTerceiro->nomeServico . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="d-flex justify-content-center p-2">

                        <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Dentista" ? 'Cadastrar' : 'Editar') ?>">

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>