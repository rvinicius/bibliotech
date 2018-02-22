<?php 
require_once("cabecalho.php"); 
?>

<br/>
<div class="container card">
  <h2 class="card-title">Cadastro de livro</h2>
<form action="update-livro.php" method="post">
  <div class="form-row card-body ">

    <div class="form-group col-md-5">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome">
    </div>
    <div class="form-group col-md-5">
      <label for="isbn">ISBN</label>
      <input type="text" class="form-control" name="isbn">
    </div>

    <div class="form-group col-md-5">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" name="autor">
    </div>

     <div class="form-group col-md-10">
       <input type="submit" value="Alterar" class="btn btn-primary float-right" />
     </div>
  </div>

</form>
</div>
<?php require_once("rodape.php"); ?>