<?php 
	require_once('cabecalho.php');

  require_once('vendor/autoload.php');

  use Carbon\Carbon;
  Carbon::setLocale('br');

	$id_emprestimo = $_POST['id_emprestimo'];

	$emprestimoDao = new EmprestimoDAO($conexao);
	$emprestimo = $emprestimoDao->buscaEmprestimo($id_emprestimo);

	$qt_renovacao = $emprestimo->getQtRenovacao();
	$qt_renovacao += 1;

	$emprestimo->setQtRenovacao($qt_renovacao);

	$dataLimite = new Carbon(Carbon::now('America/Sao_Paulo')->addDays(7));

  $emprestimo->setDataLimite($dataLimite->format('Y-m-d'));

    if($emprestimoDao->realizaRenovacao($emprestimo)){
      $_SESSION["success"] = "Renovação realizada com sucesso. Prazo de entrega alterado para: "."<strong>".$dataLimite->format('d/m/Y')."</strong>";
       header("Location: lista-emprestimos.php");
       die();

    } else {
        $msg = mysqli_error($conexao);
        $_SESSION["danger"] = "A Renovação não foi cadastrada. Erro: ".$msg;
        header("Location: lista-emprestimos.php");
        die();
    } 


 ?>