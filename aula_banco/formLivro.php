
<div align="center">
    <h1>Dados do livro:</h1>
<?php 
    if(isset($_REQUEST["opcao"])){
        $opcao = (int)$_REQUEST["opcao"];
    }

    if($opcao == 1){
        echo '
        <form action="conexao.inc.php" method="post">
            <label for="isbn">isbn:</label>
            <input type="text" name="isbn"><br>

            <label for="titulo">titulo:</label>
            <input type="text" name="titulo"><br>

            <label for="edicao_num">edicao_num:</label>
            <input type="text" name="edicao_num"><br>

            <label for="ano_publicacao">ano_publicacao:</label>
            <input type="text" name="ano_publicacao"><br>

            <label for="descricao">descricao:</label>
            <input type="text" name="descricao"><br>
            
            <input type="hidden" name="opcao" value=1>
            <button type="submit">Cadastrar</button>

        </form>
        ';

    }
    elseif ($opcao == 2) {
        echo '<form action="conexao.inc.php" method="post">
            <label for="isbn">isbn:</label>
            <input type="text" name="isbn"><br><br>
            <input type="hidden" name="opcao" value=2>

            <button type="submit">Buscar</button>

        </form>';
    }



?>

</div>