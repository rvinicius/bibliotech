<?php 
	require_once('cabecalho.php');

	$usuarioDao = new UsuarioDAO($conexao);
	$usuario = $usuarioDao->buscaUsuario($_GET['id']);

 ?>
 
<div class="container card">
  <h2 class="card-title pt-3">Alteração de usuário</h2>
<form action="update-usuario.php" method="post">
  <div class="form-row card-body ">

    <input type="hidden" name="id" value="<?= $usuario->getId();?>">

    <div class="form-group col-md-5">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" value="<?= $usuario->getNome(); ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="dataNascimento">Data de nascimento</label>
      <input type="" class="form-control" name="dataNascimento" value="<?= $usuario->getDataNascimento(); ?>">
    </div>

    <div class="form-group col-md-5">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="cpf" value="<?= $usuario->getCpf(); ?>">
    </div>

    <div class="form-group col-md-5">
      <label for="rg">RG</label>
      <input type="text" class="form-control" name="rg" value="<?= $usuario->getRg(); ?>">
    </div>
        
    <div class="form-group col-md-5">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" value="<?= $usuario->getEmail(); ?>">
    </div>
    
    <div class="form-group col-md-5">
      <label for="telefone">Telefone</label>
      <input type="text" class="form-control" name="telefone" value="<?= $usuario->getTelefone(); ?>">
    </div>

    <div class="form-group col-md-10">
      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" name="endereco" value="<?= $usuario->getEndereco(); ?>">
    </div>

     <div class="form-group col-md-10">
       <input type="submit" value="Cadastrar" class="btn btn-primary float-right" />
     </div>
  </div>

</form>
</div>