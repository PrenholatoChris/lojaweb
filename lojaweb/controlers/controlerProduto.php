<?php 
    require_once '../classes/produto.inc.php';
    require_once '../dao/produtoDao.inc.php';
    session_start();

    if(!isset($_REQUEST["pOpcao"])){
        header('Location: ../views/formProduto.php');
    }
    $opcao = (int)$_REQUEST["pOpcao"];

    if($opcao == 1){
        $prd = new Produto();
        $prd->nome = $_REQUEST["pNome"];
        $prd->referencia = $_REQUEST["pReferencia"];
        $prd->preco = $_REQUEST["pPreco"];
        $prd->estoque = $_REQUEST["pEstoque"];
        $prd->descricao = $_REQUEST["pDescricao"];
        $prd->descricao = $_REQUEST["pDataFabricacao"];
        $prd->resumo = $_REQUEST["pResumo"];
        
        $dao = new ProdutoDao();
        $dao->insertProduto($prd);

        header('Location: ../views/exibirProdutos.php');
    }elseif ($opcao ==2) {
        $dao = new ProdutoDao();
        $_SESSION['allProdutos'] = $dao->getAllProdutos();
        header('Location: ../views/exibirProdutos.php');
    }else if($opcao == 3){
        $dao = new ProdutoDao();
        $produto_id = $_REQUEST["produto_id"];
        $dao->deleteProdutoById($produto_id);
        unset($_SESSION['allProdutos']);
        header('Location: ../views/exibirProdutos.php');
    }

?>