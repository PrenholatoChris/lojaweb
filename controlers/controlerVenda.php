<?php 
    require_once '../dao/vendaDao.inc.php';
    require_once '../classes/venda.inc.php';
    
    $opcao = 0;
    if(isset($_REQUEST["pOpcao"])){
        $opcao = $_REQUEST["pOpcao"];
    }


    if($opcao == 1){
        session_start();
        $carrinho = $_SESSION["carrinho"];
        $cliente = $_SESSION["clienteLogado"];
        $total = $_SESSION["total"];

        //Armazena a venda e itens
        $venda = new Venda($cliente->cpf, $total);
        $dao = new VendaDao();
        $dao->incluirVenda($venda, $carrinho);

        
        unset($_SESSION["carrinho"]);
        $tipo = $_REQUEST["pag"];
        if($tipo== "boleto"){
            header("Location: ../views/boleto/meuBoleto.php");
            // echo "Boleto emitido!";
        }else{
            echo "Validar compra com cartão!!!";
        }
        
    }elseif($opcao == 2){
        session_start();
        unset($_SESSION['clienteLogado']);
        header("Location: ../views/index.php");
    }
    
    

?>