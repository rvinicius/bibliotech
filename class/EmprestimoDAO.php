<?php 

require_once("class/Emprestimo.php");

class EmprestimoDAO
{
	private $conexao;

	function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function listaEmprestimos() 
	{
		$emprestimos = array();
		// $resultado = mysqli_query(
		// 			$this->conexao,"SELECT * FROM emprestimos;");

		$resultado = mysqli_query($this->conexao, "SELECT emprestimos.*, usuarios.*, usuarios.nome AS nome_usuario, livros.*, livros.nome AS nome_livro, emprestimos.id AS id_emprestimo FROM emprestimos INNER JOIN usuarios ON emprestimos.id_usuario=usuarios.id INNER JOIN livros ON emprestimos.id_livro=livros.id;");

		while($emprestimo_array = mysqli_fetch_assoc($resultado)) {
			$id = $emprestimo_array['id_emprestimo'];
			$id_usuario = $emprestimo_array['id_usuario'];
			$id_livro = $emprestimo_array['id_livro'];
			$data_emprestimo = $emprestimo_array['data_emprestimo'];
			$data_entrega = $emprestimo_array['data_entrega'];
			$multa = $emprestimo_array['multa'];
			$status = $emprestimo_array['status'];

			//dados do usuario
			$nome_usuario = $emprestimo_array['nome_usuario'];
			$data_nascimento = $emprestimo_array['dataNascimento'];
			$cpf = $emprestimo_array['cpf'];
			$rg = $emprestimo_array['rg'];
			$email = $emprestimo_array['email'];
			$endereco = $emprestimo_array['endereco'];
			$telefone = $emprestimo_array['telefone'];

			$usuario = new Usuario($nome_usuario, $data_nascimento, $cpf, $rg, $email, $endereco, $telefone);
			$usuario->setId($id_usuario);

			//dados do livro
			$nome_livro = $emprestimo_array['nome_livro'];
			$isbn = $emprestimo_array['isbn'];
			$autor = $emprestimo_array['autor'];
			$disponibilidade = $emprestimo_array['disponibilidade'];

			$livro = new Livro($nome_livro, $isbn, $autor, $disponibilidade);
			$livro->setId($id_livro);

			// $usuarioDao = new UsuarioDAO($this->conexao);
			// $usuario = $usuarioDao->buscaUsuario($id_usuario);

			// $livroDao = new LivroDAO($this->conexao);
			// $livro = $livroDao->buscaLivro($id_livro);

			$emprestimo = new Emprestimo($usuario,
										 $livro,
										 $data_emprestimo,
										 $data_entrega,
										 $multa,
										 $status);

			$emprestimo->setId($id);

			array_push($emprestimos, $emprestimo);
		}
		return $emprestimos;
	}

	public function insereEmprestimo(Emprestimo $emprestimo)
	{
		$query = 
		"INSERT INTO emprestimos(id_usuario,
        						id_livro,
        						data_emprestimo,
        						data_entrega,
        						multa,
        						status) 
        						values('{$emprestimo->getUsuario()->getId()}',
        							   '{$emprestimo->getLivro()->getId()}',
        							   '{$emprestimo->getDataEmprestimo()}',
        							   '{$emprestimo->getDataEntrega()}',
        							   '{$emprestimo->getMulta()}',
        							   '{$emprestimo->getStatus()}');";
        $update = "UPDATE livros SET disponibilidade='indisponivel' WHERE id='{$emprestimo->getLivro()->getId()}'";

        $sql = $query.$update;

		return mysqli_multi_query($this->conexao, $sql);
	}

	public function buscaEmprestimo($id)
	{
		$query = "select * from emprestimo where id={$id}";
		$resultado = mysqli_query($this->conexao, $query);
		$emprestimo_buscado = mysqli_fetch_assoc($resultado);

		$usuarioDao = new UsuarioDAO($this->conexao);
		$usuario = $usuarioDao->buscaUsuario($usuario);

		$livroDao = new LivroDAO($this->conexao);
		$livro = $livroDao->buscaLivro($livro);

		$emprestimo = new Emprestimo(
									$usuario, 
									$livro, 
									$emprestimo_buscado['data_emprestimo'], 
									$emprestimo_buscado['data_entrega'], 
									$emprestimo_buscado['multa'], 
									$emprestimo_buscado['status']
									);
		$emprestimo->setId($id);

		return $emprestimo;
	}

	public function alteraEmprestimo(Emprestimo $emprestimo)
	{
		$query = "UPDATE emprestimos 
						SET
						id_usuario ='{$emprestimo->getUsuario()->getId()}',
						id_livro ='{$emprestimo->getLivro()->getId()}',
						data_emprestimo ='{$emprestimo->getDataEmprestimo()}',
						data_entrega ='{$emprestimo->getDataEntrega()}',
						multa ='{$emprestimo->getMulta()}',
						status='{$emprestimo->getId()}' 
						WHERE id='{$emprestimo->getId()}'";
		var_dump($query);
		return mysqli_query($this->conexao, $query);

	}
    
    public function deletaEmprestimo($id)
    {
        $query = "delete from emprestimos where id='{$id}'";

        return mysqli_query($this->conexao, $query);
    }


	public function buscaPorStatus($status)
	{
	$emprestimos = array();
	$resultado = mysqli_query($this->conexao, "
					SELECT emprestimos.*, usuarios.*, usuarios.nome AS nome_usuario, livros.*, livros.nome AS nome_livro, emprestimos.id AS id_emprestimo
					FROM emprestimos INNER JOIN usuarios ON emprestimos.id_usuario=usuarios.id
					INNER JOIN livros ON emprestimos.id_livro=livros.id
					WHERE status = '{$status}';");

		while($emprestimo_array = mysqli_fetch_assoc($resultado)) {
			$id = $emprestimo_array['id_emprestimo'];
			$id_usuario = $emprestimo_array['id_usuario'];
			$id_livro = $emprestimo_array['id_livro'];
			$data_emprestimo = $emprestimo_array['data_emprestimo'];
			$data_entrega = $emprestimo_array['data_entrega'];
			$multa = $emprestimo_array['multa'];
			$status = $emprestimo_array['status'];

			//dados do usuario
			$nome_usuario = $emprestimo_array['nome_usuario'];
			$data_nascimento = $emprestimo_array['dataNascimento'];
			$cpf = $emprestimo_array['cpf'];
			$rg = $emprestimo_array['rg'];
			$email = $emprestimo_array['email'];
			$endereco = $emprestimo_array['endereco'];
			$telefone = $emprestimo_array['telefone'];

			$usuario = new Usuario($nome_usuario, $data_nascimento, $cpf, $rg, $email, $endereco, $telefone);
			$usuario->setId($id_usuario);

			//dados do livro
			$nome_livro = $emprestimo_array['nome_livro'];
			$isbn = $emprestimo_array['isbn'];
			$autor = $emprestimo_array['autor'];
			$disponibilidade = $emprestimo_array['disponibilidade'];

			$livro = new Livro($nome_livro, $isbn, $autor, $disponibilidade);
			$livro->setId($id_livro);

			// $usuarioDao = new UsuarioDAO($this->conexao);
			// $usuario = $usuarioDao->buscaUsuario($id_usuario);

			// $livroDao = new LivroDAO($this->conexao);
			// $livro = $livroDao->buscaLivro($id_livro);

			$emprestimo = new Emprestimo($usuario,
										 $livro,
										 $data_emprestimo,
										 $data_entrega,
										 $multa,
										 $status);

			$emprestimo->setId($id);

			array_push($emprestimos, $emprestimo);
		}
		return $emprestimos;
	}

}

