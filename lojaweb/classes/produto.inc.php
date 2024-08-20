<?php 
    class Produto{
        private string $nome;
        private $data_fabricacao;
        private float $preco;
        private int $estoque;
        private string $descricao;
        private string $resumo;
        private string $referencia;
        private int $cod_fabricante;

        // function Produto(){}

        function setProduto($nome, $data_fabricacao, $preco, $estoque, $descricao, $resumo, $referencia, $cod_fabricante){
            $this->$nome = $nome;
            $this->$data_fabricacao = strtotime($data_fabricacao);
            $this->$preco = $preco;
            $this->$estoque = $estoque;
            $this->$descricao = $descricao;
            $this->$resumo = $resumo;
            $this->$referencia = $referencia;
            $this->$estoque = $estoque;
        }

        function __set($atrib, $value){
            $this->$atrib = $value;
        }

        public function __get($atrib){
            return $this->$atrib;
        }

        // function setNome($nome){
        //     $this->$nome = $nome;
        // }

        // function setPata_fabricacao($data_fabricacao){
        //     $this->$data_fabricacao = $data_fabricacao;
        // }
        
        // function setPreco($preco){
        //     $this->$preco = $preco;
        // }

        // function setEstoque($estoque){
        //     $this->$estoque = $estoque;
        // }

        // function setDescricao($descricao){
        //     $this->$descricao = $descricao;
        // }
    
        // function setResumo($resumo){
        //     $this->$resumo = $resumo;
        // }
    
        // function setReferencia($referencia){
        //     $this->$referencia = $referencia;
        // }
    
        // function setCod_fabricante($estoque){
        //     $this->$estoque = $estoque;
        // }
    
        // function getNome($nome){
        //     return $this->$nome;
        // }

        // function getPata_fabricacao($data_fabricacao){
        //     return $this->$data_fabricacao;
        // }
        
        // function getPreco($preco){
        //     return $this->$preco;
        // }

        // function getEstoque($estoque){
        //     return $this->$estoque;
        // }

        // function getDescricao($descricao){
        //     return $this->$descricao;
        // }
    
        // function getResumo($resumo){
        //     return $this->$resumo;
        // }
    
        // function getReferencia($referencia){
        //     return $this->$referencia;
        // }
    
        // function getCod_fabricante($estoque){
        //     return $this->$estoque;
        // }
    
    
    
    }

?>