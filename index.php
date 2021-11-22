<?php
//faz o require do autoload composer, para carregar automaticamente as principais classes do nosso projeto,  
//assim só sendo necessário o uso de um "use \classe" para chamá-la (válido somente para arquivos da pasta classes).
require __DIR__.'/vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
define('IDENTIFICACAO', 0);
/* echo '<pre>';print_r($_SESSION);echo'<pre>';exit; */
/* echo '<pre>';print_r($_SESSION);echo'<pre>';exit; */
//Monta a página, utilizando o header.php, arquivo que contém a navbar e o início da div container; o arquivo que vai ser de fato
//o conteúdo que a página vai ter, por exemplo o home.php que está agora; e por fim o arquivo que contém o fechamento da div container, os scripts e o fechamento do html.
//echo "<pre>"; print_r($_SESSION); echo "<pre>";exit; 
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/home.php';
include __DIR__.'/includes/footer.php';
