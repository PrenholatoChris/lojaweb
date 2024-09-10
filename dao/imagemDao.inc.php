<?php 
require_once 'conexao.inc.php';
require_once '../classes/produto.inc.php';
require_once '../utils/funcoesUteis.php';

class ImagemDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this->con = $c->getConexao();
    
    }

    function getAllImagens(){
        $produtos = $this->con->query("SELECT * FROM imagens");
        return $produtos->fetchAll(PDO::FETCH_OBJ);
    }

    function insertImagem($produto_id, $imagem, $image_type, $image_name){
        $query = $this->con->prepare("INSERT INTO imagens (produto_id, imagem, image_type, image_name)
        VALUES (:produto_id, :imagem, :image_type, :image_name)");
        $query->bindValue(':produto_id',$produto_id);
        $query->bindValue(':imagem',$imagem);
        $query->bindValue(':image_type',$image_type);
        $query->bindValue(':image_name',$image_name);
        $query->execute();
    }
    
    function getImageByProdutoId($produto_id){
        $query = $this->con->prepare("SELECT * FROM imagens where produto_id = :produto_id");
        $query->bindValue(":produto_id",$produto_id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}


?>


