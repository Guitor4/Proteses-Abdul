<div class="container-fluid">


    <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
        <div class="border border-white rounded p-2">
            <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
            <form class="d-flex justify-content-center" method="post" style="color: white">
                <div class="col-8">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nomeMarca" required="" value="<?= $marca->nomeMarca ?>">
                    </div>
                    <div class="form-group">
                        <label for="relatorio">Descrição (opcional)</label>
                        <textarea name="descricao" style="opacity:80%;resize:none" class="text-black form-control" rows="5"></textarea>
                    </div>
                    <div class="d-flex justify-content-center p-2">

                        <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Marca de Dente" ? 'Cadastrar' : 'Editar') ?>">

                    </div>
                </div>

            </form>

        </div>
    </div>


</div>