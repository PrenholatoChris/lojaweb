<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $pe_inicio = 3;
        $pe_fim = 30;
        $converter_p_m = 3.25;
        
    
        echo "<table border = 1>
                <tr>
                <th>Pé</th>
                <th>Metro</th>
                </tr>
            ";
        $ano = 0;
        for ($i=$pe_inicio; $i <= $pe_fim; $i+=3) { 
            $pe = $i;
            $pe_em_metro = $pe * $converter_p_m;
            echo "<tr>
                <td>$pe</td> 
                <td>$pe_em_metro</td> 
            </tr>";

        }
        echo "</table>"
    ?>
</body>
</html>