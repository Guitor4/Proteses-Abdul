<?php
require __DIR__ . '/vendor/autoload.php';

use Classes\Entity\configuracoes ;

//abrindo o json externo

/* echo "<pre>"; print_r($json); echo "<pre>";exit; */
//Editando a linha que vc quer

$json->conf->teste = "teste";

//Salvando as edições
$json_editado = file_put_contents('config.json',json_encode($json));

//Carregando json após ser salvo já editado
$json = json_decode(file_get_contents('config.json'));
//Imprimindo json editado
var_dump($json);


date_default_timezone_set('America/Sao_Paulo');
$start = new \DateTime('08:00');
$interval = 'PT15M';
switch ($interval) {
    case 'PT15M':
        $times = 40;
        break;
    case 'PT30M':
        $times = 20;
        break;
    case 'PT45M':
        $times = 13;
        break;
    case 'PT60M':
        $times = 10;
        break;
}
/* $times = 11; */ // 24 hours * 30 mins in an hour
$result[0] = $start->format('H:i');
for ($i = 0; $i < $times - 1; $i++) {
    $result[] = $start->add(new \DateInterval($interval))->format('H:i');
}
/* var_dump($result); */
