<?php 
require_once 'conexao.inc.php';

class FabricanteDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function getAllFabricantes(){
        $fabricantes = $this->con->query("SELECT * FROM FABRICANTES");
        return $fabricantes->fetchAll(PDO::FETCH_OBJ);
    }

    function insertFabricante($nome, $logradouro, $cidade, $cep, $ramo, $email,){
        $query = $this->con->prepare("INSERT INTO FABRICANTES ( NOME, LOGRADOURO, CIDADE, CEP, TELEFONE, RAMO, EMAIL)
        VALUES (:nome, :logradouro, :cidade, :cep, :telefone, :ramo, :email)");
        $query->bindValue(':nome',$nome);
        $query->bindValue(':logradouro',$logradouro);
        $query->bindValue(':cidade',$cidade);
        $query->bindValue(':cep',$cep);
        $query->bindValue(':ramo',$ramo);
        $query->bindValue(':email',$email);
        $query->execute();
    }
}


?>