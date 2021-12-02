<?php

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');

$duracao = '00:30:00';
$v = explode(':', $duracao);
$data = date('H:i:s');
echo $hora = date('H:i:s', strtotime("{$data} + {$v[0]} hours {$v[1]} minutes {$v[2]} seconds"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <select name="horarios" id="horarios" onchange="Teste()">
        <option value="00:30:00">30 minutos</option>
        <option value="00:45:00">45 minutos</option>
        <option value="01:00:00">1 Hora</option>

    </select>
    <select id="horarios da consulta"></select>

    <script>
        function Teste() {
            var decalage = +1
            var decalage_minute = 50

            var d = new Date(); //date

            //convert date timestamp
            function decalage_f(date, decalage, decalage_minute) {
                var data = new Date(date.getTime() + (decalage * 60 * 60 * 1e3) + (decalage_minute * 60 * 1e3));
                return data;
            }

            var data = decalage_f(d, decalage, decalage_minute);

            alert(data.getHours() + ":" + data.getMinutes());
        }

        function getHorarios() {
            var tempoPorConsulta = document.getElementById('horarios');
            console.log(tempoPorConsulta.value);
            calculaHorarios(tempoPorConsulta.value);
        }

        function calculaHorarios(tempoEntreConsulta) {

            let duracao = tempoEntreConsulta.split(':');
            let data = Date('H:i:s');
            console.log(duracao);
            console.log(data);
            let horarioConsultas = dateAdd(new Date(), 'minute', 30);
            console.log(horarioConsultas);

        }
    </script>
</body>

</html>