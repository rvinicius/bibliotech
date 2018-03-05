<?php 
	require_once("cabecalho.php"); 
	require_once('vendor/autoload.php');
	require_once("class/EmprestimoDAO.php");
	use Carbon\Carbon;

	$emprestimoDao = new EmprestimoDAO($conexao);
	$emprestimos = $emprestimoDao->listaEmprestimos();

	$emprestimosAberto = $emprestimoDao->buscaPorStatus("aberto");
	$emprestimosFinalizados = $emprestimoDao->buscaPorStatus("finalizado");
	$emprestimosMultaAberta = $emprestimoDao->buscaPorStatus("multa pendente");

	$a = $_GET['a'];
	// if($a == 'buscar'){
	// 	$livros = $livroDao->buscaLivroPorIsbnOuNome($_POST['search']);
	// } else {
	// 	$livros = $livroDao->listaLivros();
	// }

	mostraAlerta("success");
	mostraAlerta("danger");
?>
<style type="text/css">

	.tabela-todos a{
		text-decoration: none;
		color: black;
	}

	tr.hover {
	   cursor: pointer;
	}

</style>
<div class="container">
	<h2>Empréstimos</h2>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="todos-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos" aria-selected="true">Todos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-info" id="aberto-tab" data-toggle="tab" href="#aberto" role="tab" aria-controls="aberto" aria-selected="false">Aberto</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-success	" id="finalizado-tab" data-toggle="tab" href="#finalizado" role="tab" aria-controls="finalizado" aria-selected="false">Finalizado</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-danger" id="multa-pendente-tab" data-toggle="tab" href="#multa-pendente" role="tab" aria-controls="multa-pendente" aria-selected="false">Multa pendente</a>
		</li>
	</ul>

	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="todos" role="tabpanel" aria-labelledby="todos-tab">
		  	<div class="table-responsive">
				<table class="table table-hover table-bordered ">
				  	<thead class="thead-light">
					    <tr>
					      <th scope="col">#Cod</th>
					      <th scope="col">Usuario</th>
					      <th scope="col">Livro</th>
					      <th scope="col">Data da criação</th>
					      <th scope="col">Data da entrega</th>
					      <th scope="col">Status</th>
						</tr>
				  	</thead>
				  	<tbody>
					  	<?php foreach ($emprestimos as $emprestimo) : ?>
						    <tr class="tabela-todos">
						        <th scope="row" ><a href="<?= $emprestimo->getId(); ?>"><?= $emprestimo->getId(); ?></a></th>
						        <td><?= $emprestimo->getUsuario()->getNome(); ?></td>
						        <td><?= $emprestimo->getLivro()->getNome(); ?></td>
						        <td><?= Carbon::createFromFormat('Y-m-d', $emprestimo->getDataEmprestimo())->format('d/m/Y') ?></td>
						        <td><?= Carbon::createFromFormat('Y-m-d', $emprestimo->getDataEntrega())->format('d/m/Y') ?></td>
								<td class="text-center status"><a href="#"><span ><?= ucfirst($emprestimo->getStatus()); ?></span></td>
						    </tr>
						<?php endforeach ?>
				    </tbody>
				</table>
			</div>
	 	</div>


		<div class="tab-pane fade show " id="aberto" role="tabpanel" aria-labelledby="home-tab">
		  	<div class="table-responsive">
				<table class="table table-hover table-bordered ">
			  		<thead class="thead-light">
			    	<tr>
			      		<th scope="col">#Cod</th>
			      		<th scope="col">Usuario</th>
			      		<th scope="col">Livro</th>
						<th scope="col">Data da criação</th>
					    <th scope="col">Data da entrega</th>
			      		<th scope="col"></th>
					</tr>
			  		</thead>
			  		<tbody>	
			  			<?php foreach ($emprestimosAberto as $emprestimoAberto) : ?>
			    		<tr>
					        <th scope="row"><?= $emprestimoAberto->getId(); ?></th>
					        <td><?= $emprestimoAberto->getUsuario()->getNome(); ?></td>
					        <td><?= $emprestimoAberto->getLivro()->getNome(); ?></td>
					        <td><?= Carbon::createFromFormat('Y-m-d', $emprestimoAberto->getDataEmprestimo())->format('d/m/Y') ?></td>
					        <td><?= Carbon::createFromFormat('Y-m-d', $emprestimoAberto->getDataEntrega())->format('d/m/Y') ?></td>
					        <td class="text-center"><a href="devolucao.php?id=<?= $emprestimoAberto->getId(); ?>" class="btn btn-outline-primary btn-sm">Devolução</a></td>
					    </tr>
						<?php endforeach ?>
			  		</tbody>
				</table>
			</div>
		</div>

		<div class="tab-pane fade show " id="finalizado" role="tabpanel" aria-labelledby="home-tab">
			<div class="table-responsive">
				<table class="table table-hover table-bordered ">
					<thead class="thead-light">
						<tr>
						<th scope="col">#Cod</th>
						<th scope="col">Usuario</th>
						<th scope="col">Livro</th>
						<th scope="col">Data da devolução</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($emprestimosFinalizados as $emprestimosFinalizado) : ?>
						<tr>
						<th scope="row"><?= $emprestimosFinalizado->getId(); ?></th>
							<td><?= $emprestimosFinalizado->getUsuario()->getNome(); ?></td>
							<td><?= $emprestimosFinalizado->getLivro()->getNome(); ?></td>
							<td><?= Carbon::createFromFormat('Y-m-d', $emprestimo->getDataEntrega())->format('d/m/Y') ?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="tab-pane fade show " id="multa-pendente" role="tabpanel" aria-labelledby="multa-pendente-tab">
			<div class="table-responsive">
				<table class="table table-hover table-bordered ">
					<thead class="thead-light">
						<tr>
						<th scope="col">#Cod</th>
						<th scope="col">Usuario</th>
						<th scope="col">Livro</th>
						<th scope="col">Devolução</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($emprestimosMultaAberta as $emprestimoMultaAberta) : ?>
						<tr>
						<th scope="row"><?= $emprestimoMultaAberta->getId(); ?></th>
							<td><?= $emprestimoMultaAberta->getUsuario()->getNome(); ?></td>
							<td><?= $emprestimoMultaAberta->getLivro()->getNome(); ?></td>
							<td class="text-center"><a href="devolucao.php?id=<?= $emprestimoMultaAberta->getId(); ?>" class="btn btn-outline-primary btn-sm">Devolução</a></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
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

	$('.tabela-todos tr').click( function() {
	    					window.location = $(this).find('a').attr('href');
		}).hover( function() {
	    					$(this).toggleClass('hover');
	});

</script>
	
<?php require_once("rodape.php"); ?>