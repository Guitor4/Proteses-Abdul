<?php

//var_dump($_REQUEST['prontuario']);
ob_start();
session_start();
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;



$prontuario = $_REQUEST['prontuario'];
$antesDepois = $_REQUEST['antesDepois'];
$_SESSION['prontuario'] = $prontuario;
sleep(-0.9);

if ($antesDepois==1) {
    $query = "SELECT * FROM foto "
            . "inner JOIN paciente on fkProntuario=prontuario "
            . "where fkProntuario=" . $prontuario . " and titulo like '%antes%'";
}

if ($antesDepois==2) {
    $query = "SELECT * FROM foto "
            . "inner JOIN paciente on fkProntuario=prontuario "
            . "where fkProntuario=" . $prontuario . " and titulo like '%depois%'";
}
    
    if ($prontuario != null) {
        $prontuario1 = (new db())->executeSQL($query);

        $array = [];
        if ($prontuario1->rowCount() > 0) {
            while ($row_prontuario1 = $prontuario1->fetch(PDO::FETCH_ASSOC)) {
                $array[] = array(
                    'idFoto' => $row_prontuario1['idFoto'],
                    'img' => $row_prontuario1['img'],
                );
            }
            echo json_encode($array);
        } else {
            echo json_encode($array);
        }
    
}