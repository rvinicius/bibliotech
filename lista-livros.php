<?php require_once("cabecalho.php"); 

require_once("class/LivroDAO.php");

$livroDao = new LivroDAO($conexao);
$livros = $livroDao->listaLivros();

?>
	<div class="container-fluid">
		<table class="table table-bordered">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nome</th>
	      <th scope="col">ISBN</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($livros as $livro) : ?>
	    <tr>
	      <th scope="row"><?= $livro->getId(); ?></th>
	      <td><?= $livro->getNome(); ?></td>
	      <td><?= $livro->getIsbn(); ?></td>
	      <td><a href="altera-livro.php?id=<?= $livro->getId(); ?>" class="btn btn-outline-primary ">Alterar</a></td>
	    </tr>
	<?php endforeach ?>
	  </tbody>
	</table>
	<a class="btn btn-outline-dark float-right" href="cadastro-livro.php">Novo Livro</a>
	</div>
	
<?php require_once("rodape.php"); ?>