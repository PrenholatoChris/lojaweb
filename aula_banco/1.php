<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste com BD e PHP</title>
</head>
<body>
    
    <div align="center">
        <a href="conexao.php?opcao=1">incluir</a>
        <a href="conexao.php?opcao=2">Atualizar</a>
        <a href="conexao.php?opcao=3">Excluir</a>
        <a href="conexao.php?opcao=4">Selecionar um</a>
        <hr width="50">

        <form action="">
            <label for="buscar">Buscar Autor(email):</label>
            <input size="40" name="buscar" type="text">
            <input type="hidden" name="opcao" value="5">
            <p><button type="submit">Buscar</button></p>
        </form>
    </div>

</body>
</html>