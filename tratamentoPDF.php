<?php
require_once './vendor/composer/dompdf/autoload.inc.php';
require __DIR__.'/vendor/autoload.php';

use Classes\Entity\Prontuario;
use Dompdf\Dompdf;




if (isset($_GET['id'])){ //cuidado com o id da protese
    
    $tratamento = Prontuario::getTratamentoInner($_GET['id'],$_GET['consulta'],$_GET['prontuario']);
    //echo '<pre>';print_r($tratamento); echo '<pre>';exit;
     
} 
/*foreach ($tratamentos as $tratamento) {
   $nomeProcedimento=$tratamento->nomeProcedimento;
   $observacoes=$tratamento->observacoes;
} */  


//use Dompdf\Options;

//$options = new Options();
//$options->setChroot(__DIR__);
//$protese="";
//$outros="";
if ($tratamento->idProcedimento==3){//se igual a protese
    $t='<div>
        <h2 style="text-align:center" >'.$tratamento->nomeProcedimento.'</h2>
        <label>Código: '.$tratamento->idProtese.'</label><br>
        <label>Tipo: '.$tratamento->tipo.'</label><br>
        <label>Posição: '.$tratamento->posicao.'</label><br>
        <label>Material: '.$tratamento->material.'</label><br>
        <label>Dureza: '.$tratamento->dureza.'</label><br>
        <label>Extensão: '.$tratamento->extensao.'</label><br>
        <label>Dente: '.$tratamento->dente.'</label><br>
        <label>Qtd. de Dente: '.$tratamento->qtdDente.'</label><br>
        <label>Ouro?: '.$tratamento->ouro.'</label><br>
        <label>Qtd. Ouro: '.$tratamento->qtdOuro.'</label><br>
        <label>Data de Registro: '.date('d/m/y h:i:s', strtotime($tratamento->dataRegistro)).'</label><br>
        <label>Status: '.$tratamento->status.'</label><br>
        <label>Observação:<textarea style="height: auto"> '.$tratamento->observacao.'</textarea></label><br>
    </div>';
    
} else {
    $t='<div>
        <h2 style="text-align:center" >'.$tratamento->nomeProcedimento.'</h2>
        <label>Observação:<textarea style="height: auto"> '.$tratamento->observacoes.'</textarea></label><br>
    </div>';
}

$dompdf = new Dompdf();

//$dompdf->loadHtmlFile(__DIR__.'/montaPDF.php');
$dompdf->loadHtml('
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Tratamento-'.$tratamento->nomePaciente.'</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
        label{
        font-size: 14
        }
        </style>
    </head>
    <body>
   <h1 style="text-align:center" >Tratamento</h1>
   <div>
        <label>Prontuário: '.$tratamento->prontuario.'</label><br>
        <label>Paciente: '.$tratamento->nomePaciente.'</label><br>
        <label>Sexo: '.$tratamento->sexo.'</label><br>
        <label>Telefone: '.$tratamento->telefone.'</label><br>
        <label>E-mail: '.$tratamento->email.'</label>  
    </div>
    
    <hr><br>
   
    '.$t.'
    
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
