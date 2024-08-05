<?php 
    class Conexao{
        private $servidor_mysql = 'localhost';
        private $nome_banco = 'livraria';
        private $usuario = 'root';
        private $senha = ''; 
        private $con;

        public function getConexao(){
            $this->con = new PDO("mysql:host=$this->servidor_mysql;dbname=$this->nome_banco","$this->usuario","$this->senha");
            return $this->con;
        }
    }

    $con = new Conexao();
    $con = $con->getConexao();
    if(isset($_REQUEST["opcao"])){
        $opcao = (int)$_REQUEST["opcao"];
    }
    

    if($opcao == 1){//Incluir
        $isbn = $_REQUEST["isbn"];
        $titulo = $_REQUEST["titulo"];
        $edicao_num = $_REQUEST["edicao_num"];
        $ano_publicacao = $_REQUEST["ano_publicacao"];
        $descricao = $_REQUEST["descricao"];
        
        $sql = $con->prepare("INSERT INTO LIVROS (ISBN, TITULO, EDICAO_NUM, ANO_PUBLICACAO, DESCRICAO) VALUES (:isbn, :titulo, :edicao_num, :ano_publicacao, :descricao)");
        $sql->bindValue(":isbn",$isbn);
        $sql->bindValue(":titulo",$titulo);
        $sql->bindValue(":edicao_num",$edicao_num);
        $sql->bindValue(":ano_publicacao",$ano_publicacao);
        $sql->bindValue(":descricao",$descricao);
        $sql->execute();

        echo "<h1>Livro $titulo cadastrado</h1>
            <a href='1.php'>Voltar ao inicio</a>";
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
            $autor = $sql->fetch(PDO::FETCH_OBJ);
            echo  "Encontrado: $autor->nome com data de nasc: $autor->dt_nasc";

            while($autor = $sql->fetch(PDO::FETCH_OBJ)){
                echo "<p>$autor->autor_id $autor->nome - $autor->email</p>";
            }            
        }
        
    }
?>