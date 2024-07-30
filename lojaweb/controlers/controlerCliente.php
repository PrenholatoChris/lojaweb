<?php 
    require_once '../dao/clienteDao.inc.php';
    
    $email = $_REQUEST["pEmail"];
    $senha = $_REQUEST["pSenha"];
    $opcao = $_REQUEST["pOpcao"];

    $clienteDao = new ClienteDao();
    if($opcao == 1){
        session_start();
        $cliente = $clienteDao->autenticar($email,$senha);
        if($cliente != null){
            $_SESSION["cliente"] = serialize($cliente);
            header("Location: ../views/exibirProdutos.php");
        }else{
            header("Location: ../views/formLogin.php?erro=1");
        }
    }
    
    

?>