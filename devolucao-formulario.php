<?php 
    require_once("cabecalho.php"); 
    require_once("vendor/autoload.php");
    require_once("autoload.php");
    use Carbon\Carbon;
    
    $id_emprestimo = $_GET['id'];
    
    $emprestimoDao = new EmprestimoDAO($conexao);
    $emprestimo = $emprestimoDao->buscaEmprestimo($id_emprestimo);
    $livro = $emprestimo->getLivro();
    $usuario = $emprestimo->getUsuario();
    
    $hoje = Carbon::now(new DateTimeZone('America/Sao_Paulo'));
    $dataLimite = Carbon::createFromFormat('Y-m-d', $emprestimo->getDataLimite());
    $dataEmprestimo = Carbon::createFromFormat('Y-m-d', $emprestimo->getDataEmprestimo());
    
    $multa = $emprestimo->calculaMulta($hoje, $dataLimite);
?>

<div class="container card  mt-4">
	<h2 class="card-title">Devolução</h2>
	<form action="update-emprestimo.php" method="POST">
		<div class='row'>
			<div class="col-md-6">
				<h5 class="card-title mt-4">Usuário</h5>
				<input type="hidden" name="multa" value="<?= $multa?>"/>
				<input type="hidden" name="id_emprestimo" value="<?= $emprestimo->getId()?>"/>
				<input type="hidden" name="id_livro" value="<?= $livro->getId()?>"/>


				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" value="<?= $usuario->getNome()?>" readonly>

				<label for="isbn">CPF</label>
				<input type="text" class="form-control" name="cpf" value="<?= $usuario->getCpf()?>" readonly>

				<label for="isbn">E-mail</label>
				<input type="text" class="form-control" name="email" value="<?= $usuario->getEmail()?>" readonly>

				<label for="autor">Telefone</label>
				<input type="text" class="form-control" name="telefone" value="<?= $usuario->getTelefone()?>" readonly>
			</div>

			<div class="col-md-6 ">
				<h5 class="card-title mt-4">Livro</h5>

				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" value="<?= $livro->getNome()?>" readonly>

				<label for="isbn">ISBN</label>
				<input type="text" class="form-control" name="isbn" value="<?= $livro->getIsbn()?>" readonly>
			</div>
		</div>

	<h5 class="card-title mt-4">Detalhes do empréstimo</h5>
		<div class='row'>

			<div class="col-md-6">
				
				<label for="autor">Data Emprestimo</label>
				<input type="text" class="form-control" name="dataEmprestimo" value="<?= $dataEmprestimo->format('d/m/Y') ?>" readonly>
			</div>

			<div class="col-md-6">
				<label for="autor">Data Limite - Multa</label>
				<input type="text" class="form-control" name="dataEmprestimo" value="<?= $dataLimite->format('d/m/Y').' - '.$multa.' R$'?>" readonly>
			</div>
		</div>
			<div class="form-group col-md-12 m-3" onClick="verificaSeTemMulta(<?= $multa ?>)">
       			<input type="submit" value="Realizar devolução" class="btn btn-primary float-right" />
     		</div>
	</form>
</div>

<script type="text/javascript">
	function verificaSeTemMulta(diasDeAtraso){
		if(diasDeAtraso > 0){
			alert("O empréstimo irá gerar uma multa de "+diasDeAtraso+ "R$");
		}
	}
</script>