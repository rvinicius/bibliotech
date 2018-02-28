<?php
require_once('cabecalho.php');
require_once('class/LivroDAO.php');
require_once('class/UsuarioDAO.php');

$usuarioDao = new UsuarioDAO($conexao);
$usuarios = $usuarioDao->listaUsuarios();

$livrosDao = new LivroDAO($conexao);
$livros = $livrosDao->listaLivros();

?>

<div class="container card">
  <h2 class="card-title">Cadastro de empréstimo</h2>
<form action="insert-emprestimo.php" method="post">
  <div class="form-row card-body ">

    <div class="form-group col-md-5">
     <label for="usuario">Usuário</label>
		<select name="usuario_id" class="form-control">
            <?php foreach ($usuarios as $usuario) : ?>
                <option value="<?= $usuario->getId() ?>"><?= $usuario->getId()." - ".$usuario->getNome() ?></option>
            <?php endforeach ?>
        </select>
    </div>
    
    <div class="form-group col-md-5">
     <label for="livro">Livro</label>
		<select name="usuario_id" class="form-control">
            <?php foreach ($livros as $livro) : ?>
                <option value="<?= $livro->getId() ?>"><?= $livro->getId()." - ".$livro->getNome() ?></option>
            <?php endforeach ?>
        </select>
    </div>
    

     <div class="form-group col-md-10">
       <input type="submit" value="Cadastrar" class="btn btn-primary float-right" />
     </div>
  </div>

</form>
</div>