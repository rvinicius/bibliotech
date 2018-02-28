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


    $date = DateTime::createFromFormat('d/m/Y', $dataNascimento);
    $dataFormatada = $date->format('Y-m-d');

    $usuario = new Usuario($nome, $dataFormatada, $cpf, $rg, $email, $endereco, $telefone);

    $usuarioDao = new UsuarioDao($conexao);
    
    $usuario->setId($_POST['id']);

    if($usuarioDao->alteraUsuario($usuario)){
      $_SESSION["success"] = "Usuário alterado com sucesso.";
       header("Location: lista-usuarios.php");
       die();

    } else {
        $msg = mysqli_error($conexao);
        $_SESSION["danger"] = "O usuario ".$usuario->getNome()." nao foi alterado. Erro: ".$msg;
        header("Location: lista-usuarios.php");
        die();
    } 