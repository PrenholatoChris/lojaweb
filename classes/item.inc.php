<?php 

require_once 'produto.inc.php';
class Item{
    private int $quantidade;
    private float $valorItem;
    private Produto $produto;

    function __construct($produto){
        $this->quantidade = 1;
        $this->produto = $produto;
        $this->valorItem = $produto->preco;
    }

    public function getValorItem(){
        return $this->valorItem;
    }

    public function setvalorItem(){
        $this->valorItem = $this->quantidade * $this->produto->preco;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade(){
        $this->quantidade++;
    }

    public function getProduto(){
        return $this->produto;
    }

}

?>