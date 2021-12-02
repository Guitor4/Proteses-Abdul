<div class="container-fluid" style="background-image: url(./includes/img/bg.jpg); height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>

        <section>
            <a href="pesquisarProtese.php">
                <button class="btn btn-success mt-4">Retornar</button>
            </a>

        </section>



    </main>
    <div class="col-8 offset-2">

        <div class="p-3 bg-dark" style="border-radius:25px">
            <div class="border border-white rounded p-3">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form method="post" style="color: white">
                    <div class="d-flex">
                        <div class="col-6 p-2">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Tipo da prótese</label>
                                    <select class="form-control" name="tipo" value="">
                                        <option hidden="">[SELECIONE]</option>
                                        <option <?= ($objProtese->tipo == "Fixa" ? print('selected = "selected"') : '') ?>>Fixa</option>
                                        <option <?= ($objProtese->tipo == "Removível" ? print('selected = "selected"') : '') ?>>Removível</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 ">
                                    <label>Extensão</label>
                                    <select class="form-control" name="extensao">
                                        <option hidden="">[SELECIONE]</option>
                                        <option <?= ($objProtese->extensao == "Total" ? print('selected = "selected"') : '') ?>>Total</option>
                                        <option <?= ($objProtese->extensao == "Parcial" ? print('selected = "selected"') : '') ?>>Parcial</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Posição</label>
                                <select class="form-control" name="posicao">
                                    <option hidden="">[SELECIONE]</option>
                                    <option <?= ($objProtese->posicao == "Superior" ? print('selected = "selected"') : '') ?>>Superior</option>
                                    <option <?= ($objProtese->posicao == "Inferior" ? print('selected = "selected"') : '') ?>>Inferior</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Marca do dente</label>
                                <select class="form-control" name="marca">
                                    <?php
                                    foreach ($marcas as $m) {
                                        echo "<option>" . $m->nomeMarca . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 p-2">
                            <div class="form-group">
                                <label>Quantidade de dentes</label>
                                <input type="number" class="form-control" name="qtdDentes" value="<?= $objProtese->qtdDente ?>">
                            </div>


                            <div class="form-group">
                                <div class="d-flex justify-content-evenly">
                                    <div class="col-6 mt-4">
                                        <input class="form-check-input" onchange="habilitar()" type="checkbox" id="denteOuro" name="ouroDente" <?= (($objProtese->ouro) == "sim" ? 'checked = checked' : '') ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                            Dente de ouro?
                                        </label>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <input name="qtdOuro" id="qtdOuro" type="number" <?= ($objProtese->ouro == 'sim' ? '' : 'disabled = disabled') ?> value="<?= ($objProtese->qtdOuro != '0' ? $objProtese->qtdOuro : '') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2" <?= (TITLE != 'Cadastrar Protese' ? 'hidden = hidden' : '') ?>>
                                <label>Paciente</label>
                                <select <?= (isset($_GET['prontuario']) ? 'readonly' : '') ?> class="form-control" name="paciente">
                                    <option hidden>-----Selecione o Paciente------</option>
                                    <?php
                                    if (isset($pacientes)) {
                                        if (gettype($pacientes) == 'object') {
                                            echo "<option selected value =" . $pacientes->prontuario . ">" . $pacientes->nomePaciente . "</option>";
                                        }
                                    } else {
                                        if (TITLE == 'Editar Protese') {
                                            echo "<option hidden selected = selected value =" . $objProtese->prontuario . ">" . $objProtese->nomePaciente . "</option>";
                                        }
                                    }

                                    ?>

                                </select>
                            </div>
                            <div class="form-group mt-2" <?= (TITLE == 'Editar Protese' ? '' : '') ?>>
                                <label>Status</label>
                                <select name = "status" class="form-control">
                                    <option <?=($objProtese->status == 'Cadastrada' ? ' selected = selected' : '')?>>Cadastrada</option>
                                    <option <?=($objProtese->status == 'Em produção' ? ' selected = selected' : '')?>>Em produção</option>
                                    <option <?=($objProtese->status == 'Com terceiros' ? ' selected = selected' : '')?>>Com terceiros</option>
                                    <option <?=($objProtese->status == 'Entregue' ? ' selected = selected' : '')?>>Entregue</option>
                                </select>
                            </div>
                        </div>
                    </div>
            

            <label>Observações</label>
            <textarea name="observacao" class="form-control" rows="3"><?= $objProtese->observacao ?></textarea>
            <div class="d-flex justify-content-center p-2">

                <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" style="width:20%" value="<?= (TITLE == "Cadastrar Prótese" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                                            ?>>

            </div>
            </form>
        </div>
    </div>
</div>
</div>