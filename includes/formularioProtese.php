<div class="container-fluid">
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
                <h3 style="text-align: center; color: white"><?= TITLE . (isset($_GET['number']) ? ' ' . $_GET['number'] : '') ?></h3>
                <div id="alerta" class="bg-danger text-white text-center" role="alert" style="display:none;max-height:30px">
                </div>
                <form name="formProtese" method="post" style="color: white">
                    <div class="d-flex">
                        <div class="col-6 p-2">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Denture Options</label>
                                    <select class="form-control" name="tipo" value="">
                                        <option value="" hidden="">[Select]</option>
                                        <option <?= ($objProtese->tipo == "Fixa" ? print('selected = "selected"') : '') ?>>Denture</option>
                                        <option <?= ($objProtese->tipo == "Removível" ? print('selected = "selected"') : '') ?>>Implant</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 ">
                                    <label>Extension</label>
                                    <select class="form-control" name="extensao" onchange="extension(this.value)">
                                        <option value="" hidden="">[Select]</option>
                                        <option <?= ($objProtese->extensao == "Total" ? print('selected = "selected"') : '') ?>>Full</option>
                                        <option <?= ($objProtese->extensao == "Parcial" ? print('selected = "selected"') : '') ?>>Partial</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="posicao">
                                    <option value="" hidden="">[Select]</option>
                                    <option <?= ($objProtese->posicao == "Superior" ? print('selected = "selected"') : '') ?>>Upper</option>
                                    <option <?= ($objProtese->posicao == "Inferior" ? print('selected = "selected"') : '') ?>>Lower</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tooth Brand</label>
                                <select class="selectpicker form-control" data-live-search="true" data-size=5 name="marca">
                                    <option value="" hidden> [Select]</option>
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
                                <label>Number of Teeths</label>
                                <input type="number" class="form-control" name="qtdDentes" id="qtdDentes" value="<?= $objProtese->qtdDente ?>">
                            </div>


                            <div class="form-group">
                                <div class="d-flex justify-content-evenly">
                                    <div class="col-6 mt-4">
                                        <input class="form-check-input" onchange="habilitar()" type="checkbox" id="denteOuro" name="ouroDente" <?= (($objProtese->ouro) == "sim" ? 'checked = checked' : '') ?>>
                                        <label class="form-check-label" for="defaultCheck1">
                                            Has golden Teeths
                                        </label>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <input name="qtdOuro" id="qtdOuro" min="0" type="number" <?= ($objProtese->ouro == 'sim' ? '' : 'disabled = disabled') ?> value="<?= ($objProtese->qtdOuro != '0' ? $objProtese->qtdOuro : '') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2" <?= (TITLE != 'Cadastrar Prótese' ? 'hidden = hidden' : '') ?>>
                                <label>Patient</label>
                                <select <?= (isset($_GET['prontuario']) ? 'readonly' : '') ?> class="form-control" name="paciente">
                                    <option hidden>-----Select the patient------</option>
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
                            <div class="form-group mt-2" <?= (TITLE == 'Editar Protese' ? '' : 'hidden=hidden') ?>>
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option <?= ($objProtese->status == 'Cadastrada' ? ' selected = selected' : '') ?>>Registered</option>
                                    <option <?= ($objProtese->status == 'Em produção' ? ' selected = selected' : '') ?>>In production</option>
                                    <option <?= ($objProtese->status == 'Com terceiros' ? ' selected = selected' : '') ?>>In third-party treatment</option>
                                    <option <?= ($objProtese->status == 'Entregue' ? ' selected = selected' : '') ?>>Delivered</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <label>Observations</label>
                    <textarea name="observacao" class="form-control" placeholder="Teeth especifications, comments, etc..." rows="3"><?= $objProtese->observacao ?></textarea>
                    <div class="d-flex justify-content-center p-2">

                        <input type="button" onclick="validaProtese()" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" style="width:20%" value="<?= (TITLE == "Register Denture" ? 'Register' : 'Edit') ?>">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>