<div class="container-fluid">
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
                            <label>Name: </label>
                            <input type="text" class="form-control" name="nomeTerceiro" placeholder="Terceiro " required="" value="<?= $objTerceiro->nomeTerceiro ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="tel" class="form-control" name="telefone" minlength="9" required onblur="validaTelefone(this)" onkeypress="mascara(this, '##-####-####')" maxlength="12" placeholder="61994945153" required="" value="<?= $objTerceiro->telefone ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label>Status: </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" name="statusTerceiro" id="success-outlined" value = "Active" autocomplete="off" <?= $objTerceiro->statusTerceiro == 'Inactive' ? '' : 'checked' ?>>
                                <label class="btn btn-outline-success" for="success-outlined">Active</label>


                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" name="statusTerceiro" id="danger-outlined" value = "Inactive" autocomplete="off" <?= $objTerceiro->statusTerceiro == 'Inactive' ? 'checked' : '' ?>>
                                <label class="btn btn-outline-danger" for="danger-outlined">Inactive</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center p-4">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Register Provider" ? 'Register' : 'Edit') ?>">

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>