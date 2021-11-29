<?php
require __DIR__ . '/vendor/autoload.php';

use Classes\Dao\db;
/* use PDO; */

$autoCompletar = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

/* if ($autoCompletar == null) {
    echo "<pre>";
    print_r('teste');
    echo "<pre>";
    exit;
} */
if (isset($_GET['teste'])) {
    $GET = $_GET['teste'];
} else {
    $GET = 1;
}
$query = "";
switch ($GET) {
    case 1:
        define('CAMPO', 'nomePaciente,prontuario');
        define('TABELA', 'paciente');
        break;

    case 2:
        define('CAMPO', 'nomeProcedimento,idProcedimento');
        define('TABELA', 'procedimento');
        break;

    case 3:
        define('CAMPO', 'nomeFuncionario,idFuncionario');
        define('TABELA', 'funcionario');
        break;
    case 4:
        define('CAMPO', 'nomePaciente');
        $autoCompletar = (strlen($autoCompletar) ? "WHERE nomepaciente   LIKE '%" . $autoCompletar . "%' OR  prontuario LIKE '%" . $autoCompletar . "%'  " : '');
        $query = 'select distinct * from paciente inner join consulta on prontuario = fkProntuario inner join protese on fkConsultaT = idConsulta ' . $autoCompletar;
        break;
    case 5:
        define('CAMPO', 'nomeClinica,idClinica');
        define('TABELA', 'clinica');
        break;
    case 6:
        define('CAMPO', 'nomeDentista,idDentista');
        define('TABELA', 'dentista');
        break;
    case 7:
        define('CAMPO', 'nomePaciente,prontuario');
        $autoCompletar = (strlen($autoCompletar) ? "WHERE nomePaciente   LIKE '%" . $autoCompletar . "%' OR  prontuario LIKE '%" . $autoCompletar . "%'  " : '');
        $query = 'select distinct * from paciente inner join consulta on prontuario = fkProntuario ' . $autoCompletar;
        break;
    case 8:
        define('CAMPO', 'nomeServico,idServico');
        define('TABELA', 'servicoTerceiro');
        break;
    case 9:
        define('CAMPO', 'nomeServico,nomeTerceiro');
        $autoCompletar = (strlen($autoCompletar) ? "WHERE nomeServico   LIKE '%" . $autoCompletar . "%' OR  nomeTerceiro LIKE '%" . $autoCompletar . "%' OR idServico   LIKE '%" . $autoCompletar . "%' OR  idTerceiro   LIKE '%" . $autoCompletar . "%'" : '');
        $query = "select nomeTerceiro,nomeServico from terceiro inner join servicoterceiro inner join terceirizado on fkTerceiro = idTerceiro and fkServicoTerceiro = idServico " . $autoCompletar;
        break;
}

$clause = explode(',', CAMPO);
/* echo "<pre>"; print_r($clause); echo "<pre>";exit; */
$campos = CAMPO;
$campo = '';
$clause_count = count($clause);
if ($clause_count > 0) {
    for ($x = 0; $x < $clause_count; $x++) {
        /* echo "<pre>"; print_r($c); echo "<pre>";exit; */
        if ($x != $clause_count - 1) {
            $campo .= " " . $clause[$x] . " LIKE '%" . $autoCompletar . "%' or ";
            /* echo "<pre>"; print_r($clause[$x]); echo "<pre>";exit; */
        } else {
            $campo .= " " . $clause[$x] . " LIKE '%" . $autoCompletar . "%'  ";
            /* echo "<pre>"; print_r($clause[$x]); echo "<pre>";exit; */
        }
    }
}

if ($query == '') {
    $tabela = TABELA;
    $query = "SELECT distinct " . $campos . " from " . $tabela . " where " . $campo . " order by " . $clause[0] . " asc limit 5";
}

$resultado_msg_cont = (new db())->executeSQL($query);

$data = [];
while ($row_msg_count = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
    for ($x = 0; $x < $clause_count; $x++) {

        if (!in_Array($row_msg_count[$clause[$x]], $data)) {
            $data[] = $row_msg_count[$clause[$x]];
        }
    }
    if ($data == null) {
        $data = ['Sem Resultados'];
    }
}
/* $data = ['Sem resultados 1','Sem resultados 2']; */
echo json_encode($data);
