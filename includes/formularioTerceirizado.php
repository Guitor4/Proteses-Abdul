<div class="container-fluid">
    <main>
        <a href="index.php">
            <button class="btn btn-success mt-4">Menu</button>
        </a>

    </main>

    <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
        <div class="border border-white rounded p-2">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <div id = "alerta" class="bg-danger text-white text-center" role="alert" style = "display:none;max-height:30px">
                    </div>
            <form name = "formTerceirizado" class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">
                    <div class="form-group">
                        <label> Terceiro: </label>
                        <select onchange="getServicoTerceiro2(this.value)" <?= (TITLE == 'Cadastrar Terceirizado' ? '' : 'disabled') ?> class="selectpicker form-control" data-live-search="true" data-size=5 name="Terceiro" value="">
                            <option hidden selected value=''>[---SELECIONE---]</option>

                            <?php
                            echo $selectTerceiro

                            ?>

                        </select>
                        <?php (TITLE == 'Cadastrar Terceirizado' ? '' : print('<select name = "terceiro2" hidden >' . $selectTerceiro . '</select>')) ?>
                    </div>
                    <div class="form-group">
                        <label> Serviço Terceiro: </label>
                        <select <?= (TITLE == 'Cadastrar Terceirizado' ? '' : 'disabled') ?> class="selectpicker form-control" data-live-search="true" data-size=5 name="ServicoTerceiro" id = "servico_terceiro" value="">
                            <option selected hidden value=''>[---SELECIONE---]</option>

                            <?php
                            echo $selectServico;
                            ?>

                        </select>
                        <?php (TITLE == 'Cadastrar Terceirizado' ? '' : print('<select name = "servico2" hidden > ' . $selectServico . '</select>')) ?>
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
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="inativo" <?= $terceirizado->statusTerceirizado == 'inativo' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleRadios2">
                                Inativo
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center p-2">

                        <input type="button" onclick="validaTerceirizado()" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Terceirizado" ? 'Cadastrar' : 'Editar') ?>">

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>