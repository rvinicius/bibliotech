<?php 
require_once("conecta.php");

    error_reporting(E_ALL ^ E_NOTICE);
    
    spl_autoload_register(function($nomeDaClasse){
        require_once("class/".$nomeDaClasse.".php");
    });

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<title>Lista de Livros</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Bibliotech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == "lista-livros.php" ? "active" : "" ?>">
        <a class="nav-link" href="lista-livros.php">Livros</a>
      </li>
      <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == "cadastro-livro.php" ? "active" : "" ?>">
        <a class="nav-link" href="cadastro-livro.php">Cadastro</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Nome/ISBN" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
   <script type="text/javascript" src="vendor/components/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>


