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

    function toClass($row){
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
        $produto->nome_fabricante = $row->nome_fabricante;
        return $produto;
    }

    function getProdutoById($id){
        $produto = $this->con->query("SELECT *, (select NOME FROM FABRICANTES WHERE CODIGO = PRODUTOS.COD_FABRICANTE) AS nome_fabricante FROM PRODUTOS WHERE PRODUTO_ID = $id");
        $prd = $produto->fetch(PDO::FETCH_OBJ);
        $prd = $this->toClass($prd);
        
        return $prd;
    }

    function getAllProdutos(){
        $produtos = $this->con->query("SELECT *, (select NOME FROM FABRICANTES WHERE CODIGO = PRODUTOS.COD_FABRICANTE) AS nome_fabricante FROM PRODUTOS");
        return $produtos->fetchAll(PDO::FETCH_OBJ);
    }

    function insertProduto(Produto $produto){
        $query = $this->con->prepare("INSERT INTO PRODUTOS ( NOME, DATA_FABRICACAO, PRECO, ESTOQUE, DESCRICAO, RESUMO, REFERENCIA, COD_FABRICANTE)
        VALUES (:nome, :data_fabricacao, :preco, :estoque, :descricao, :resumo, :referencia, :cod_fabricante)");
        $query->bindValue(':nome',$produto->nome);
        $query->bindValue(':data_fabricacao', ($produto->data_fabricacao));
        $query->bindValue(':preco',$produto->preco);
        $query->bindValue(':estoque',$produto->estoque);
        $query->bindValue(':descricao',$produto->descricao);
        $query->bindValue(':resumo',$produto->resumo);
        $query->bindValue(':referencia',$produto->referencia);
        $query->bindValue(':cod_fabricante',$produto->cod_fabricante);
        $query->execute();
    }

    function getUltimoId(){
        $query = $this->con->query("SELECT MAX(produto_id) as produto_id FROM produtos");
        $prd = $query->fetch(PDO::FETCH_OBJ);
        return (int)$prd->produto_id;
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
        $query = $this->con->prepare("UPDATE PRODUTOS SET NOME = :nome, DATA_FABRICACAO = :data_fabricacao, PRECO = :preco, ESTOQUE = :estoque, DESCRICAO = :descricao, RESUMO = :resumo, REFERENCIA = :referencia, COD_FABRICANTE = :cod_fabricante
        WHERE PRODUTO_ID = :id");
        $query->bindValue(':id',$produto->produto_id);
        $query->bindValue(':nome',$produto->nome);
        $query->bindValue(':data_fabricacao', $produto->data_fabricacao);
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