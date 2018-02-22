<?php require_once("cabecalho.php"); 

require_once("class/LivroDAO.php");

$livroDao = new LivroDAO($conexao);
$livros = $livroDao->listaLivros();



?>

<?php mostraAlerta("success");
      mostraAlerta("danger");
 ?>
	<div class="container">
		<table class="table table-bordered ">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">Cod.</th>
	      <th scope="col">Titulo</th>
	      <th scope="col">ISBN</th>
	      <th scope="col">Autor</th>
	      <th scope="col"></th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($livros as $livro) : ?>
	    <tr>
	        <th scope="row"><?= $livro->getId(); ?></th>
	        <td><?= $livro->getNome(); ?></td>
	        <td><?= $livro->getIsbn(); ?></td>
	        <td><?= $livro->getAutor(); ?></td>
	        <td class="text-center"><a href="altera-livro.php?id=<?= $livro->getId(); ?>" class="btn btn-outline-primary ">Alterar</a></td>
  
	        <form action="remove-livro.php" method="post">
	        	<input type="hidden" name="id" value="<?= $livro->getId() ?>">
	            <td class="text-center"><button class="btn btn-outline-danger ">Excluir</a></td>
	  	</form>
	    </tr>
	<?php endforeach ?>
	  </tbody>
	</table>
	<a class="btn btn-outline-dark float-right" href="cadastro-livro.php">Novo Livro</a>
	</div>
	
<?php require_once("rodape.php"); ?>