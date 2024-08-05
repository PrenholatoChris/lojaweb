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
        $isbn = $_REQUEST["isbn"];
        $sql = $con->prepare("select * from livros where ISBN = :isbn");
        $sql->bindValue(":isbn",$isbn);
        $sql->execute();
        if($sql->rowCount() == 1){
            $livro = $sql->fetch(PDO::FETCH_OBJ);
            header("Location: attlivro.php?isbn=$isbn&titulo=$livro->titulo&edicao_num=$livro->edicao_num&ano_publicacao=$livro->ano_publicacao&descricao=$livro->descricao");
        }else{
            header("Location: attlivro.php?erro=1");
        }


    }
    elseif ($opcao == 20){//Alterar
        $isbn = $_REQUEST["isbn"];
        $titulo = $_REQUEST["titulo"];
        $edicao_num = $_REQUEST["edicao_num"];
        $ano_publicacao = $_REQUEST["ano_publicacao"];
        $descricao = $_REQUEST["descricao"];

        $sql = $con->prepare("UPDATE LIVROS SET ISBN = :isbn, TITULO = :titulo, EDICAO_NUM = :edicao_num, ANO_PUBLICACAO = :ano_publicacao, DESCRICAO = :descricao WHERE ISBN = :isbn");
        $sql->bindValue(":isbn",$isbn);
        $sql->bindValue(":titulo",$titulo);
        $sql->bindValue(":edicao_num",$edicao_num);
        $sql->bindValue(":ano_publicacao",$ano_publicacao);
        $sql->bindValue(":descricao",$descricao);
        $sql->execute();

        header("Location: 1.php");
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