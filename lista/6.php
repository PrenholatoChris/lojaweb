<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        //idade entre 0 e 18
        $idade = 5;

        $peso_normal = (($idade - 6)/4.4) + (2.3*($idade-6)) + 22;
        echo "<h1>Idade = " . $idade . "</h1>";
        echo "<h1>PesoNormal = " . $peso_normal . "</h1>";
    ?>
</body>
</html>