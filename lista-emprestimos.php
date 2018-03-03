<?php require_once("cabecalho.php"); 

require_once("class/EmprestimoDAO.php");

$emprestimoDao = new EmprestimoDAO($conexao);
$emprestimos = $emprestimoDao->listaEmprestimos();

$a = $_GET['a'];
// if($a == 'buscar'){
// 	$livros = $livroDao->buscaLivroPorIsbnOuNome($_POST['search']);
// } else {
// 	$livros = $livroDao->listaLivros();
// }

?>

<?php mostraAlerta("success");
      mostraAlerta("danger");
 ?>
	<div class="container">
		<h2>Empréstimos</h2>
	<div class="table-responsive">
		<table class="table table-hover table-bordered ">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">#Cod</th>
	      <th scope="col">Usuario</th>
	      <th scope="col">Livro</th>
	      <th scope="col">Status</th>

	    </tr>
	  </thead>
	  <tbody>

	  	<?php foreach ($emprestimos as $emprestimo) : ?>
	    <tr>
	        <th scope="row"><?= $emprestimo->getId(); ?></th>
	        <td><?= $emprestimo->getUsuario()->getNome(); ?></td>
	        <td><?= $emprestimo->getLivro()->getNome(); ?></td>
			<td class="text-center status"><span ><?= ucfirst($emprestimo->getStatus()); ?></span></td>
	  	</form>
	    </tr>

	<?php endforeach ?>
	  </tbody>
	</table>
</div>

<script type="text/javascript">
	$( "td.status span" ).each(function() {
  		var $content = $(this);
  		switch($content.text()) {
    		case "Aberto":
				$(this).addClass( "badge badge-info" );
				break;
			case "Multa pendente":
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