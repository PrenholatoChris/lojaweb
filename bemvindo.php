<?php 
    session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boas vindas</title>
</head>
<body>
    <h1>Pagina do usuario</h1>
    
    <h2>Seja Bem-vindo! <?= $_SESSION["nome"]?> 
    </h2>
    <?php 
        $login = $_SESSION["login"];
        $titulo = $_SESSION["titulo"];
        
        echo "<p>Titulo: $titulo</p>";
        echo "<p>Seu login é:<br><strong>$login</strong></p>";
    ?>
</body>
</html>