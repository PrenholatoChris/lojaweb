<?php 
    require_once '../dao/fabricanteDao.inc.php';
    $fabricanteDao = new FabricanteDao();
    session_start();

    $opcao = 0;
    if(isset($_REQUEST["pOpcao"])){
        $opcao = $_REQUEST["pOpcao"];
    }
    if($opcao == 1){
        $nome = $_REQUEST["pNome"];
        $logradouro = $_REQUEST["pLogradouro"];
        $cidade = $_REQUEST["pCidade"];
        $cep = $_REQUEST["pCep"];
        $ramo = $_REQUEST["pRamo"];
        $email = $_REQUEST["pEmail"];
        $fabricanteDao->insertFabricante($nome, $logradouro, $cidade, $cep, $ramo, $email);
    }
    else if($opcao == 2){
        $fabricantes = $fabricanteDao->getAllFabricantes();
        $_SESSION["fabricantes"] = $fabricantes;
        header("Location: ../views/formProduto.php");
    }else if($opcao == 3){
        $fabricantes = $fabricanteDao->getAllFabricantes();
        $_SESSION["fabricantes"] = $fabricantes;
        header("Location: ../views/formProdutoAtualizar.php");
    }
    
    

?>