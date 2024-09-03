<?php
     require_once '../classes/item.inc.php';
     require_once 'includes/cabecalho.inc.php';
    
?>

<h1 class="text-center">Carrinho de compra</h1>
<p> 
<?php

     $carrinho = [];
     if(isset($_REQUEST['status'])){
            include_once '../views/includes/carrinhoVazio.inc.php';
     }else{
            $carrinho = $_SESSION["carrinho"];
     

?>
<div class="table-responsive">
<table class="table table-ligth table-striped">
      <thead class="table-danger">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">Item No</th>
                <th>Ref.</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Qde.</th>
                <th>Total</th>                
                <th>Remover</th>
            </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php        
            $soma = 0;
            $count = 0;
            $count++;
            
            foreach ($carrinho as $item) {
      ?>
            <tr class="align-middle" style="text-align: center">
                  <td><?= $count ?></td>
                  <td><?= $item->getProduto()->produto_id ?></td>
                  <td><?= $item->getProduto()->nome ?></td>
                  <td><?= $item->getProduto()->nome_fabricante ?></td>
                  <td><?= $item->getProduto()->preco ?></td>
                  <td><?= $item->getQuantidade() ?></td>
                  <td>R$ <?=$item->getValorItem() ?></td>
                  <td><a href="../controlers/controlerCarrinho.php?pOpcao=2&index=<?=$count-1?>" class='btn btn-danger btn-sm'>X</a></td>
            </tr>
      <?php
            $soma += $item->getValorItem();

            }
      ?>
         
            <tr align="right"><td colspan="8"><font face="Verdana" size="4" color="red"><b>Valor Total = R$ <?= $soma ?></b></font></td></tr>
      </table> 
      <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-warning" role="button" href="../controlers/controlerProduto.php?pOpcao=6"><b>Continuar comprando</b></a>
                  </div>
                  <div class="col">
                        <a class="btn btn-danger" role="button" href="../controlers/controlerCarrinho.php?pOpcao=3"><b>Esvaziar carrinho</b></a>
                  </div>
                  <div class="col">
                        <!-- <?php 
                              // if(isset($_SESSION['clienteLogado'])){
                              //       echo "<a class='btn btn-success' role='button' href='" . "./dadosCompra.php" . "'><b>Finalizar compra</b></a>";           
                              // }else{
                              //       echo "<a class='btn btn-success' role='button' href='" . "./formLogin.php" . "'><b>Finalizar compra</b></a>";           
                              // }
                        ?> -->

                        <a class='btn btn-success' role='button' href='../controlers/controlerCarrinho.php?pOpcao=5&total=<?=$soma?>'><b>Finalizar compra</b></a>
                  </div>
            </div>
      </div>

<?php
     }
     require_once 'includes/rodape.inc.php';
?>