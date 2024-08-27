<?php 
    require_once '../dao/produtoDao.inc.php';

    if(isset($_REQUEST["pOpcao"])){
        $opcao = (int)$_REQUEST["pOpcao"];
    }else{
        header('Location: ../views/produtosVenda.php');
    }

    #listar
    if($opcao == 1){
        $produto_id = (int)$_REQUEST["id"];
        $produtoDao = new ProdutoDao();
        $produto = $produtoDao->getProdutoById($produto_id);

        session_start();
        if(isset($_SESSION["carrinho"])){
            $carrinho = $_SESSION["carrinho"];
        }else{
            $carrinho = array();
        }

        $carrinho[] = $produto;

        $_SESSION["carrinho"] = $carrinho;
        header("Location: ../views/exibirCarrinho.php");
    }
    else if($opcao = 2){
        unset($_SESSION["carrinho"]);
        header("Location: ../views/exibirCarrinho.php");
    }





?>