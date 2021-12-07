

<div class="container-fluid mt-2 col-12">
    <div class="row">
        <div class="row-cols-auto">
            <div class=" bg-gradient rounded-3" style=" background-color: black;opacity:100%">
                <!-- <h3 style="color: white; text-align: center">PRONTUÁRIO</h3>-->

                <div class="row">

                    <div class="col-2 container-fluid mt-3">

                        <div class=" bg-gradient rounded-5 ms-4 p-2 container-fluid" style=" background-color: black; opacity:100%">
                            <h4 style="color: white; text-align: center">PRONTUÁRIO</h4>
                        </div>


                        <input  hidden="" value="<?= $paciente ?>" id="aux"> <!--input usado para pegar o prontuario.-->
                        <input  hidden="" value="<?= $paciente ?>" id="iclick"> <!--input usado para iniciar variavel de controle de clique-->
                        <!--<input  hidden="" value=" $iurl ?>" id="iUrl"> <!--input usado para mostrar imagem perfil-->
                        <!--<input  hidden="" value=" //$fotoCadastrada ?>" id="fotoCadastrada"> <!--input usado para mostrar imagem perfil-->
                        

                        <div id="passar_mouse">
                            <a class="nav-link" role="button" onclick="Dados_Cadastrais()">
                                <h5 style="color: white; text-align: left">Dados Cadastrais</h5>
                            </a>
                        </div>


                        <div id="passar_mouse">
                            <a class="nav-link"  role="button" onclick="Consultas()">
                                <h5 style="color: white; text-align: left">Consultas</h5>
                            </a>

                        </div>


                        <!-- <div id="passar_mouse">
                             <a class="nav-link" role="button" onclick="Tratamentos()">
                                 <h5 style="color: white; text-align: left">Tratamentos</h5>
                             </a>
 
                         </div>-->


                    </div>


                    <div class="col-10">
                        <div class="container-fluid mb-3 mt-3">
                            <div class="row-cols-auto bg-gradient overflow-auto"  style=" background-color: whitesmoke;opacity: 100%;">

                                <div class="container-fluid mb-2 overflow-auto" id="apresenta_DadosCadastrais" style="margin-left: 10px;max-height: 400px;">  </div>

                                <div class="container-fluid overflow-auto" style="max-height: 200px;">
                                    <table class="table table-hover bg-white " id="apresenta_Consultas" >
                                        <thead>

                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>


                                </div>
                                
                            </div>
                            
                            <div class="container-fluid row-cols-auto bg-gradient overflow-auto mb-2"  style=" background-color: whitesmoke;opacity: 100%;max-height: 300px">
                                
                                 
                                    <h6 class="text-dark mt-3" id="mostraTitulo" style="text-align: center"></h6>

                                  
                                <table class="table table-hover bg-white collapse" id="apresenta_Tratamentos">

                                    <thead>

                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="js/JQuery2.min.js"></script>
<script>
                                $(document).ready(function () {
                                    loadDados();
                                });
</script>




