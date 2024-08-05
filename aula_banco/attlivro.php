<?php 
$isbn = $_REQUEST["isbn"];
$titulo = $_REQUEST["titulo"];
$edicao_num = $_REQUEST["edicao_num"];
$ano_publicacao = $_REQUEST["ano_publicacao"];
$descricao = $_REQUEST["descricao"];

if(isset($_REQUEST["erro"])){

}

echo " <h1>Atualizacao do Livro</h1>
<form action='conexao.inc.php' method='post'>

    <label for='isbn'>isbn:</label>
    <input type='text' name='isbn' value=$isbn><br>

    <label for='titulo'>titulo:</label>
    <input type='text' name='titulo' value=$titulo><br>

    <label for='edicao_num'>edicao_num:</label>
    <input type='text' name='edicao_num' value=$edicao_num><br>

    <label for='ano_publicacao'>ano_publicacao:</label>
    <input type='text' name='ano_publicacao' value=$ano_publicacao><br>

    <label for='descricao'>descricao:</label>
    <input type='text' name='descricao' value=$descricao><br>
    
    <input type='hidden' name='opcao' value=20>
    
    <button type='submit'>Atualizar</button>
    
    </form>
";
?>