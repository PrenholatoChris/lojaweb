<?php 
require_once 'conexao.inc.php';
require_once '../classes/produto.inc.php';
require_once '../utils/funcoesUteis.php';

class ProdutoDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    
    }

    function sqlToClass($row){
        $produto = new Produto();
        $produto->produto_id = $row->produto_id;
        $produto->nome = $row->nome;
        $produto->data_fabricacao = converterDataFromMySql($row->data_fabricacao);
        $produto->preco = $row->preco;
        $produto->estoque = $row->estoque;
        $produto->descricao = $row->descricao;
        $produto->resumo = $row->resumo;
        $produto->referencia = $row->referencia;
        $produto->cod_fabricante = $row->cod_fabricante;
        return $produto;
    }

    function getProdutoById($id){
        $produto = $this->con->query("SELECT * FROM PRODUTOS WHERE PRODUTO_ID = $id");
        $prd = $produto->fetch(PDO::FETCH_OBJ);
        // $prd = $this->sqlToClass($prd);
        
        return $prd;
    }

    function getAllProdutos(){
        $produtos = $this->con->query("SELECT * FROM PRODUTOS");
        return $produtos->fetchAll(PDO::FETCH_OBJ);
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
        
    }
    function deleteProdutoById($produto_id){
        $query = $this->con->prepare("DELETE FROM PRODUTOS WHERE PRODUTO_ID = :id");
        $query->bindValue(':id',$produto_id);
        $query->execute();
    }
    
    function deleteProduto(Produto $produto){
        $query = $this->con->prepare("DELETE FROM PRODUTOS WHERE PRODUTO_ID = :id");
        $query->bindValue(':id',$produto->id);
        $query->execute();
    }

    function atualizarProduto(Produto $produto){
        $query = $this->con->prepare("UPDATE PRODUTOS SET NOME = :nome, DATA_FABRICACAO = :data_fabricacao, PRECO = :preco, ESTOQUE = :estoque, DESCRICAO = :descricao, RESUMO = :resumo, REFERENCIA = :referencia, COD_FABRICANTE = :cod_fabricante");
        $query->bindValue(':nome',$produto->nome);
        $query->bindValue(':data_fabricacao', converterDataToMysql($produto->data_fabricacao));
        $query->bindValue(':preco',$produto->preco);
        $query->bindValue(':estoque',$produto->estoque);
        $query->bindValue(':descricao',$produto->descricao);
        $query->bindValue(':resumo',$produto->resumo);
        $query->bindValue(':referencia',$produto->referencia);
        $query->bindValue(':cod_fabricante',$produto->cod_fabricante);
        $query->execute();
    }
}


?>