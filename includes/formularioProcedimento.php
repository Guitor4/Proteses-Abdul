<div class="container-fluid">
    <main>

        <section>
            <a href="index.php">
                <button class="btn btn-success mt-4">Menu</button>
            </a>

        </section>
    </main>

    <div class="col-4 mt-4 offset-4">
        <div class="p-3 bg-dark" style="border-radius:25px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form class="d-flex justify-content-center" method="post" style="color: white">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" required name="nomeProcedimento" placeholder="Procedimento" value="<?= $objProcedimento->nomeProcedimento ?>">
                        </div>
                        <label>Status: </label>
                        <div class="form-group">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statusProcedimento" value="Active" checked="">
                                <label class="form-check-label">
                                    Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statusProcedimento" value="Inactive" <?= $objProcedimento->statusProcedimento == 'Inactive' ? 'checked' : '' ?>>
                                <label class="form-check-label">
                                    Inactive
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center p-2">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Register Proceeding" ? 'Register' : 'Edit') ?>">

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>