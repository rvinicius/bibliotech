<?php 
    require_once("cabecalho.php");
    require_once("class/UsuarioDAO.php");

    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    $usuario = new Usuario($nome, $dataNascimento, $cpf, $rg, $email, $endereco, $telefone);

    $usuarioDao = new UsuarioDao($conexao);
    

    if($usuarioDao->insereUsuario($usuario)){
      $_SESSION["success"] = "Usuário cadastrado com sucesso.";
       header("Location: lista-usuarios.php");
       die();

    } else {
        $msg = mysqli_error($conexao);
        $_SESSION["danger"] = "O usuario ".$usuario->getNome()." nao foi cadastrado. Erro: ".$msg;
        header("Location: lista-usuarios.php");
        die();
    } 