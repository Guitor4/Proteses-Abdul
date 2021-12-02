<?php
require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
use Classes\Entity\Procedimento;
use Classes\Entity\Terceiro;

$linhasProcedimento = Procedimento::getProcedimentos();
$terceiros = Terceiro::getTerceiros();
//echo '<pre>';print_r($linhasProcedimento);echo'<pre>';exit;
if (isset($_POST['submit'])) {
    echo '<pre>';
    print_r($_POST);
    echo '<pre>';
    exit;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap-select-picker.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="css/css-debug.css"> -->

    <title>Document</title>
</head>

<body>
    <form id="Terceirizado">
        <select name="id_terceiro" id="id_terceiro" onchange="getServicoTerceiro()">
            <option value="0">Selecione o Terceiro</option>
            <?php
            foreach ($terceiros as $t) {
                echo "<option value= " . $t->idTerceiro . ">" . $t->nomeTerceiro . "</option>";
            }

            ?>


        </select>
        <select id="servico_terceiro">
            <option value="" hidden>Escolher Servico</option>
        </select>
    </form>
    <div id="mensagem"> <?= date('H:i')  ;?></div>

    <p>Escolha: <input type="text" id="datepicker" /></p> 

    <script src="js/JQuery2.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-select-1.14-dev/js/bootstrap-select.js"></script>
    <script type="text/javascript" charset="utf-8">
        function getServicoTerceiro() {
            $(function() {
                $('#id_terceiro').change(function() {
                    if ($(this).val()) {
                        $('#servico_terceiro').hide();
                        $('#mensagem').html('<span>Aguarde, carregando...</span>')
                        $.getJSON('TerceiroServico.php?search=', {
                            id_terceiro: $(this).val(),
                            ajax: 'true'
                        }, function(j) {
                            var options = "<option value=''>Escolher Servico</option>";
                            var optionsV = "";
                            for (var i = 0; i < j.length; i++) {
                                options += '<option value="' + j[i].id + '">' + j[i].nomeServico + '</option>';

                            }

                            $('#servico_terceiro').html(options).show();
                            $('#servico_terceiroForm').html(optionsV).show();
                            $('#mensagem').html('')
                            $('.cliqueAqui').hide();

                        });
                    }
                });
            })
        }
        $(function() {
    $( "#datepicker" ).datepicker({ minDate: 0});
});
    </script>
</body>

</html>