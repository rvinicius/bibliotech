<?php 
require_once("cabecalho.php"); 
?>

<h1>Cadastro de livros</h1>
<div class="container">
<form action="insert-livro.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" name="nome">
    </div>
    <div class="form-group col-md-6">
      <label for="ISBN">ISBN</label>
      <input type="text" class="form-control" name="isbn" >
    </div>
  </div>
 <input type="submit" value="Cadastrar" class="btn btn-primary" />
</form>
</div>

<?php require_once("rodape.php"); ?>