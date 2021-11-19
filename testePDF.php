<?php
require_once './vendor/composer/dompdf/autoload.inc.php';
require __DIR__.'/vendor/autoload.php';


use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->setChroot(__DIR__);

$dompdf = new Dompdf($options);

$dompdf->loadHtmlFile(__DIR__.'/arquivoPDF.html');
//$dompdf->loadHtml('<b>Olá pdf!</b>');

$dompdf->render();

//mostra o pdf na pagina
header('Content-type: application/pdf');
echo $dompdf->output();

//faz download do pdf
//$dompdf->stream('prontuario.pdf');

//salvar arquivo no disco diretamente no servidor.
//file_put_contents(__DIR__.'/arquivoPDF.pdf',$dompdf->output() );
//echo "Arquivo salvo com sucesso";
