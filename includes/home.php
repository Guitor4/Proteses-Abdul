<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mt-3">

                <div class="d-flex flex-wrap">
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a style="text-decoration:none" href="pesquisarProtese.php">
                                <img name="Dentadura" class="img-fluid " title="Lista de Próteses" style="border-radius:25%;" src="./includes/img/novaProtese3.png" width="200px" height="200px">
                            </a>
                        </fieldset>
                    </div>


                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaPaciente.php?pagina=1">
                                <img name="Paciente" class="img-fluid" title="Lista de Pacientes" style="border-radius:25%;" src="./includes/img/pessoa2.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>


                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaFuncionario.php?pagina=1">
                                <img name="Funcionario" class="img-fluid" title="Lista de Funcionários" style="border-radius:25%;" src="./includes/img/abc.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>



                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a style="text-decoration:none" href="pesquisarConsulta.php?pagina=1">
                                <img name="Dentadura" class="img-fluid " title="Lista de Consultas" style="border-radius:25%;" src="./includes/img/Consulta2.png" width="200px" height="200px">
                            </a>
                        </fieldset>
                    </div>


                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaProcedimento.php?pagina=1">
                                <img name="Paciente" class="img-fluid" title="Lista de Procedimentos" style="border-radius:25%;" src="./includes/img/Servicos.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaLembretes.php?pagina=1">
                                <img name="Paciente" class="img-fluid" title="Lista de Lembretes" style="border-radius:25%;" src="./includes/img/Servicos.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="testes.php">
                                <img name="Paciente" class="img-fluid" title="Testes" style="border-radius:25%;" src="./includes/img/Servicos.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="agendamento.php">
                                <img name="Paciente" class="img-fluid" title="Agenda de Consultas" style="border-radius:25%;" src="./includes/img/agenda2.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>


                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaRastreio.php?pagina=1">
                                <img name="Funcionario" class="img-fluid" title="Lista de Rastreios" style="border-radius:25%;" src="./includes/img/rastreio.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>
                </div>
            </div>


            <!--                 <div class="col-1"></div> -->

            <div class="col-6 mt-2 p-2 bg-dark">
                <h4 class="text-center text-white bg-dark">To-do-List</h4>
                <div class="d-flex justify-content-center bg-dark text-white">
                    <div class = "p-1">
                        <label for="Filtro1">Filtro1</label>
                        <input name="Filtro1" onchange="alerta()" type="radio" value="Teste"></input>
                    </div>
                    <div class = "p-1">
                        <label for="Filtro1">Filtro2</label>
                        <input name="Filtro1" onchange="alerta()" type="radio" value="Teste"></input>
                    </div>
                    <div class = "p-1">
                        <label for="Filtro1">Filtro3</label>
                        <input name="Filtro1" onchange="alerta()" type="radio" value="Teste"></input>
                    </div>
                </div>
                <div id="to_do_list" class="list-group overflow-auto rounded p-2 bg-light" style="min-height:500px;max-height:500px;">


                  <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5>
                            <small>Today</small>
                        </div>
                        <p class="mb-1">Caso ainda não tenha feito, alimente o banco </p>
                        <small>Em caso de erro gritar é contra indicado.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5>
                            <small>Today</small>
                        </div>
                        <p class="mb-1">Caso ainda não tenha feito, alimente o banco </p>
                        <small>Em caso de erro gritar é contra indicado.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5>
                            <small>Today</small>
                        </div>
                        <p class="mb-1">Caso ainda não tenha feito, alimente o banco </p>
                        <small>Em caso de erro gritar é contra indicado.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5>
                            <small>Today</small>
                        </div>
                        <p class="mb-1">Caso ainda não tenha feito, alimente o banco </p>
                        <small>Em caso de erro gritar é contra indicado.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5>
                            <small>Today</small>
                        </div>
                        <p class="mb-1">Caso ainda não tenha feito, alimente o banco </p>
                        <small>Em caso de erro gritar é contra indicado.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5>
                            <small>Today</small>
                        </div>
                        <p class="mb-1">Caso ainda não tenha feito, alimente o banco </p>
                        <small>Em caso de erro gritar é contra indicado.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5>
                            <small>Today</small>
                        </div>
                        <p class="mb-1">Caso ainda não tenha feito, alimente o banco </p>
                        <small>Em caso de erro gritar é contra indicado.</small>
                    </a> 

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function alerta() {
        alert('oi');
    }
</script>

<script src="js/JQuery2.min.js"></script>
<script>
    $( document ).ready(function() {
    preencherListaHome();
});
</script>