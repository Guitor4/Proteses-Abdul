<?php
require_once './vendor/composer/dompdf/autoload.inc.php';
require __DIR__.'/vendor/autoload.php';
use Classes\Entity\Consulta;
use \Classes\Entity\tratamento;


use Dompdf\Dompdf;
//use Dompdf\Options;


//$options = new Options();
//$options->set('isRemoteEnable', true);//habilita carregamento de links remotos

$dompdf = new Dompdf();


if (isset($_GET['prontuario'])){
    $consulta= Consulta::getConsultaInnerJoin('paciente,dentista,clinica,funcionario', 'idConsulta = ' . $_GET['id'], 'fkProntuario,prontuario,CFKDentista,idDentista,CFKClinica,idClinica,fkFuncionario,idFuncionario,fkConsulta');
    $tratamentos = tratamento::getTratamentos('procedimento', 'fkConsulta =' . $_GET['id'], 'fkProcedimento,idProcedimento');  
    /*echo '<pre>';
    print_r($tratamentos);
    echo '<pre>';
    exit;*/
     
 //var_dump($consulta);
}
foreach ($tratamentos as $tratamento) {
   $nomeProcedimento=$tratamento->nomeProcedimento;
   $observacoes=$tratamento->observacoes;
}   


//$dompdf->loadHtmlFile(__DIR__.'/montaPDF.php');


//fazer cabeçalho!!!!!!!!!!!!!

$dompdf->loadHtml('
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Consulta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div>
    <img src="./includes/img/DL_Logo_wStrap_Black-01.png" width="200" height="100"> 
    </div>
   <h1 style="text-align:center" >Consulta '.$consulta->idConsulta.'</h1>
   <div>
        <label>Prontuário: '.$consulta->prontuario.'</label><br>
        <label>Paciente: '.$consulta->nomePaciente.'</label><br>
        <label>Sexo: '.$consulta->sexo.'</label><br>
        <label>Telefone: '.$consulta->telefone.'</label><br>
        <label>E-mail: '.$consulta->email.'</label>  
    </div>
    <hr><br>
    
    <div>
        <label>Data: '.date('m-d-Y', strtotime($consulta->dataConsulta)).'</label><br>
        <label>Hora: '.$consulta->horaConsulta.'</label><br>
        <label>Status: '.$consulta->statusConsulta.'</label><br>
        <label>Clinica: '.$consulta->nomeClinica.'</label><br>
        <label>Dentista: '.$consulta->nomeDentista.'</label><br>
        Relatório:<textarea style="height: auto"> '.$consulta->relatorio.'</textarea><br>
    </div>
    <hr><br>
    
    <div>
        <h3 style="text-align:center" >Tratamento</h3>
        <label>Procedimento: '.$nomeProcedimento.'</label><br>
        <label>Observações:<textarea style="height: auto"> '.$observacoes.'</textarea></label><br>
    </div>

</body>
</html>');

$dompdf->setPaper($size="A4");

$dompdf->render();

//mostra o pdf na pagina
header('Content-type: application/pdf');
echo $dompdf->output();

//faz download do pdf
//$dompdf->stream('consulta.pdf',["Attachment=>false"]);

//salvar arquivo no disco diretamente no servidor.
//file_put_contents(__DIR__.'/arquivoPDF.pdf',$dompdf->output() );
//echo "Arquivo salvo com sucesso";
