<?php 
    $servidor = 'localhost';
    $nome_banco = 'livraria';
    $usuario = 'root';
    $senha = '';
    $con = new PDO("mysql:host=$servidor;dbname=$nome_banco",$usuario,$senha);

    // $var = $con->connection_status;
    echo "Conexão Ok! = $var";

    $opcao = $_REQUEST["opcao"];

    if($opcao == '1'){//Incluir

    }
    elseif ($opcao == '2'){//Alterar

    }
    elseif ($opcao == '3'){//Remover

    }
    elseif ($opcao == '4'){//Selecionar um

    }
    else{
        // busca por email

    }

?>