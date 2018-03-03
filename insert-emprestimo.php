<?php
    require_once('cabecalho.php');
    require_once('class/EmprestimoDAO.php');
    require_once('class/UsuarioDAO.php');
    require_once('vendor/autoload.php');

    use Carbon\Carbon;
    Carbon::setLocale('br');

    $id_usuario = $_POST['id_usuario'];
    $id_livro = $_POST['id_livro'];
    $data_emprestimo = Carbon::now('America/Sao_Paulo');
    $multa = 0;
    $status = 'aberto';

    $usuarioDao = new UsuarioDAO($conexao);
	$usuario = $usuarioDao->buscaUsuario($id_usuario);

	$livroDao = new LivroDAO($conexao);
	$livro = $livroDao->buscaLivro($id_livro);

    $data_entrega = new Carbon(Carbon::now('America/Sao_Paulo')->addDays(7));

    $emprestimo = new Emprestimo(
                                $usuario, 
                                $livro, 
                                $data_emprestimo, 
                                $data_entrega, 
                                $multa, 
                                $status);

    $usuarioDao = new UsuarioDAO($conexao);
    $usuario = $usuarioDao->buscaUsuario($id_usuario);

    $emprestimoDao = new EmprestimoDAO($conexao);

    if($emprestimoDao->insereEmprestimo($emprestimo)){
      $_SESSION["success"] = "Empréstimo cadastrado com sucesso. Prazo para entrega: "."<strong>".Carbon::parse($emprestimo->getDataEntrega())->format('d/m/y').</strong>";
       header("Location: lista-livros.php");
       die();

    } else {
        $msg = mysqli_error($conexao);
        $_SESSION["danger"] = "O emprestimo para o usuário: ".$usuario->getNome()." não foi cadastrado. Erro: ".$msg;
        header("Location: lista-livros.php");
        die();
    } 
