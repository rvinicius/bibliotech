<?php require_once("conecta.php"); ?>

<?php 


	function buscaUsuario($conexao, $login, $senha) {
		$senhaMd5 = md5($senha);
		$email = mysqli_real_escape_string($conexao, $login);
		$query = "select * from administradores where login='{$login}' and senha='{$senhaMd5}'";
		$resultado = mysqli_query($conexao, $query);
	    $usuario = mysqli_fetch_assoc($resultado);
	    return $usuario;
	}
 ?>