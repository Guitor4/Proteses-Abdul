<?php

ob_start();
session_start();
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;


$prontuario = $_REQUEST['prontuario'];
$consulta = $_REQUEST['consulta'];
$_SESSION['prontuario'] = $prontuario;


sleep(1);
$query = "SELECT * from tratamento "
    ."inner join consulta on fkConsulta=idConsulta "
    ."inner join procedimento on fkProcedimento=idProcedimento "
    ."WHERE fkProntuario=". $prontuario. " and idConsulta=".$consulta;
//."left join protese on fkConsulta=fkConsultaT "
if ($prontuario != null) {
    $prontuario1 = (new db())->executeSQL($query);

    $array = [];
    if ($prontuario1->rowCount() > 0) {
        while ($row_prontuario1 = $prontuario1->fetch(PDO::FETCH_ASSOC)) {
            $array[] = array(
           'nomeT' => $row_prontuario1['nomeProcedimento'],
           'idC' => $row_prontuario1['idConsulta'],
           'prontuario' => $row_prontuario1['fkProntuario'],
           'idProcedimento' => $row_prontuario1['fkProcedimento'],
            
            );
        }
        echo json_encode($array);
    }else{
    echo json_encode('Sem resultados');
}
}