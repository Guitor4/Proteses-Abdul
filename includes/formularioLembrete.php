<div class="container-fluid">
    <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
        <div class="border border-white rounded p-2">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <form class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" required name="titulo" placeholder="Regar as plantas" value=" <?= $lembretes->titulo ?>">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="descricao" placeholder="Opcional"><?= $lembretes->descricao ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Reminder's date</label>
                        <input class="form-control" required placeholder="YYYY- MM - DD" onkeypress="mascara(this, '####-##-##')" type="text" id="datepicker" name="dataLembrete" value="<?= $lembretes->dataLembrete ?>">
                    </div>
                    <div class="d-flex justify-content-center p-2">

                        <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Register Reminder" ? 'Register' : 'Edit') ?>">

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>