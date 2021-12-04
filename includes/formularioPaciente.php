 <div class="container-fluid">
     <div class="col-4 mt-4 offset-4 p-3 bg-dark " style="border-radius:25px 30px 25px 30px">
         <div class="border border-white rounded p-2">
             <h3 style="text-align: center; color: white"><?= TITLE ?></h3>
             <form class="p-2" method="post" style="color: white">

                 <div class="form-group">
                     <label>Nome</label>
                     <input type="text" class="form-control" name="nomePaciente" required="" value="<?= $paciente->nomePaciente ?>">
                 </div>

                 <div class="form-group">
                     <label>Sexo: </label>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="masculino" checked="">
                         <label class="form-check-label" for="exampleRadios1">
                             Masculino
                         </label>
                     </div>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="feminino" <?= $paciente->sexo == 'feminino' ? 'checked' : '' ?>>
                         <label class="form-check-label" for="exampleRadios2">
                             Feminino
                         </label>
                     </div>
                 </div>

                 <div class="form-group">
                     <label>Telefone</label>
                     <input type="tel" class="form-control" name="tel" value="<?= $paciente->telefone ?>" onkeypress="mascara(this, '##-####-####')" maxlength="12">
                 </div>

                 <div class="form-group">
                     <label>E-mail</label>
                     <input type="email" class="form-control" name="email" value="<?= $paciente->email ?>">
                 </div>
                 <br>
                 <div class="d-flex justify-content-center p-2">

                     <input type="submit" name="<?= BTN ?>" class="  btn btn-lg btn-success btInput" value="<?= (TITLE == "Cadastrar Paciente" ? 'Cadastrar' : 'Editar') ?>" <?php //if ($btEnviar == TRUE) echo "disabled";
                                                                                                                                                                            ?>>

                 </div>
         </div>

         </form>

     </div>
 </div>

 </div>
