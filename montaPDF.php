<?php
require __DIR__ . '/vendor/autoload.php';

use Classes\Entity\Consulta;

if (isset($_GET['prontuario'])){
    $consulta= Consulta::getConsultaInnerJoin('paciente,dentista,clinica,funcionario', 'idConsulta = ' . $_GET['id'], 'fkProntuario,prontuario,CFKDentista,idDentista,CFKClinica,idClinica,fkFuncionario,idFuncionario');
       /*echo '<pre>';
    print_r($consulta);
    echo '<pre>';
    exit;*/
 var_dump($consulta);
}
$html = "<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>PDF</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head>
    <body>";
$html += "<label>$nomePaciente</label>";

$html += "<div>Nome Paciente: </div>
    </body>
</html>";
?>

        
        