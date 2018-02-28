<?php require_once("cabecalho.php"); ?>
<?php require_once("logica-usuario.php"); ?>

<?php mostraAlerta("success");
      mostraAlerta("danger");
 ?>


	  <?php if (usuarioEstaLogado()){ ?>
		<p class="text-success">Você está logado como <?= usuarioLogado(); ?></p>
        <a href="logout.php">Deslogar</a></p>
<?php } else { ?>
<div class="container card col-md-3 mt-3 ">
  <h2 class="card-title pt-2">Login</h2>
<form action="login.php" method="post">
  <div class="card-body ">
    <div class="form-group ">
        <label for="login">Login</label>
        <input class="form-control" type="text" name="login">
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input class="form-control" type="password" name="senha">
    </div>

    <div class="form-group d-flex flex-row-reverse">
       <input type="submit" value="Login" class="btn btn-primary float-right" />
     </div>
  </div>


    </form>
	 <?php }?>
<?php include("rodape.php"); ?>