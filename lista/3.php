<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php 
        $valor_inicial = 28000;
        $depreciacao = 4000;
        $depreciacao_total = 0;
        $valor = $valor_inicial;
        echo "<table>
                <tr>
                <th>Ano</th>
                <th>Depreciacao</th>
                <th>Valor no fim do ano</th>
                <th>Depreciação acumulada</th>
                </tr>
            ";
        $ano = 0;
        for ($i=0; $i <7 ; $i++) { 
            $ano+=1;
            $valor -= $depreciacao;
            $depreciacao_total+=$depreciacao;
            echo "<tr>
                <td>$ano</td> 
                <td>$depreciacao</td> 
                <td>$valor</td> 
                <td>$depreciacao_total</td> 
            </tr>";

        }
        echo "</table>"
    ?>
</body>
</html>