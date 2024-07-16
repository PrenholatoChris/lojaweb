<?php 
    $nome = $_REQUEST['vNome'];
    $login = $_REQUEST['vLogin'];
    $senha = $_REQUEST['vSenha'];

    if($login == "labweb" && $senha == "lab1234"){
        session_start();
        $_SESSION['titulo'] = "Laboratório Lab web";
        $_SESSION['login'] = $login;
        $_SESSION['nome'] = $nome;
        header("Location: bemvindo.php");
    }
    else{
        echo "Login incorreto! Voltar!";
        sleep(2);
        header("Location: form.html");
    }
?>
