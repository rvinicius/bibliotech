<?php require_once("cabecalho.php"); ?>
<?php require_once("logica-usuario.php"); ?>

<?php mostraAlerta("success");
      mostraAlerta("danger");
 ?>


	  <?php if (usuarioEstaLogado()){ ?>
		<p class="text-success">Você está logado como <?= usuarioLogado(); ?></p>
        <a href="logout.php">Deslogar</a></p>
<?php } else { ?>
	<h1>Login</h1>
    <form action="login.php" method="post">
        <table class="table">
            <tr>
                <td>Login</td>
                <td><input class="form-control" type="text" name="login"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input class="form-control" type="password" name="senha"></td>
            </tr>
            <tr>
                <td><button type="submit" class="btn btn-primary">Login</button></td>
            </tr>
        </table>
    </form>
	 <?php }?>
<?php include("rodape.php"); ?>