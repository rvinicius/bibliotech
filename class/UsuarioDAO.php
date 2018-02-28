<?php require_once("class/Usuario.php");

class UsuarioDAO
{
	private $conexao;

	function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function listaUsuarios() 
	{
		$usuarios = array();
		$resultado = mysqli_query($this->conexao, "SELECT * FROM usuarios;");

		while($usuario_array = mysqli_fetch_assoc($resultado)) {

			$id = $usuario_array['id'];
			$nome = $usuario_array['nome'];
			$dataNascimento = $usuario_array['dataNascimento'];
			$cpf = $usuario_array['cpf'];
			$rg = $usuario_array['rg'];
			$email = $usuario_array['email'];
			$endereco = $usuario_array['endereco'];
			$telefone = $usuario_array['telefone'];


			$usuario = new Usuario($nome, $dataNascimento, $cpf, $rg, $email, $endereco, $telefone);

			$usuario->setId($id);

			array_push($usuarios, $usuario);
		}

		return $usuarios;
	}

	public function insereUsuario(Usuario $usuario)
	{
		$query = "INSERT INTO usuarios(nome, dataNascimento, cpf, rg, email, endereco, telefone) 
		values(
			'{$usuario->getNome()}',
			'{$usuario->getDataNascimento()}',
			'{$usuario->getCpf()}',
			'{$usuario->getRg()}',
			'{$usuario->getEmail()}',
			'{$usuario->getEndereco()}',
			'{$usuario->getTelefone()}'
		)";

		var_dump($query);

		return mysqli_query($this->conexao, $query);
	}

	public function buscaUsuario($id)
	{
		$query = "select * from usuarios where id={$id}";
		$resultado = mysqli_query($this->conexao, $query);
		$usuario_array = mysqli_fetch_assoc($resultado);

		$id = $usuario_array['id'];
		$nome = $usuario_array['nome'];
		$dataNascimento = $usuario_array['dataNascimento'];
		$cpf = $usuario_array['cpf'];
		$rg = $usuario_array['rg'];
		$email = $usuario_array['email'];
		$endereco = $usuario_array['endereco'];
		$telefone = $usuario_array['telefone'];

		$dataNascimentoFormatada = date("d/m/Y", strtotime($dataNascimento));

		$usuario = new Usuario($nome, $dataNascimentoFormatada, $cpf, $rg, $email, $endereco, $telefone);
		$usuario->setId($id);

		return $usuario;
	}

	public function alteraUsuario(Usuario $usuario)
	{
		$query = "update usuarios set 
		nome='{$usuario->getNome()}',
		dataNascimento='{$usuario->getDataNascimento()}',
		cpf='{$usuario->getCpf()}',
		rg='{$usuario->getRg()}',
		email='{$usuario->getEmail()}',
		endereco='{$usuario->getEndereco()}',
		telefone='{$usuario->getTelefone()}'
		 where id='{$usuario->getId()}'";

		return mysqli_query($this->conexao, $query);

	}

} 