<?php
    class Livro
    {

    private $id;
    private $nome;
    private $isbn;
    private $autor;
    private $disponibilidade;

    public function __construct($nome, $isbn, $autor, $disponibilidade)
    {
    	$this->nome = $nome;
        $this->isbn = $isbn;
        $this->autor = $autor;
        $this->disponibilidade = $disponibilidade;
    }

    public function getId()
    {
    	return $this->id;
    }

    public function setId($id)
    {
    	$this->id = $id;
    }

    public function getDisponibilidade()
    {
        return $this->disponibilidade;
    }

    public function setDisponibilidade($disponibilidade)
    {
        $this->disponibilidade = $disponibilidade;
    }

    public function getNome()
    {
    	return $this->nome;
    }

    public function setNome($nome)
    {
    	$this->nome = $nome;
    }

    public function getIsbn()
    {
    	return $this->isbn;
    }

    public function setIsbn($isbn)
    {
    	$this->isbn = $isbn;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
}