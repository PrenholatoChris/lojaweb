<?php 
    require_once '../dao/clienteDao.inc.php';
    $clienteDao = new ClienteDao();
    $opcao = 0;
    if(isset($_REQUEST["pOpcao"])){
        $opcao = $_REQUEST["pOpcao"];
    }
    if($opcao == 1){
        $email = $_REQUEST["pEmail"];
        $senha = $_REQUEST["pSenha"];
        session_start();
        $cliente = $clienteDao->autenticar($email,$senha);
        if($cliente != null){
            $_SESSION["clienteLogado"] = $cliente;
            header("Location: ../controlers/controlerProduto.php?pOpcao=2");
        }else{
            header("Location: ../views/formLogin.php?erro=1");
        }
    }elseif($opcao == 2){
        session_start();
        unset($_SESSION['clienteLogado']);
        header("Location: ../views/index.php");
    }
    
    

?>