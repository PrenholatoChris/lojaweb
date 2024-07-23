<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form do Usuario</title>
</head>
<body>
    <h1>Formulário</h1>
    <form action="processaUsuario.php" method="get">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome"><br>
        <br>

        <label for="login">Login:</label><br>
        <input type="text" name="login"><br>
        <br>  
        
        <label for="email">Email:</label><br>
        <input type="text" name="email"><br>
        <br>  

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha"><br>
        <br>  
        <button type="submit">Confirmar</button>
    </form>

</body>
</html>