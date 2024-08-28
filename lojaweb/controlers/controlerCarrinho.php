<?php 
    require_once '../dao/produtoDao.inc.php';

    $opcao = (int)$_REQUEST["pOpcao"];
    // if(isset($_REQUEST["pOpcao"])){
    // }else{
    // header('Location: ../views/produtosVenda.php');
    // }

    if($opcao == 1){
        #listar produtos do carrinho
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
    }elseif($opcao = 2){
        #limpar carrinho
        session_start();
        unset($_SESSION['carrinho']);
        // $_SESSION["carrinho"] = array();
        header("Location: ../views/exibirCarrinho.php");
        // }
    }





?>