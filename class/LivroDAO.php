<?php 

require_once("class/Livro.php");

class LivroDAO
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

        while($livro_array = mysqli_fetch_assoc($resultado)){
            $nome_livro = $livro_array['nome'];
            $id_livro = $livro_array['id'];
            $isbn = $livro_array['isbn'];
            $autor = $livro_array['autor'];
            $disponibilidade = $livro_array['disponibilidade'];

            $livro = new Livro($nome_livro, $isbn, $autor, $disponibilidade);

            $livro->setId($id_livro);

            array_push($livros, $livro);
        }

        return $livros;
    }

    public function insereLivro(Livro $livro)
    {
        $query = "INSERT INTO livros(nome, isbn, autor, disponibilidade) 
                values('{$livro->getNome()}',
                '{$livro->getIsbn()}',
                '{$livro->getAutor()}',
                '{$livro->getDisponibilidade()}')";

        return mysqli_query($this->conexao, $query);
    }

    public function buscaLivro($id)
    {
        $query = "select * from livros where id={$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $livro_buscado = mysqli_fetch_assoc($resultado);

        $livro = new Livro($livro_buscado['nome'], $livro_buscado['isbn'], $livro_buscado['autor'], $livro_buscado['disponibilidade']);	
        $livro->setId($id);

        return $livro;
    }

    public function alteraLivro(Livro $livro)
    {
        $query = "UPDATE livros 
        set nome='{$livro->getNome()}',
            isbn='{$livro->getIsbn()}',
            autor='{$livro->getAutor()}',
            disponibilidade='{$livro->getDisponibilidade()}' 
            WHERE id='{$livro->getId()}'";
        var_dump($query);
        return mysqli_query($this->conexao, $query);

    }
    
    public function deletaLivro($id)
    {
        $query = "DELETE FROM livros WHERE id='{$id}'";

        return mysqli_query($this->conexao, $query);
    }

    public function buscaLivroPorIsbnOuNome($busca)
    {
        $livros = array();
        $query = "SELECT * FROM livros WHERE nome LIKE '%{$busca}%' OR isbn LIKE '%{$busca}%'";
        $resultado = mysqli_query($this->conexao, $query);
        while($livro_array = mysqli_fetch_assoc($resultado)) {

            $nome_livro = $livro_array['nome'];
            $id_livro = $livro_array['id'];
            $isbn = $livro_array['isbn'];
            $autor = $livro_array['autor'];
            $disponibilidade = $livro_array['disponibilidade'];

            $livro = new Livro($nome_livro, $isbn, $autor, $disponibilidade);

            $livro->setId($id_livro);

            array_push($livros, $livro);
        }

        return $livros;
    }

    public function listaLivrosDisponiveis(){
        $livros = array();
        $resultado = mysqli_query($this->conexao, "SELECT * FROM livros WHERE disponibilidade='disponivel';");

        while($livro_array = mysqli_fetch_assoc($resultado)) {

            $nome_livro = $livro_array['nome'];
            $id_livro = $livro_array['id'];
            $isbn = $livro_array['isbn'];
            $autor = $livro_array['autor'];
            $disponibilidade = $livro_array['disponibilidade'];

            $livro = new Livro($nome_livro, $isbn, $autor, $disponibilidade);

            $livro->setId($id_livro);

            array_push($livros, $livro);
        }
        return $livros;
    }

}
