<?php require_once("class/Administrador.php");

class AdministradorDAO
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function buscaAdministradorParaLogar($login, $senha)
    {
        $senhaMd5 = md5($senha);
        $login = mysqli_real_escape_string($this->conexao, $login);
        $query = "select * from administradores where login='{$login}' and 
        senha='{$senhaMd5}'";
        $resultado = mysqli_query($this->conexao, $query);
        $adm_array = mysqli_fetch_assoc($resultado);

        $id = $adm_array['id'];
        $nome = $adm_array['nome'];
        $login = $adm_array['login'];
        $senha = $adm_array['senha'];

        $adm = new Administrador($id, $nome, $login, $senha);

        return $adm;
    }
}
