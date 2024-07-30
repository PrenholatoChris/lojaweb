<?php 
require_once 'conexao.inc.php';

class ClienteDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function autenticar($email, $senha){
        $query = $this->con->prepare("SELECT * FROM CLIENTES WHERE EMAIL = :email AND SENHA = :senha");
        $email = strtolower($email);
        $senha = strtolower($senha);

        $query->bindValue(":email",$email);
        $query->bindValue(":senha",$senha);
        $query->execute();

        $cliente = null;
        if($query->rowCount() == 1){
            $cliente = $query->fetch(PDO::FETCH_ASSOC);
        }
        
        return $cliente;
    }

    function getAllClientes(){
        $clientes = $this->con->query("SELECT * FROM CLIENTES");
        return $clientes->fetch(PDO::FETCH_ASSOC);
    }

    function insertCliente($cnpj, $nome, $logradouro, $cidade, $estado, $cep, $telefone, $data_nascimento, $email, $senha, $rg, $tipo){
        $query = $this->con->prepare("INSERT INTO CLIENTE (CNPJ, NOME, LOGRADOURO, CIDADE, ESTADO, CEP, TELEFONE, DATA_NASCIMENTO, EMAIL, RG, TIPO)
        VALUES (:cnpj, :nome, :logradouro, :cidade, :estado, :cep, :telefone, :data_nascimento, :email, :senha, :rg, :tipo)");
        $query->bindValue(':cnpj',$cnpj);
        $query->bindValue(':nome',$nome);
        $query->bindValue(':logradouro',$logradouro);
        $query->bindValue(':cidade',$cidade);
        $query->bindValue(':estado',$estado);
        $query->bindValue(':cep',$cep);
        $query->bindValue(':telefone',$telefone);
        $query->bindValue(':data_nascimento',$data_nascimento);
        $query->bindValue(':email',$email);
        $query->bindValue(':rg',$rg);
        $query->bindValue(':tipo',$tipo);
    }
}


?>