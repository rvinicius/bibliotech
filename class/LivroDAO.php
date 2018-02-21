<?php 

require_once("class/Livro.php");

class livroDAO {

	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function listaLivros() {

		$livros = array();
		$resultado = mysqli_query($this->conexao, "SELECT * FROM livros ORDER BY id desc;");

		while($livro_array = mysqli_fetch_assoc($resultado)) {

			$nome_livro = $livro_array['nome'];
			$id_livro = $livro_array['id'];
			$isbn = $livro_array['isbn'];

			$livro = new Livro($id_livro, $nome_livro, $isbn);


			array_push($livros, $livro);
		}

		return $livros;
	}
}