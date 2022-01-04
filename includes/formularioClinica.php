<div class="container-fluid">
    <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
        <div class="border border-white rounded p-2">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <form class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" onblur = "validaNome(this)" class="form-control" name="nomeClinica" required="" value="<?= $clinica->nomeClinica ?>">
                    </div>

                    <div class="form-group">
                        <label>Status: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="Active" checked="">
                            <label class="form-check-label" for="exampleRadios1">
                                Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="Inactive" <?= $clinica->statusClinica == 'Inactive' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleRadios2">
                                Inactive
                            </label>
                        </div>
                        <div class="d-flex justify-content-center p-2">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Register Clinic" ? 'Register' : 'Edit') ?>">

                        </div>
                    </div>

            </form>

        </div>
    </div>
</div>