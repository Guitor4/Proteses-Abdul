<?php

use Classes\Dao\db;

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set('America/Sao_Paulo');
$json = json_decode(file_get_contents('config.json'));
$start = new \DateTime('08:00');
$interval = $json->conf->intervaloHorarioConsulta;
/* echo "<pre>"; print_r($interval); echo "<pre>";exit; */
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
    case 'PT120M':
        $times = 5;
        break;
}
/* $times = 11; */ // 24 hours * 30 mins in an hour
$horarios[0] = $start->format('H:i');
for ($i = 0; $i < $times - 1; $i++) {
    $horarios[] = $start->add(new \DateInterval($interval))->format('H:i');
}

foreach ($horarios as $h) {
    $horariosPossiveis[] = $h;
}


if (isset($_GET['data'])) {
    $data = $_GET['data'];
}
$horariosDisponiveis = array();
$array = [];
$query = 'select horaConsulta from consulta where dataConsulta = "' . $data . '" and statusConsulta != "Finalizada"';
/* echo "<pre>"; print_r($query); echo "<pre>";exit; */
$horariosUtilizados = (new db())->executeSQL($query);
if ($horariosUtilizados->rowCount() > 0) {

    while ($row_horarios = $horariosUtilizados->fetch(PDO::FETCH_ASSOC)) {

        $array[] = date('H:i', strtotime($row_horarios['horaConsulta']));
    }
}
$contador = 0;
foreach ($horarios as $hu) {
    if (!in_array($horarios[$contador], $array)) {
        $horariosDisponiveis[] = array('horario' => $horarios[$contador]);
    }
    $contador++;
}
if (count($horariosDisponiveis) > 0) {
    echo json_encode($horariosDisponiveis);
} else {
    $horariosDisponiveis[] = array('horario' => 'No time available');
    echo json_encode($horariosDisponiveis);
}
