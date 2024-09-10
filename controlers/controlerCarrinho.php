<?php 
    require_once '../dao/produtoDao.inc.php';
    require_once '../classes/produto.inc.php';
    require_once '../classes/item.inc.php';

    $opcao = (int)$_REQUEST["pOpcao"];

    if($opcao == 1){
        #listar produtos do carrinho
        $produto_id = (int)$_REQUEST["id"];
        $produtoDao = new ProdutoDao();
        $produto = $produtoDao->getProdutoById($produto_id);

        $item = new Item($produto);

        session_start();
        if(isset($_SESSION["carrinho"])){
            $carrinho = $_SESSION["carrinho"];
        }else{
            $carrinho = array();
        }

        $idx = buscaCarrinho($produto->produto_id, $carrinho);
        if($idx != -1){
            $carrinho[$idx]->setQuantidade();
            $carrinho[$idx]->setvalorItem();
        }else{
            $carrinho[] = $item;
        }

        $_SESSION["carrinho"] = $carrinho;
        header("Location: ../views/exibirCarrinho.php");
    }elseif($opcao == 2){
        #tirar um item do carrinho
        $index = $_REQUEST["index"];
        session_start();
        $carrinho = $_SESSION['carrinho'];
        unset($carrinho[$index]);
        sort($carrinho);
        $_SESSION['carrinho'] = $carrinho;
        header("Location: controlerCarrinho.php?pOpcao=4");

    }elseif($opcao == 3){
        #limpar carrinho
        session_start();
        unset($_SESSION['carrinho']);
        header("Location: controlerCarrinho.php?pOpcao=4");
    }elseif($opcao == 4){
        #verifica carrinho vazio
        session_start();
        if(!isset($_SESSION['carrinho']) || sizeof($_SESSION['carrinho'])==0){
            header('Location: ../views/exibirCarrinho.php?status=1');
        }else{
            header('Location: ../views/exibirCarrinho.php');
        }
    }elseif($opcao ==5){
        #finaliza carrinho
        session_start();
        $total = $_REQUEST["total"];
        $_SESSION['total'] = $total;

        if(isset($_SESSION["clienteLogado"])){
            header('Location: ../views/dadosCompra.php');
        }else{
            header('Location: ../views/formLogin.php');
        }
    }

    function buscaCarrinho($produtoId, $vetor){
        $index = -1;
        for($i=0; $i<count($vetor); $i++){
            if ($produtoId == $vetor[$i]->getProduto()->produto_id) {
                $index = $i;
                break;
            }
        }
        return $index;
    }




?>