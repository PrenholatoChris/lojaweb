<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste com BD e PHP</title>
</head>
<body>
    
    <div align="center">
        <a href="formLivro.php?opcao=1">incluir</a>
        <a href="formLivro.php?opcao=2">Atualizar</a>
        <a href="formLivro.php?opcao=3">Excluir</a>
        <a href="formLivro.php?opcao=4">Selecionar</a>
        <hr width="50%">

        <form action="formLivro.php" method="post">
            <label for="buscar">Buscar Autor(email):</label>
            <input size="40" name="buscar" type="text">
            <input type="hidden" name="opcao" value="5">
            <p><button type="submit">Buscar</button></p>
        </form>
    </div>
    <?php 
        $erro = 0;
        if(isset($_REQUEST["erro"])){
            $erro = (int)$_REQUEST["erro"];
        }
        if($erro == 1){
            echo "Erro ao realizar a ação";
        }
        
    ?>

</body>
</html>