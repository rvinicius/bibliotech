<?php 
    require_once("cabecalho.php");
    require_once("class/LivroDAO.php");

    $nome_livro = $_POST['nome'];
    $isbn_livro = $_POST['isbn'];

    $livro = new Livro($nome_livro, $isbn_livro);
    $livroDao = new LivroDAO($conexao);
    

   if($livroDao->insereLivro($livro)){ ?>
   	<p class="alert alert-success">O livro <?= $livro->getNome() ?> foi adicionado.</p>
   <?php } else {
   			$msg = mysqli_error($conexao); ?>
   	<p class="alert alert-danger">O livro <?= $livro->getNome() ?> não foi adicionado: <?= $msg?></p>

   <?php } ?>