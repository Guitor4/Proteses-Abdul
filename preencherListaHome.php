<?php

require __DIR__ . ('./vendor/autoload.php');

use Classes\Dao\db;

$data = $_GET['data'];

$query1 = 'select idConsulta,nomePaciente,dataConsulta,horaConsulta,statusConsulta,relatorio from consulta inner join paciente on prontuario = fkProntuario where statusConsulta != "Finalizada" and dataConsulta = "'.$data.'" ORDER BY horaConsulta,dataConsulta,nomePaciente desc';
date_default_timezone_set('America/Sao_Paulo');
$eventoConsultas = (new db())->executeSQL($query1);




$array = [];
if ($eventoConsultas->rowCount() > 0) {
    
    $duracao = '00:30:00';
    $v = explode(':', $duracao);
    
    while ($row_eventoConsultas = $eventoConsultas->fetch(PDO::FETCH_ASSOC)) {
        $data = $row_eventoConsultas['horaConsulta'];
        $hora = date('H:i:s', strtotime("{$data} + {$v[0]} hours {$v[1]} minutes {$v[2]} seconds"));
        $array[] = array(
            'id' => $row_eventoConsultas['idConsulta'],
            'title' => "Consulta de " . $row_eventoConsultas['nomePaciente'],
            'start' => $row_eventoConsultas['dataConsulta'],
            'horaConsulta' => date('H:i',strtotime($row_eventoConsultas['horaConsulta'])),
            'statusConsulta' => $row_eventoConsultas['statusConsulta'],
            'relatorio' => $row_eventoConsultas['relatorio']
            
        );
    }

    echo json_encode($array);
}
