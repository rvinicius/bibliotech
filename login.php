<?php 
require_once("logica-usuario.php");
require_once("autoload.php");
require_once("conecta.php");

$login = $_POST["login"];
$senha = $_POST["senha"];

$admDao = new AdministradorDAO($conexao);
$adm = $admDao->buscaAdministradorParaLogar($login, $senha);

if(isset($adm)){
	$_SESSION["success"] = "Logado com sucesso.";
	$adm->realizaLogin();
	header("Location: lista-emprestimos.php");
} else {
    $_SESSION["danger"] = "Falha ao logar.";
    header("Location: index.php");
}
