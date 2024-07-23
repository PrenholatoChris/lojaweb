<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require "classes.php";

    ?>
    <h1>Nome: <?= $obj->nome ?></h1>
    <h1>Login: <?= $obj->login ?></h1>
    <h1>Email: <?= $obj->email ?></h1>

    <h1>Senha valida: 
        <?= $obj->isSenhaValid() ? "valida" : "não valida"; ?>
    </h1>

    <h1>Login valido: 
        <?= $obj->isLoginValid() ? "valido" : "não valido"; ?>
    </h1>

    <h1>Login efetuado: 
        <?= $obj->doLogin("chrs","1234") ? "efetuado" : "não efetuado"; ?>
    </h1>


</body>
</html>