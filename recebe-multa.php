<?php require_once("cabecalho.php");
	$id = $_GET['id'];

	$emprestimoDao = new EmprestimoDAO($conexao);
	$emprestimo = $emprestimoDao->buscaEmprestimo($id);

	if($emprestimoDao->recebeMulta($emprestimo)){
      $_SESSION["success"] = "Pagamento da multa no valor de ".$emprestimo->getMulta()."R$ registrado com sucesso.";
       header("Location: lista-emprestimos.php");
       die();

    } else {
        $msg = mysqli_error($conexao);
        $_SESSION["danger"] = "A multa no valor de ".$emprestimo->getMulta()."R$ do usuário(a)".$emprestimo->getUsuario()->getNome()." não foi registrada. Erro: ".$msg;
        header("Location: lista-emprestimos.php");
        die();
    } 
 ?>