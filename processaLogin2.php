<?php 
    $nome = $_REQUEST['vNome'];
    $login = $_REQUEST['vLogin'];
    $senha = $_REQUEST['vSenha'];

    if($login == "labweb" && $senha == "lab1234"){
        session_start();
        setcookie('titulo',"Laboratório Lab web");
        setcookie('login',$login);
        setcookie('nome',$nome);
        
        header("Location: bemvindo2.php");
    }
    else{
        echo "Login incorreto! Voltar!";
        sleep(2);
        header("Location: form.html");
    }
    

?>
