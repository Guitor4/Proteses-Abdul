<?php

if (isset($_GET['rProtese'])) {

    $rastreio->fkProtese = $_GET['rProtese'];
}
?>

<div class="container-fluid">
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



                <form method="post" action="" style="color: white">
                    <div class="row">
                        <div class="col-4 offset-1">
                            <div class="form-group">
                                <label><b>ID:</b> <b style="color: yellow"><?= $detalhaRastreio->idRastreio ?></b></label>

                            </div>

                            <div class="form-group">
                                <label><strong>Send date:</strong> <?= $detalhaRastreio->dtEntrega ?></label>

                            </div>

                            <div class="form-group">
                                <label><strong>Return date:</strong> <?= $detalhaRastreio->dtRetorno ?></label>

                            </div>

                            <div class="form-group">
                                <label><strong>Denture:</strong> <?= $detalhaRastreio->idProtese ?></label>

                            </div>

                            <div class="form-group">
                                <label><strong>Denture option:</strong> <?= $detalhaRastreio->tipo ?></label>

                            </div>



                            <div class="form-group">
                                <label><strong>Position:</strong> <?= $detalhaRastreio->posicao ?></label>

                            </div>


                            <div class="form-group">
                                <label><strong>Observation:</strong></label><br>
                                <textarea rows="3" cols="30" disabled="" class="text-danger bg-light"><?= $detalhaRastreio->obs ?></textarea>

                            </div>

                        </div>

                        <div class="col-5 offset-1">

                            <div class="form-group">
                                <label><strong>Patient:</strong> <?= $detalhaRastreio->nomePaciente ?></label>


                            </div>

                            <div class="form-group">
                                <label><strong>Medical Record:</strong> <?= $detalhaRastreio->prontuario ?></label>

                            </div>

                            <div class="form-group">
                                <label><strong>Appointment:</strong> <?= $detalhaRastreio->idConsulta ?></label>

                            </div>

                            <div class="form-group">
                                <label><strong>Treatment:</strong> <?= $detalhaRastreio->nomeProcedimento ?></label>
                                <hr>
                            </div>

                            <div class="form-group">
                                <label><strong>Provider:</strong> <?= $detalhaRastreio->nomeTerceiro ?></label>

                            </div>

                            <div class="form-group">
                                <label><strong>Service:</strong> <?= $detalhaRastreio->nomeServico ?></label>

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
                        <input type="submit" name="<?= BTN ?>" style="width: 100px" class="btn btn-primary btInput p-1 offset-4" value="Edit" <?php //if ($btEnviar == TRUE) echo "disabled";  
                                                                                                                                                ?>>

                        <input type="submit" name="<?= BTN2 ?>" style="width: 100px" class="btn btn-success btInput p-1 offset-1" value="OK" <?php //if ($btEnviar == TRUE) echo "disabled";  
                                                                                                                                                ?>>
                        <br>
                        <br>
                    </div>
                    </form>
                </div>
            </div>


        </div>
    </div>