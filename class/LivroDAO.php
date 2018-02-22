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

	public function buscaLivro($id)
	{
		$query = "select * from livros where id={$id}";
		$resultado = mysqli_query($this->conexao, $query);
		$livro_buscado = mysqli_fetch_assoc($resultado);

		$livro = new Livro($livro_buscado['nome'], $livro_buscado['isbn']);
		$livro->setId($id);

		return $livro;
	}

	public function alteraLivro(Livro $livro)
	{
		$query = "update livros set nome='{$livro->getNome()}', isbn='{$livro->getIsbn()}' where id='{$livro->getId()}'";
		var_dump($query);
		return mysqli_query($this->conexao, $query);

	}
    
    public function deletaLivro($id)
    {
        $query = "delete from livros where id='{$id}'";

        return mysqli_query($this->conexao, $query);
    }

}



















