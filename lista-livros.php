<?php require_once("cabecalho.php"); 

$livroDao = new LivroDAO($conexao);

$a = $_GET['a'];
if($a == 'buscar'){
    $livros = $livroDao->buscaLivroPorIsbnOuNome($_POST['search']);
} else {
    $livros = $livroDao->listaLivros();
}
?>

<?php mostraAlerta("success");
      mostraAlerta("danger");
 ?>
	<div class="container">
		<h1>Acervo</h1>
		<div class="table-responsive">
		<table class="table table-bordered">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">Cod.</th>
	      <th scope="col">Titulo</th>
	      <th scope="col">ISBN</th>
	      <th scope="col">Autor</th>
	      <th scope="col">Status</th>
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
	        <td class="text-center status"><span><?= ucfirst($livro->getDisponibilidade())?></span></td>
	        <td class="text-center"><a href="altera-livro.php?id=<?= $livro->getId(); ?>" class="btn btn-outline-primary btn-sm">Alterar</a></td>
  
  			
	        <form action="remove-livro.php" method="post" >
	        	<input type="hidden" name="id" value="<?= $livro->getId() ?>">
	        	<?php if($livro->getDisponibilidade()=='indisponivel'){ ?>
	            	<td class="text-center"><span class="btn btn-outline-danger btn-sm disabled">Excluir</a></td>
	            <?php } else { ?>
					<td class="text-center"><button class="btn btn-outline-danger btn-sm" onclick="return confirm('Você deseja excluir o livro <?= $livro->getNome(); ?>?');">Excluir</a></td>
	            <?php } ?>
	  		</form>
	  		
	    </tr>
	<?php endforeach ?>
	  </tbody>
	</table>
	</div>
	<a class="btn btn-outline-dark float-right btn-sm" href="cadastro-livro.php">Novo Livro</a>
<script type="text/javascript">
		$( "td.status span" ).each(function() {
  		var $content = $(this);
  		switch($content.text()) {
    		case "Disponivel":
				$(this).addClass( "badge badge-success" );
				break;
			case "Indisponivel":
				$(this).addClass( "badge badge-danger");
				break;
			case "Finalizado":
				$(this).addClass( "badge badge-success");
			break;
		default:
		}
	});
</script>
	
<?php require_once("rodape.php"); ?>