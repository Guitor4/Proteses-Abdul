<?php
//var_dump($_REQUEST['prontuario']);
ob_start();
session_start();
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;


$prontuario = $_REQUEST['prontuario'];
$_SESSION['prontuario'] = $prontuario;
sleep(1);
$query = "SELECT DISTINCT * from consulta inner join paciente "
    . "on fkProntuario=prontuario "
    . "inner join clinica on CFKClinica=idClinica "
    . "inner join dentista on CFKDentista=idDentista "
//    . "inner join tratamento on fkConsulta=idConsulta "
//    . "inner join procedimento on fkProcedimento=idProcedimento "
    . "where prontuario=" . $prontuario;
if ($prontuario != null) {
    $prontuario1 = (new db())->executeSQL($query);

    $array = [];
    if ($prontuario1->rowCount() > 0) {
        while ($row_prontuario1 = $prontuario1->fetch(PDO::FETCH_ASSOC)) {
            
            if (!in_array($row_prontuario1['idConsulta'], $array)) {
                $array[] = array(
                    'id' => $row_prontuario1['idConsulta'],
           'data' => date('d/m/y', strtotime($row_prontuario1['dataConsulta'])),
           'hora' => $row_prontuario1['horaConsulta'],
           'status' => $row_prontuario1['statusConsulta'],
           'clinica' => $row_prontuario1['nomeClinica'],
           'dentista' => $row_prontuario1['nomeDentista'],
//           'procedimento' => $row_prontuario1['nomeProcedimento'],
//           'idProcedimento' => $row_prontuario1['idProcedimento'],
           'prontuario' => $row_prontuario1['prontuario'],
                    );
            }
           
         
            
        }
        echo json_encode($array);
    }else{
    echo json_encode('Sem resultados');
}
}
