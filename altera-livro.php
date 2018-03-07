<?php 
    require_once('cabecalho.php');    
    $livroDao = new LivroDAO($conexao);
    $livro = $livroDao->buscaLivro($_GET['id']);

 ?>

<br/>
<div class="container card">
 	<h2 class="card-title">Alteração de livro</h5>
<form action="update-livro.php" method="post">
  <div class="form-row card-body ">

<input type="hidden" name="id" value="<?= $livro->getId();?>">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" name="nome" value="<?= $livro->getNome(); ?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="ISBN">ISBN</label>
      <input type="number" class="form-control" name="isbn" placeholder="Apenas números" value="<?= $livro->getIsbn(); ?>" required>
    </div>

    <div class="form-group col-md-6">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" name="autor" value="<?= $livro->getAutor(); ?>" required>
    </div>

     <div class="form-group col-md-12">
     	 <input type="submit" value="Alterar" class="btn btn-primary float-right" />
     </div> 
  </div>

</form>
</div>
