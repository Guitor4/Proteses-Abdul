<div class="container-fluid" style=" height:793px;background-repeat: no-repeat; background-size: 100%">
    <main>
    <section class="d-flex justify-content-center mt-2">
      <div class="col-4">
        <div class="bg-dark rounded p-2">
          <h5 style="color: white; text-align: center ">Buscar Prontuário</h5>
          <form method="post" action="">
            <div class="col-10 form-group p-2" style="margin:auto">

              <input type="text" class="form-control p-1" name="busca" id="busca" required="" value="<?= $busca ?>">
            </div>
            <input type="submit" name="pesquisarPron" class="btn btn-secondary btInput p- d-flex " style="margin:auto" value="Pesquisar">

          </form>

        </div>
        <div class="d-flex justify-content-center">
          <div class="col-6 p-2">
            <a href="listaConsultaR.php"> <input type="submit" value="Limpar Pesquisa" class="btn btn-danger w-100" /> </a>
          </div>
        </div>
      </div>

    </section>


        <section>
          
                
            <table class="table bg-light bg-gradient mt-3">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Prontuário</th>
                        <th>Paciente</th>
                        <th>Consulta</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>status</th>
                        <th>Dentista</th>
                        <th>Clínica</th>
                        <th>Procedimento</th>

                        <th></th>


                    </tr>

                </thead>
                <tbody>
                    <?= $resultados ?>

                </tbody>

            </table>



        </section>
    </main>
</div>