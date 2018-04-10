<?php require_once('autoload.php');

Administrador::logout();
$_SESSION["success"] = "Deslogado com sucesso";
header("Location: index.php");
die();