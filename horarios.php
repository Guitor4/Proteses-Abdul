<?php

use Classes\Dao\db;

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
$horarios = [
    '08:30',
    '09:00',
    '09:30',
    '10:00',
    '10:30',
    '11:00',
    '11:30',
    '12:00',
    '12:30',
    '13:00',
    '13:30',
    '14:00',
    '14:30',
    '15:00',
    '15:30',
    '16:00',
    '16:30',
    '17:00',
    '17:30'
];

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
    $horariosDisponiveis[] = array('horario' => 'Sem horários disponíveis');
    echo json_encode($horariosDisponiveis);
}
