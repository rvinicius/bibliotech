<?php require_once("cabecalho.php"); 

$usuarioDao = new UsuarioDAO($conexao);
$usuarios = $usuarioDao->listaUsuarios();

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
		<h2>Usuários</h2>
	<div class="table-responsive">
		<table class="table table-hover table-bordered ">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">Nome</th>
	      <th scope="col">E-Mail</th>
	      <th scope="col">Telefone</th>
	      <th scope="col"></th>
	      <th scope="col"></th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>

	  	<?php foreach ($usuarios as $usuario) : ?>
	    <tr>
	        <th scope="row"><?= $usuario->getNome(); ?></th>
	        <td><?= $usuario->getEmail(); ?></td>
	        <td><?= $usuario->getTelefone(); ?></td>
	        <td class="text-center"><a href="mostra-usuario.php?id=<?= $usuario->getId(); ?>" class="btn btn-outline-primary btn-sm">Histórico</a></td>
	        <td class="text-center"><a href="altera-usuario.php?id=<?= $usuario->getId(); ?>" class="btn btn-outline-primary btn-sm">Alterar</a></td>

	        <form action="remove-usuario.php" method="post">
	        	<input type="hidden" name="id" value="<?= $usuario->getId() ?>">
	            <td class="text-center"><button class="btn btn-outline-danger btn-sm" onclick="return confirm('Você deseja excluir o usuário <?= $usuario->getNome(); ?>?');">Excluir</a></td>

	  	</form>
	    </tr>

	<?php endforeach ?>
	  </tbody>
	</table>
</div>
	<a class="btn btn-outline-dark float-right btn-sm" href="cadastro-usuario.php">Novo usuário</a>

	
<?php require_once("rodape.php"); ?>