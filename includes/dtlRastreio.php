<?php
$msg = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $msg = '<div class ="alert alert-success"> Ação executada com sucesso!</div>';
            break;
        case 'error':
            $msg = '<div class ="alert alert-success"> Ação não executada!</div>';
            break;
    }
}


if (isset($_GET['rProtese'])) {

    $rastreio->fkProtese = $_GET['rProtese'];
}
?>

<div class="container-fluid">

    <?php
    if ($msg != "") {
        echo $msg;
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='cadRastreio.php'\">";
    }
    ?>
    <br>




    <!--<div class="row">-->

    <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <div class=" bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                    <h3 style="color: white; text-align: center"><?= TITLE ?></h3>
                </div>
            </div>

            <div class=" row bg-gradient rounded-3" style="background-color: black; opacity: 90%;">
               


                <form method="post" action="" style="color: white" >
                    <div class="row">
                    <div class="col-4 offset-1">
                        <div class="form-group">
                            <label><b>Código:</b> <b style="color: yellow"><?= $detalhaRastreio->idRastreio ?></b></label>

                        </div>

                        <div class="form-group">
                            <label><strong>Data de Envio:</strong> <?= $detalhaRastreio->dtEntrega ?></label>

                        </div>

                        <div class="form-group">
                            <label><strong>Data de Retorno:</strong> <?= $detalhaRastreio->dtRetorno ?></label>

                        </div>

                        <div class="form-group">
                            <label><strong>Prótese:</strong> <?= $detalhaRastreio->idProtese ?></label>

                        </div>

                        <div class="form-group">
                            <label><strong>Tipo:</strong> <?= $detalhaRastreio->tipo ?></label>

                        </div>



                        <div class="form-group">
                            <label><strong>Posição:</strong> <?= $detalhaRastreio->posicao ?></label>

                        </div>


                        <div class="form-group">
                            <label><strong>Observação:</strong></label><br>
                            <textarea rows="3" cols="30" disabled="" class="text-danger bg-light"><?= $detalhaRastreio->obs ?></textarea>
                            
                        </div>

                    </div>

                    <div class="col-5 offset-1">

                        <div class="form-group">
                            <label><strong>Paciente:</strong> <?= $detalhaRastreio->nomePaciente ?></label>


                        </div>

                        <div class="form-group">
                            <label><strong>Prontuário:</strong> <?= $detalhaRastreio->prontuario ?></label>

                        </div>

                        <div class="form-group">
                            <label><strong>Consulta:</strong> <?= $detalhaRastreio->idConsulta ?></label>

                        </div>

                        <div class="form-group">
                            <label><strong>Tratamento:</strong> <?= $detalhaRastreio->nomeProcedimento ?></label>
                            <hr>
                        </div>

                        <div class="form-group">
                            <label><strong>Terceirizado:</strong> <?= $detalhaRastreio->nomeTerceiro ?></label>

                        </div>

                        <div class="form-group">
                            <label><strong>Serviço:</strong> <?= $detalhaRastreio->nomeServico ?></label>

                        </div>

                        <div class="form-group">
                            <label><b>Status:</b> <b style="color: yellow"><?= $detalhaRastreio->statusRastreio ?></b></label>

                        </div>
                        <br>
                    </div>
            </div>
            </div>
            



            <div>
                <div class="row">
                    <div class="  bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                        <br>
                        <input type="submit"  name="<?= BTN ?>" style="width: 100px"
                               class="btn btn-primary btInput p-1 offset-4" value="Editar"
                               <?php //if ($btEnviar == TRUE) echo "disabled";  ?>>
                        
                        <input type="submit"  name="<?= BTN2 ?>" style="width: 100px"
                               class="btn btn-success btInput p-1 offset-1" value="OK"
                               <?php //if ($btEnviar == TRUE) echo "disabled";  ?>>
                        <br>
                        <br>
                    </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

