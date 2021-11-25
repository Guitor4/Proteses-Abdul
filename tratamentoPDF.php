<?php
require_once './vendor/composer/dompdf/autoload.inc.php';
require __DIR__.'/vendor/autoload.php';

use Classes\Entity\Prontuario;
use Dompdf\Dompdf;
use Dompdf\Options;



if (isset($_GET['idProcedimento'])){ //cuidado com o id da protese
    
    $tratamento = Prontuario::getTratamentoInner($_GET['idProcedimento'],$_GET['consulta'],$_GET['prontuario']);
    //echo '<pre>';print_r($tratamento); echo '<pre>';exit;
     
} 
/*foreach ($tratamentos as $tratamento) {
   $nomeProcedimento=$tratamento->nomeProcedimento;
   $observacoes=$tratamento->observacoes;
} */  




$options = new Options();
$options->setChroot(__DIR__);

if ($tratamento->idProcedimento==4){//se igual a protese
    $t='
        <h3>'.$tratamento->nomeProcedimento.'</h3>
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
        ';
    
} else {
    $t='<div>
        <h3>'.$tratamento->nomeProcedimento.'</h3>
        <label>Observação:<textarea style="height: auto"> '.$tratamento->observacoes.'</textarea></label><br>
    </div>';
}



$dompdf = new Dompdf($options);

//$dompdf->loadHtmlFile(__DIR__.'/montaPDF.php');

$logo='/includes/img/DL_Logo_wStrap_Black-01.png';
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
        .page{
            margin-left:90%;
            position: relative;
            bottom:0
            
            }
        .page:after{
            content: counter(page);
            }
            
        #tratamento{
            padding-bottom:60px;
            position: relative;
            margin: auto;
            margin-bottom:50px
           
        }
        </style>
    </head>
    <body>
    
    
        <p style="text-align:center;"> <img src="'.__DIR__.$logo.'"width="200" height="100" > </p>
    
   <div>
        <label>Prontuário: '.$tratamento->prontuario.'</label><br>
        <label>Paciente: '.$tratamento->nomePaciente.'</label><br>
        <label>Sexo: '.$tratamento->sexo.'</label><br>
        <label>Telefone: '.$tratamento->telefone.'</label><br>
        <label>E-mail: '.$tratamento->email.'</label>  
    </div>
    
    <hr>
    
    
        <h1 style="text-align:center" >Consulta '.$tratamento->idConsulta.'</h1>
            <div>
            <label>Data: '.date('d/m/y', strtotime($tratamento->dataConsulta)).'</label><br>
            <label>Hora: '.$tratamento->horaConsulta.'</label><br>
            <label>Status: '.$tratamento->statusConsulta.'</label><br>
            <label>Clinica: '.$tratamento->nomeClinica.'</label><br>
            <label>Dentista: '.$tratamento->nomeDentista.'</label><br>
            Relatório:<textarea style="height: auto"> '.$tratamento->relatorio.'</textarea><br>
            </div>
    
    <hr>
    
    <footer style="position: fixed; bottom:0; width: 100%; border-top: 1px solid gray;">
    
        <span>Denture Logic - Customised Denture Care</span><br>
        <span>Telefone:(61)9999-0000</span><br>
        <span>Protético:Abdul Abdul</span><br>
        <span>'. date('d/m/Y H:i:s').'</span><br>
        <span class="page">Página<span>
        
    </footer>
    
        <h1 style="text-align:center" >Tratamento</h1>
        
        <div id="tratamento">'.$t.'</div>
            
        
    
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
