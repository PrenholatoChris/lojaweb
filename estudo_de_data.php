<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>teste</h1>    

    <h2>

        <?php
            $data = date('d/M/Y h:i:s A');
            echo "$data"; 
            
            #$milissegundo = 1;
            $segundo = 1;#segundo 000 * $milissegundo;
            $minuto = 60 * $segundo;
            $hora = 60 * $minuto;
            $dia = 24 * $hora;
            $mes = 30 * $dia;
            $ano = 365 * $dia + 6* $hora;
            $ano_inicio = 1970;
            $ano_hj = 2024;
            
            // $meu_timestamp = ($ano_hj - $ano_inicio) * $ano + 6 * $mes + 16 * $dia + 12 * $hora + 6 * $minuto;
            $meu_timestamp = ($ano_hj - $ano_inicio) * $ano + (6 * $mes_hj) + 16 * $dia_hj + 12 * $hora + 6 * $minuto;
            
            echo"<h1>timestamp: " . time() ."</h1>";
            echo"<h1>Meu timestamp:$meu_timestamp</h1>";

            $hoje = time();
            $dia_hj = date('d',$hoje);
            $mes_hj = date('m',$hoje);
            $tempo_hj = gettimeofday($hoje);
            echo"<h1>$dia_hj</h1>";
            echo"<h1>$mes_hj</h1>";
            echo"<h1>$tempo_hj</h1>";

            date_default_timezone_set('America/Sao_Paulo');
            echo "<br>". strftime('%A, %d de %B de %Y',$hoje);
            echo "<br>Hoje: " . date('d/m/Y A h:i:s A', time())
        ?>

    </h2>

    <h3> <?= "Amanhã: " . date('d/m/Y',strtotime("tomorrow")) ?></h3>
    <h3> <?= "Hoje: " . date('d/m/Y',strtotime("today")) ?></h3>


    <?php 
        $DT = new DateTime();
        $DT->modify("next friday");
        $DT = $DT->format('d/m/Y');
        echo "<p>$DT</p>";
    ?>
</body>
</html>