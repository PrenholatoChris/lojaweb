<?php 
    require_once '../dao/imagemDao.inc.php';

    $produto_id = (int)$_REQUEST["produto_id"];

    $dao = new ImagemDao();
    // $img = $dao->getImageByProdutoId($produto_id);
    $img = $dao->getImageByProdutoId(336);

    if ($img) {
        header("Content-Type: " . $img->image_type);
        header("Content-Length:".strlen($img->imagem));
        // Exibe a imagem
        echo $img->imagem;
    } else {
        header("Content-Type: text/plain");
        echo "Imagem não encontrada.";
    }
?>