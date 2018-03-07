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

    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" value="<?= $usuario->getNome(); ?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="dataNascimento">Data de nascimento</label>
      <input type="" class="form-control" name="dataNascimento" value="<?= $usuario->getDataNascimento(); ?>" required>
    </div>

    <div class="form-group col-md-6">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="cpf" onkeyup="mascara(this,mascCpf)" maxlength="14" value="<?= $usuario->getCpf(); ?>" required>
    </div>

    <div class="form-group col-md-6">
      <label for="rg">RG</label>
      <input type="text" class="form-control" name="rg" onkeyup="mascara(this,mascRg)" maxlength="12" value="<?= $usuario->getRg(); ?>" required>
    </div>
        
    <div class="form-group col-md-6">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" value="<?= $usuario->getEmail(); ?>" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="telefone">Telefone</label>
      <input type="text" class="form-control" name="telefone" onkeyup="mascara(this,mascTel)" maxlength="15" value="<?= $usuario->getTelefone(); ?>" required>
    </div>

    <div class="form-group col-md-12">
      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" name="endereco" value="<?= $usuario->getEndereco(); ?>" required>
    </div>

     <div class="form-group col-md-12">
       <input type="submit" value="Alterar" class="btn btn-primary float-right" />
     </div>
  </div>

</form>
</div>