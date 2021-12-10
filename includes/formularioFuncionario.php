<div class="container-fluid">
    <div class="col-6 mt-2 offset-3">
        <div class="p-3 bg-dark" style = "border-radius:25px">
            <div class="border border-white rounded p-2">
                <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
                <form class="d-flex justify-content-center" method="post" style="color: white">
                    <div class="col-11">
                        <div class="form-group">
                            <label>Nome: </label>
                            <input type="text" class="form-control" onblur = "validaNome(this)" name="nomeFuncionario" placeholder="Nome Completo" required="" value="<?= $objFuncionario->nomeFuncionario ?>">
                        </div>
                        <div class="form-group">
                            <label>Sexo: </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" value="Masculino" checked="">
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" value="feminino" <?= $objFuncionario->sexo == 'Feminino' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleRadios2">
                                    Feminino
                                </label>
                            </div>
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="email" class="form-control" name="email" placeholder="email@gmail.com" required="" value="<?= $objFuncionario->email ?>">
                            </div>
                            <div class="form-group">
                                <label>Telefone:</label>
                                <input type="tel" class="form-control" onblur="validaTelefone()" minlength="9" name="telefone" onkeypress="mascara(this, '##-#####-####')" maxlength="13" placeholder="61 9 91919191" required="" value="<?= $objFuncionario->telefone ?>">
                            </div>
                            <div class="form-group">
                                <label>Perfil: </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="perfil" id="" value="Funcionário" checked="">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Funcionário
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="perfil" value="Administrador" <?= $objFuncionario->perfil == 'Administrador' ? 'checked' : '' ?>>
                                    <label class="form-check-label">
                                        Administrador
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Login:</label>
                            <input type="tel" class="form-control" name="login" value="<?= $objFuncionario->login ?>" placeholder="Fulano" required="">
                        </div>
                        <div class="form-group">
                            <label>Senha:</label>
                            <input type="password" class="form-control" name="senha" style="padding-center: 45px;" value="<?= $objFuncionario->senha ?>" placeholder="oooooo" required="">

                        </div>
                        <div class="form-group mt-3">
                            <label>Status do Funcionário: </label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" name="status" value = "Ativo" id="success-outlined" autocomplete="off" <?= $objFuncionario->statusFuncionario == 'Inativo' ? '' : 'checked' ?>>
                                <label class="btn btn-outline-success" for="success-outlined">Ativo</label>


                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" value = "Inativo" name="status" id="danger-outlined" autocomplete="off" <?= $objFuncionario->statusFuncionario == 'Inativo' ? 'checked' : '' ?>>
                                <label class="btn btn-outline-danger" for="danger-outlined" value = >Inativo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Data de Contrato:</label>
                            <input type="date" class="form-control" required name="dtContrato" value="<?= $objFuncionario->dtContrato ?>">
                        </div>
                        <div class="d-flex justify-content-center p-2">

                            <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Funcionário" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                                            ?>>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>