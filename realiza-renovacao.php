<?php 
	require_once('cabecalho.php');
  require_once('vendor/autoload.php');

  use Carbon\Carbon;
  Carbon::setLocale('br');

	$id_emprestimo = $_POST['id_emprestimo'];

	$emprestimoDao = new EmprestimoDAO($conexao);
	$emprestimo = $emprestimoDao->buscaEmprestimo($id_emprestimo);

    if($emprestimoDao->realizaRenovacao($emprestimo)){
      $_SESSION["success"] = "Renovação realizada com sucesso. Prazo de entrega alterado para: "."<strong>".Carbon::createFromFormat('Y-m-d', $emprestimo->getDataLimite())->format('d/m/Y')."</strong>";
       header("Location: lista-emprestimos.php");
       die();

    } else {
        $msg = mysqli_error($conexao);
        $_SESSION["danger"] = "A Renovação não foi cadastrada, verifique se não há multas pendentes.".$msg;
        header("Location: lista-emprestimos.php");
        die();
    }
