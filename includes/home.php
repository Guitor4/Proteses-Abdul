<div class="container-fluid">
    <div class="container-fluid" style = "margin-top:2vh">
        <div class="row">
            <div class="col-6 mt-3">

                <div class="d-flex flex-wrap">
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a style="text-decoration:none" href="pesquisarProtese.php">
                                <img name="Dentadura" class="img-fluid " title="Lista de Próteses" style="border-radius:25%;" src="./includes/img/proteses.png" width="200px" height="200px">
                            </a>
                        </fieldset>
                    </div>


                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaPaciente.php?pagina=1">
                                <img name="Paciente" class="img-fluid" title="Lista de Pacientes" style="border-radius:25%;" src="./includes/img/pessoa.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>


                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaFuncionario.php?pagina=1">
                                <img name="Funcionario" class="img-fluid" title="Lista de Funcionários" style="border-radius:25%;" src="./includes/img/funcionario.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>



                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a style="text-decoration:none" href="pesquisarConsulta.php?pagina=1">
                                <img name="Dentadura" class="img-fluid " title="Lista de Consultas" style="border-radius:25%;" src="./includes/img/consultas.png" width="200px" height="200px">
                            </a>
                        </fieldset>
                    </div>


                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaProcedimento.php?pagina=1">
                                <img name="Procedimentos" class="img-fluid" title="Lista de Procedimentos" style="border-radius:25%;" src="./includes/img/procedimentos.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaLembrete.php?pagina=1">
                                <img name="Paciente" class="img-fluid" title="Lista de Lembretes" style="border-radius:25%;" src="./includes/img/lembretes.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="listaMarcaDente.php">
                                <img name="Paciente" class="img-fluid" title="Testes" style="border-radius:25%;" src="./includes/img/marcaDente.png" width="200px" height="200px">

                            </a>
                        </fieldset>
                    </div>
                    <div style="flex: 0 0 33.333333%">
                        <fieldset>
                            <a href="agendamento.php">
                                <img name="Paciente" class="img-fluid" title="Agenda de Consultas" style="border-radius:25%;" src="./includes/img/agenda.png" width="200px" height="200px">

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
                
                <div class="d-flex justify-content-start bg-dark text-white">
                <h4 class="text-center text-white bg-dark p-1">Filtros: </h4>
                    <div class = "p-2">
                        <label for="Filtro1">Consultas</label>
                        <input name="Filtro1" onchange="preencherListaHome(1)" checked type="radio" value="Teste"></input>
                    </div>
                    <div class = "p-2">
                        <label for="Filtro1">Lembretes</label>
                        <input name="Filtro1" onchange="preencherListaHome(2)" type="radio" value="Teste"></input>
                    </div>
                    <div class = "p-2">
                        <label for="Filtro1">Ambos</label>
                        <input name="Filtro1" onchange="preencherListaHome(3)" type="radio" value="Teste"></input>
                    </div>
                </div>
                <div id="to_do_list" class="list-group overflow-auto rounded p-2 bg-light" style="min-height:500px;max-height:500px;">


<!--                   <a href="#" class="list-group-item list-group-item-action " aria-current="true">
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
                    </a> --> 

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