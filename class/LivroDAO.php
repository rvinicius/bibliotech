<?php 

require_once("class/Livro.php");

class livroDAO
{
	private $conexao;

	function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function listaLivros() 
	{
		$livros = array();
		$resultado = mysqli_query($this->conexao, "SELECT * FROM livros ORDER BY id desc;");

		while($livro_array = mysqli_fetch_assoc($resultado)) {

			$nome_livro = $livro_array['nome'];
			$id_livro = $livro_array['id'];
			$isbn = $livro_array['isbn'];

			$livro = new Livro($nome_livro, $isbn);

			$livro->setId($id_livro);

			array_push($livros, $livro);
		}

		return $livros;
	}

	public function insereLivro(Livro $livro)
	{
		$query = "INSERT INTO livros(nome,isbn) values('{$livro->getNome()}','{$livro->getIsbn()}')";

		return mysqli_query($this->conexao, $query);
	}

}