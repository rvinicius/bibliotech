<?php 
    require_once("cabecalho.php");

    $id = $_POST['id'];


    $livroDao = new LivroDAO($conexao);

    $livroDao->deletaLivro($id);
    $_SESSION["success"] = "Livro removido com sucesso.";
    header("Location: lista-livros.php");
    die();
 ?>