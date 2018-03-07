<?php 
require_once("cabecalho.php"); 
?>

<br/>
<div class="container card">
  <h2 class="card-title">Cadastro de livro</h2>
<form action="insert-livro.php" method="post">
  <div class="form-row card-body ">

    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="form-group col-md-6">
      <label for="isbn">ISBN</label>
      <input type="number" class="form-control" placeholder="Apenas números" name="isbn" required>
    </div>

    <div class="form-group col-md-6">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" name="autor" required>
    </div>

     <div class="form-group col-md-12">
       <input type="submit" value="Cadastrar" class="btn btn-primary float-right" />
     </div>
  </div>

</form>
</div>
<?php require_once("rodape.php"); ?>