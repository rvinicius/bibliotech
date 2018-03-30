<?php 
class Administrador
{
    private $id;
    private $nome;
    private $login;
    private $senha;

    public function __construct($id, $nome, $login, $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function realizaLogin()
    {
        $_SESSION["usuario_logado"] = $this->login;
    }

    private static function estaLogado()
    {
        return isset($_SESSION['usuario_logado']);
    }

    public static function verificaUsuario()
    {
        if (!(self::estaLogado()) && basename($_SERVER['PHP_SELF']) != 'index.php') {
            $_SESSION["danger"]= "Você não tem acesso a essa informação.";
            header("Location: index.php");
            die();
        }
    }

    public static function logout()
    {
        session_destroy();
        session_start();
    }
}