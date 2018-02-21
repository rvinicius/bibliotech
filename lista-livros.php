<?php require_once("cabecalho.php"); 

require_once("class/LivroDAO.php");

$livroDao = new LivroDAO($conexao);
$livros = $livroDao->listaLivros();

?>
	<div class="container-fluid">
		<table class="table">
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
	      <td><a href="altera-livro.php?id=<?= $livro->getId(); ?>">Alterar</a></td>
	    </tr>
	<?php endforeach ?>
	  </tbody>
	</table>
	</div>
	
<?php require_once("rodape.php"); ?>