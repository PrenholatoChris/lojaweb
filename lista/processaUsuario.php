<?php 
    require "classes.php";

    $nome = $_REQUEST["nome"];
    $login = $_REQUEST["login"];
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];

    $newUser = new Usuario($nome, $login, $email, $senha);

    session_start();
    $_SESSION["$email"] = $newUser;

    echo "<script>alert('Cadastro efetuado com sucesso!');</script>";

?>