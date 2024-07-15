<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1</title>
</head>
<body>
    <?php 
        $provas = [1,10,10];
        $total = 0;
        foreach($provas as &$nota){
            $total +=$nota;
        }
        $media = $total/3;
        $aluno = "Christian";

        if($media >=7){
            $resultado = "Aprovado";
        }
        if($media < 7){
            $resultado = "Prova final";
        }
        if($media < 4){
            $resultado = "Reprovado";
        }

        echo "<h1>Aluno: $aluno </h1>";
        echo "<h1>Media: $media </h1>";
        echo "<h1>Resultado: $resultado </h1>";
        
    ?>
</body>
</html>