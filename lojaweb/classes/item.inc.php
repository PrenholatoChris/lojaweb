<?php 

class Item{
    private int $quantidade;
    private float $valorItem;
    private Produto $produto;


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
        // $this->setvalorItem();
    }

    public function getProduto(){
        return $this->produto;
    }

}

?>