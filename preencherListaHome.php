<?php

require __DIR__ . ('./vendor/autoload.php');

use Classes\Dao\db;

date_default_timezone_set('America/Sao_Paulo');

$data = $_GET['data'];
$term = $_GET['id'];



$query1 = 'select idConsulta,nomePaciente,dataConsulta,horaConsulta,statusConsulta,relatorio from consulta inner join paciente on prontuario = fkProntuario where statusConsulta != "Finalizada" and dataConsulta = "' . $data . '" ORDER BY horaConsulta,dataConsulta,nomePaciente desc';

$query2 = 'select idLembrete,titulo,descricao,dataLembrete,fkFuncionario,nomeFuncionario from lembrete inner join funcionario on fkFuncionario = idFuncionario where dataLembrete = "'.$data.'"';

switch ($term) {
    case 1:
        $eventoConsultas = (new db())->executeSQL($query1);
        break;

    case 2:
        $eventoLembretes = (new db())->executeSQL($query2);
        break;

    case 3:
        $eventoConsultas = (new db())->executeSQL($query1);
        $eventoLembretes = (new db())->executeSQL($query2);
        break;
}

$array = [];
if (isset($eventoConsultas)) {
    if ($eventoConsultas->rowCount() > 0) {

        while ($row_eventoConsultas = $eventoConsultas->fetch(PDO::FETCH_ASSOC)) {

            $array[] = array(
                'id' => $row_eventoConsultas['idConsulta'],
                'title' => "Consulta de " . $row_eventoConsultas['nomePaciente'],
                'start' => $row_eventoConsultas['dataConsulta'],
                'horaConsulta' => date('H:i', strtotime($row_eventoConsultas['horaConsulta'])),
                'statusConsulta' => $row_eventoConsultas['statusConsulta'],
                'relatorio' => $row_eventoConsultas['relatorio']

            );
        }
    }
    
}
if(isset($eventoLembretes)){
    if($eventoLembretes->rowCount() > 0){
        while ($row_eventoLembretes = $eventoLembretes->fetch(PDO::FETCH_ASSOC)){
            $array[] = array(
                'idLembrete' => $row_eventoLembretes['idLembrete'],
                'titulo' => $row_eventoLembretes['titulo'],
                'descricao' => $row_eventoLembretes['descricao'],
                'nomeFuncionario'=> $row_eventoLembretes['nomeFuncionario']

            );
        }
    }
}

echo json_encode($array);