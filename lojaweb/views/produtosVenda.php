
<?php
      include_once 'includes/cabecalho.inc.php';
?>
<h1 class="text-center">Show room de produtos</h1>
<p> 

<div class="row row-cols-1 row-cols-md-5 g-4">

<?php
  //percurso inicia aqui  
  $produtos = $_SESSION["allProdutos"];
  // $fabricantes = $_SESSION["fabricantes"];
  foreach($produtos as $index => $produto){
?>

<div class="col">
    <div class="card">
      <img src="imagens/produtos/produto.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?= $produto->nome ?></h5>
        <p class="card-text"><?= $produto->resumo ?></p>
        <h6 class="card-text text-end"><?= $produto->nome_fabricante ?></h6>
        <h4 class="card-title">R$ <?= $produto->preco ?></h4>
        <div class="text-end"><?php echo "<a href='../controlers/controlerCarrinho.php?pOpcao=1&id=$produto->produto_id' class='btn btn-danger'>Comprar</a>" ?></div>        
      </div>
    </div>
</div>



  <?php

  }
    // percurso termina aqui
    ?>
</div>

<?php require_once "includes/rodape.inc.php" ?>
