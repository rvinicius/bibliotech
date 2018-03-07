<?php 
    require_once('cabecalho.php');
    require_once('vendor/autoload.php');
    
    use Carbon\Carbon;
    Carbon::setLocale('br');
    
    $id_emprestimo = $_GET['id'];
    
    $emprestimoDao = new EmprestimoDAO($conexao);
    $emprestimo = $emprestimoDao->buscaEmprestimo($id_emprestimo);
    
    $dataLimite = new Carbon(Carbon::now('America/Sao_Paulo')->addDays(7));
    
    $usuarioDao = new UsuarioDAO($conexao);
    $usuario = $usuarioDao->buscaUsuario($emprestimo->getUsuario()->getId());
    
    $livroDao = new LivroDAO($conexao);
    $livro = $livroDao->buscaLivro($emprestimo->getLivro()->getId());

 ?>

<?php if($emprestimo->getMulta() == 0) { ?>	
<div class="container card  mt-4">
	<h2 class="card-title">Renovação</h2>
	<form action="realiza-renovacao.php" method="POST">

		<h5 class="card-title mt-4">Detalhes da renovação</h5>
		<div class='row'>

			<div class="col-md-6">
				<label for="autor">Data original</label>
				<input type="text" class="form-control" name="dataEmprestimo" value="<?= Carbon::parse($emprestimo->getDataLimite())->format('d/m/Y')?>" readonly>
			</div>

			<div class="col-md-6">
				<label for="autor">Nova data</label>
				<input type="text" class="form-control" name="dataEmprestimo" value="<?= $dataLimite->format('d/m/Y')?>" readonly>
			</div>
		</div>


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

		<div class="form-group col-md-12 m-3" onClick="verificaSeTemMulta(<?= $multa ?>)">
       		<input type="submit" value="Realizar renovação" class="btn btn-primary float-right" />
     	</div>
	
	</form>
</div>
<?php } ?>