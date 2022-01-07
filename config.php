<?php

include __DIR__.'./vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';

define('NAME', 'Settings');

$json = json_decode(file_get_contents('config.json'));
$intervalo = $json->conf->intervaloHorarioConsulta;
/* echo "<pre>"; print_r($intervalo); echo "<pre>";exit; */
if (isset($_POST['salvar'])){
    $json->conf->intervaloHorarioConsulta = $_POST['intervalo'];
    $json_editado = file_put_contents('config.json',json_encode($json));

    header('location:config.php?status=success3');
}

include __DIR__.'./includes/header.php';
include __DIR__.'./includes/pagConfiguracoes.php';
include __DIR__.'./includes/mensagensCRUD.php';
include __DIR__.'./includes/footer.php';
