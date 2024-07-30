<?php 
    $servidor = 'localhost';
    $nome_banco = 'livraria';
    $usuario = 'root';
    $senha = '';
    $con = new PDO("mysql:host=$servidor;dbname=$nome_banco",$usuario,$senha);

    // $var = $con->connection_status;

    $opcao = (int)$_REQUEST["opcao"];

    if($opcao == 1){//Incluir
        $con->query("INSERT INTO AUTORES (NOME, EMAIL, DT_NASC) VALUES ('christian', 'email@email.br', '2001-10-17')");
        // $con.
    }
    elseif ($opcao == 2){//Alterar
        $con->query("update autores set nome = 'Batman', email = 'soldado_da_noite@email.bat', dt_nasc = '1990-10-10' where autor_id = 48");
    }
    elseif ($opcao == 3){//Remover
        $con->query("delete from autores where autor_id = 55");
        echo 'Deleção concluida!';
    }
    elseif ($opcao == 4){//Selecionar
        
        $autores = $con->query("SELECT * FROM AUTORES");
        while($autor = $autores->fetch(PDO::FETCH_OBJ)){
            echo "<p>$autor->nome - $autor->email</p>";
        }
    }
    else{
        // busca por email
        $email = $_REQUEST["buscar"];
        $sql = $con->prepare("SELECT * FROM AUTORES WHERE email LIKE CONCAT('%', :email '%')");
        $sql->bindValue(':email', $email);
        
        $sql->execute();

        if($sql->rowCount() > 0){
            // $autor = $sql->fetch(PDO::FETCH_OBJ);
            // echo  "Encontrado: $autor->nome com data de nasc: $autor->dt_nasc";

            while($autor = $sql->fetch(PDO::FETCH_OBJ)){
                echo "<p>$autor->autor_id $autor->nome - $autor->email</p>";
            }            
        }
        
    }
// '') UNION ALL SELECT 1,2,3,4 FROM DUAL#
?>