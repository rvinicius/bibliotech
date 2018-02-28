<?php 
require_once("conecta.php");
require_once("mostra-alerta.php"); 

    error_reporting(E_ALL ^ E_NOTICE);
    
    spl_autoload_register(function($nomeDaClasse){
        require_once("class/".$nomeDaClasse.".php");
    });

    function verificaPaginaAtual($pagina)
    {
      return basename($_SERVER['PHP_SELF']) == $pagina ? "active" : "";
    }

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<title>Acervo</title>
    <meta charset="utf-8" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Bibliotech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?= verificaPaginaAtual("lista-livros.php"); ?>" href="lista-livros.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Livros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="lista-livros.php">Acervo</a>
          <a class="dropdown-item" href="cadastro-livro.php">Cadastro</a>
        </div>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?= verificaPaginaAtual("lista-usuarios.php"); ?> ?>" href="lista-usuario.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuários
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="lista-usuarios.php">Listagem</a>
          <a class="dropdown-item" href="cadastro-usuario.php">Cadastro</a>
        </div>  
      </li>

    </ul>




    <form method="post" class="form-inline my-2 my-lg-0 <?= basename($_SERVER['PHP_SELF']) != "lista-livros.php" ? "d-none " : "" ?>" action="<?=$_SERVER['PHP_SELF'] ?>?a=buscar"">
      <input class="form-control mr-sm-2" type="text" placeholder="Nome/ISBN" name="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Buscar">Buscar</button>
    </form>




  </div>
</nav>
   <script type="text/javascript" src="vendor/components/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>


