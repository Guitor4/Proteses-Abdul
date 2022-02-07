<div class="container-fluid">
    <div class="col-6 mt-2 offset-3">
        <div class="p-3 bg-dark" style = "border-radius:25px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form class="d-flex justify-content-center" method="post" style="color: white">
                    <div class="col-11">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" onblur = "validaNome(this)" name="nomeFuncionario" placeholder="Nome Completo" required="" value="<?= $objFuncionario->nomeFuncionario ?>">
                        </div>
                        <div class="form-group">
                            <label>Gender: </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" value="Masculine" checked="">
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculine
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" value="Feminine" <?= $objFuncionario->sexo == 'Feminine' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleRadios2">
                                    Feminine
                                </label>
                            </div>
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="email" class="form-control" name="email" placeholder="email@gmail.com" required="" value="<?= $objFuncionario->email ?>">
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <input type="tel" class="form-control" onblur="validaTelefone()" minlength="9" name="telefone" onkeypress="mascara(this, '##-#####-####')" maxlength="13" placeholder="61 9 91919191" required="" value="<?= $objFuncionario->telefone ?>">
                            </div>
                            <div class="form-group">
                                <label>Profile: </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="perfil" id="" value="Employee" checked="">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Employee
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="perfil" value="Administrator" <?= $objFuncionario->perfil == 'Administrador' ? 'checked' : '' ?>>
                                    <label class="form-check-label">
                                        Administrator
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Login:</label>
                            <input type="tel" class="form-control" name="login" value="<?= $objFuncionario->login ?>" placeholder="Fulano" required="">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="senha" style="padding-center: 45px;" value="<?= $objFuncionario->senha ?>" placeholder="oooooo" required="">

                        </div>
                        <div class="form-group mt-3">
                            <label>Employee Status: </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" name="status" value = "Active" id="success-outlined" autocomplete="off" <?= $objFuncionario->statusFuncionario == 'Inactive' ? '' : 'checked' ?>>
                                <label class="btn btn-outline-success" for="success-outlined">Active</label>


                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" value = "Inactive" name="status" id="danger-outlined" autocomplete="off" <?= $objFuncionario->statusFuncionario == 'Inactive' ? 'checked' : '' ?>>
                                <label class="btn btn-outline-danger" for="danger-outlined" value = >Inactive</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center p-2">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Register Employee" ? 'Register' : 'Edit') ?>">

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>