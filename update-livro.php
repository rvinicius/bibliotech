<?php 
    require_once("cabecalho.php");
    require_once("class/LivroDAO.php");

    $nome_livro = $_POST['nome'];
    $isbn_livro = $_POST['isbn'];
    $autor = $_POST['autor'];

    $livro = new Livro($nome_livro, $isbn_livro, $autor);
    $livroDao = new LivroDAO($conexao);
    
    $livro->setId($_POST['id']);

    if($livroDao->alteraLivro($livro)){
      $_SESSION["success"] = "Livro alterado com sucesso.";
       header("Location: lista-livros.php");
       die();

    } else {
   			$msg = mysqli_error($conexao);
        $_SESSION["danger"] = "O livro ".$livro->getNome()." nao foi alterado. Erro: ".$msg;
        header("Location: lista-livros.php");
        die();
    } 

   