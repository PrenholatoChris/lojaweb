
<?php
    require_once 'includes/cabecalho.inc.php';
    require_once '../utils/funcoesUteis.php';
    require_once '../classes/produto.inc.php';
    $prd = new Produto();
    $prd = $_SESSION['produto'];
?>
<p>
<h1 class="text-center">Alteração de produto</h1>
<p> 

<form class="row g-3" action="../controlers/controlerProduto.php?pOpcao=5" method="post">

<div class="col-md-2">
    <label for="pId" class="form-label">ID</label>
    <input type="text" class="form-control" name="pId" value="<?= $prd->produto_id ?>" readonly>
  </div>  
<div class="col-md-3">
    <label for="pReferencia" class="form-label">Nº Referencia</label>
    <input type="text" class="form-control" name="pReferencia" value="<?= $prd->referencia ?>" readonly>
  </div>
  <div class="col-md-7">
    <label for="pNome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="pNome" value="<?= $prd->nome ?>">
  </div>
  <div class="col-md-3">
    <label for="pPreco" class="form-label">Preço</label>
    <input type="text" class="form-control" name="pPreco" value="<?= $prd->preco ?>">
  </div>
  <div class="col-md-3">
    <label for="pDataFabricacao" class="form-label">Data de fabricação</label>
    <input type="date" class="form-control" name="pDataFabricacao" value="<?= ($prd->data_fabricacao) ?>">
  </div>
  <div class="col-md-4">
    <label for="pFabricante" class="form-label">Fabricante</label>
    <select name="pFabricante" class="form-select">
      <?php
      $fabricantes = [];
      if(isset($_SESSION['fabricantes'])){
        $fabricantes = $_SESSION['fabricantes'];
      }
      foreach ($fabricantes as $fabricante) {
        if($fabricante->codigo == $prd->cod_fabricante){
          echo "<option selected value='$fabricante->codigo'>$fabricante->nome</option>";
        }else{
          echo "<option value=$fabricante->codigo>$fabricante->nome</option>";
        }
      }
      ?>
    </select>
  </div>
  <div class="col-md-2">
    <label for="pEstoque" class="form-label">Qde Estoque</label>
    <input type="text" class="form-control" name="pEstoque" value="<?= $prd->estoque ?>">
  </div>
  <div class="col-12">
    <label for="pDescricao" class="form-label">Descrição do produto: </label>
    <textarea class="form-control" name="pDescricao" rows="6" style="resize: none"><?= $prd->descricao ?></textarea>    
  </div>
  <div class="col-12">
    <label for="pResumo" class="form-label">Resumo do produto: </label>
    <textarea class="form-control" name="pResumo" rows="6" style="resize: none"><?= $prd->resumo ?></textarea>    
  </div>
  <div class="col-12 text-center">
    <button type="submit" class="btn btn-success">Alterar</button>
  </div>
  <input type="hidden" name="opcao" value="5">
</form>

<?php
       require_once 'includes/rodape.inc.php';
?>