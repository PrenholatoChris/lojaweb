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
        $prd->data_fabricacao = $_REQUEST["pDataFabricacao"];
        $prd->resumo = $_REQUEST["pResumo"];
        
        $dao = new ProdutoDao();
        $dao->insertProduto($prd);
        header('Location: controlerFabricante.php?pOpcao=1');
    }elseif ($opcao ==2 || $opcao == 6) {
        $dao = new ProdutoDao();
        $_SESSION['allProdutos'] = $dao->getAllProdutos();
        if($opcao==2){
            header('Location: ../views/exibirProdutos.php');
        }elseif ($opcao==6) {
            header('Location: ../views/produtosVenda.php');
        }
    }else if($opcao == 3){
        $dao = new ProdutoDao();
        $produto_id = $_REQUEST["produto_id"];
        $dao->deleteProdutoById($produto_id);
        unset($_SESSION['allProdutos']);
        header('Location: ../views/exibirProdutos.php');
    }else if($opcao == 4){
        $dao = new ProdutoDao();
        $id = $_REQUEST["pId"];
        $produto = $dao->getProdutoById($id);
        $_SESSION['produto'] = $produto;
        header('Location: controlerFabricante.php?pOpcao=3');
    }else if($opcao == 5){#atualizar
        $prd = new Produto();
        $prd->produto_id = $_REQUEST["pId"];
        $prd->nome = $_REQUEST["pNome"];
        $prd->referencia = $_REQUEST["pReferencia"];
        $prd->preco = $_REQUEST["pPreco"];
        $prd->estoque = $_REQUEST["pEstoque"];
        $prd->descricao = $_REQUEST["pDescricao"];
        $prd->data_fabricacao = $_REQUEST["pDataFabricacao"];
        $prd->resumo = $_REQUEST["pResumo"];
        $prd->cod_fabricante = $_REQUEST["pFabricante"];

        $dao = new ProdutoDao();
        $dao->atualizarProduto($prd);
        header('Location: controlerProduto.php?pOpcao=2');
    }

?>