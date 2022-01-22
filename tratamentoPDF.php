<?php
require_once './vendor/composer/dompdf/autoload.inc.php';
require __DIR__.'/vendor/autoload.php';

use Classes\Entity\Prontuario;
use Dompdf\Dompdf;
use Dompdf\Options;



if (isset($_GET['idProcedimento'])){ //cuidado com o id da protese
    
    $tratamento = Prontuario::getTratamentoInner($_GET['idProcedimento'],$_GET['nomeProcedimento'],$_GET['consulta'],$_GET['prontuario']);
    /* echo "<pre>"; print_r($tratamento); echo "<pre>";exit; */
    if(!$tratamento){
        header('location:prontuario.php?paciente='.$_GET['prontuario'].'&status=error2');
    }
     
} 
/*foreach ($tratamentos as $tratamento) {
   $nomeProcedimento=$tratamento->nomeProcedimento;
   $observacoes=$tratamento->observacoes;
} */  




$options = new Options();
$options->setChroot(__DIR__);

if ($tratamento->nomeProcedimento=='Denture'||$tratamento->nomeProcedimento=='Denture 2'){//se igual a protese
    $t='
        <h3>'.$tratamento->nomeProcedimento.'</h3>
        <label>Denture ID: '.$tratamento->idProtese.'</label><br>
        <label>Denture option: '.$tratamento->tipo.'</label><br>
        <label>Position: '.$tratamento->posicao.'</label><br>
        <label>Tooth Brand: '.$tratamento->marcaDente.'</label><br>
        <label>Extension: '.$tratamento->extensao.'</label><br>
        <label>N° of Teeths: '.$tratamento->qtdDente.'</label><br>
        <label>Has golden tooth: '.$tratamento->ouro.'</label><br>
        <label>N° of golden teeth: '.$tratamento->qtdOuro.'</label><br>
        <label>Registration date: '.date('m-d-Y h:i:s', strtotime($tratamento->dataRegistro)).'</label><br>
        <label>Status: '.$tratamento->status.'</label><br>
        <label>Observation:<textarea style="height: auto"> '.$tratamento->observacao.'</textarea></label><br>
        ';
    
} else {
    $t='<div>
        <h3>'.$tratamento->nomeProcedimento.'</h3>
        <label>Observation:<textarea style="height: auto"> '.$tratamento->observacao.'</textarea></label><br>
    </div>';
}



$dompdf = new Dompdf($options);

//$dompdf->loadHtmlFile(__DIR__.'/montaPDF.php');

$logo='/includes/img/DL_Logo_wStrap_Black-01.png';
$dompdf->loadHtml('
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>'.$tratamento->nomePaciente.'-Consulta'.$tratamento->idConsulta.'</title>
        <meta charset="utf-8">
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
        <label>Medical Record: '.$tratamento->prontuario.'</label><br>
        <label>Patient: '.$tratamento->nomePaciente.'</label><br>
        <label>Gender: '.$tratamento->sexo.'</label><br>
        <label>Phone: '.$tratamento->telefone.'</label><br>
        <label>E-mail: '.$tratamento->email.'</label>  
    </div>
    
    <hr>
    
    
        <h1 style="text-align:center" >Appointment '.$tratamento->idConsulta.'</h1>
            <div>
            <label>Date: '.date('m-d-Y', strtotime($tratamento->dataConsulta)).'</label><br>
            <label>Hour: '.$tratamento->horaConsulta.'</label><br>
            <label>Status: '.$tratamento->statusConsulta.'</label><br>
            <label>Clinic: '.$tratamento->nomeClinica.'</label><br>
            <label>Dentist: '.$tratamento->nomeDentista.'</label><br>
            Comments:<textarea style="height: auto"> '.$tratamento->relatorio.'</textarea><br>
            </div>
    
    <hr>
    
    <footer style="position: fixed; bottom:0; width: 100%; border-top: 1px solid gray;">
    
        <span>Denture Logic - Customised Denture Care</span><br>
        <span>Phone:(61)9999-0000</span><br>
        <span>Abdul denture logic</span><br>
        <span>'. date('m-d-Y H:i:s') .'</span><br>
        <span class="page">Page<span>
        
    </footer>
    
        <h1 style="text-align:center" >Treatment</h1>
        
        <div id="tratamento">'.$t.'</div>
            
        
    
</body>
    
</html>');


$dompdf->setPaper($size="A4");

$dompdf->render();

//mostra o pdf na pagina
header('Content-type: application/pdf');

$dompdf->stream($tratamento->nomePaciente."_".date('H:i:s').".pdf",["Attachment"=>false]);
//echo $dompdf->output();
//faz download do pdf


//salvar arquivo no disco diretamente no servidor.
//file_put_contents(__DIR__.'/arquivoPDF.pdf',$dompdf->output() );
//echo "Arquivo salvo com sucesso";
