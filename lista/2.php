<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $preco = array(
            "1001" => 5.32,
            "1324" => 6.45,
            "6548" => 2.37,
            "0987" => 5.32,
            "7623" => 6.45,

        );
        
        $item = "1001";
        $quantidade = 8;
        echo "<h1>Item: " . $item . "</h1>";
        echo "<h1>Preço unitario: " . $preco[$item] . "</h1>";
        echo "<h1>Quantidade: " . $quantidade . "</h1>";
        echo "<h1>Valor total= " . $preco[$item] * $quantidade . "</h1>";
        
    ?>
</body>
</html>