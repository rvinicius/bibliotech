<?php 
  require_once("cabecalho.php");

  $multa = $_POST['multa'];
  $id_emprestimo = $_POST['id_emprestimo'];
  $id_livro = $_POST['id_livro'];
// refatorar
  if($multa > 0){
    $status = "multa pendente";
  } else {
    $status = "finalizado";
  }


  $emprestimoDao = new EmprestimoDAO($conexao);

  if($emprestimoDao->realizaDevolucao($id_livro, $id_emprestimo, $status, $multa)){
    $_SESSION["success"] = "Devolução realizada com sucesso.";
     header("Location: lista-emprestimos.php");
     die();

  } else {
   	  $msg = mysqli_error($conexao);
      $_SESSION["danger"] = "O empréstimo ".$id_emprestimo." não foi alterado. Erro: ".$msg;
      header("Location: lista-emprestimos.php");
      die();
  }