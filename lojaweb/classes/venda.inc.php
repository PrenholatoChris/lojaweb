<?php 

class Venda{
    private $id_venda;
    private $cpf;
    private $valorTotal;
    private $data;

    function Venda($cpf, $valor){
        $this->cpf = $cpf;
        $this->valorTotal = $valor;
        $this->data = time();
    }

    function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }
}

?>