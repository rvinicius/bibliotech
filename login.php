<?php 
require_once("banco-usuario.php");
require_once("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["login"], $_POST["senha"]);

if ($usuario == null) {
	$_SESSION["danger"] = "Falha ao logar.";
	header("Location: index.php");
}else{
	$_SESSION["success"] = "Logado com sucesso.";
	logaUsuario($usuario['login']);
	header("Location: index.php");
}

var_dump($usuario);