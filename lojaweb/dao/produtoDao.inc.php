<?php 
require_once 'conexao.inc.php';
require_once '../classes/produto.inc.php';
require_once '../utils/funcoesUteis.php';

class ClienteDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    function getAllProdutos(){
        $produtos = $this->con->query("SELECT * FROM PRODUTOS");
        return $produtos->fetch(PDO::FETCH_ASSOC);
    }

    function insertProduto(Produto $produto){
        $query = $this->con->prepare("INSERT INTO PRODUTOS ( NOME, DATA_FABRICACAO, PRECO, ESTOQUE, DESCRICAO, RESUMO, REFERENCIA, COD_FABRICANTE)
        VALUES (:nome, :data_fabricacao, :preco, :estoque, :descricao, :resumo, :referencia, :cod_fabricante)");
        $query->bindValue(':nome',$produto->nome);
        $query->bindValue(':data_fabricacao', converterDataToMysql($produto->data_fabricacao));
        $query->bindValue(':preco',$produto->preco);
        $query->bindValue(':estoque',$produto->estoque);
        $query->bindValue(':descricao',$produto->descricao);
        $query->bindValue(':resumo',$produto->resumo);
        $query->bindValue(':referencia',$produto->referencia);
        $query->bindValue(':cod_fabricante',1000);//$produto->cod_fabricante);
        $query->execute();

        // $query->bindValue(':data_fabricacao',$data_fabricacao);
        // $query->bindValue(':preco',$preco);
        // $query->bindValue(':estoque',$estoque);
        // $query->bindValue(':descricao',$descricao);
        // $query->bindValue(':resumo',$resumo);
        // $query->bindValue(':referencia',$referencia);
        // $query->bindValue(':cod_fabricante',$cod_fabricante);
        
    }
}


?>