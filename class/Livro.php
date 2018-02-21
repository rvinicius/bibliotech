<?php
    class Livro
    {

    private $id;
    private $nome;
    private $isbn;

    public function __construct($nome, $isbn)
    {
    	$this->nome = $nome;
        $this->isbn = $isbn;
    }

    public function getId()
    {
    	return $this->id;
    }

    public function setId($id)
    {
    	$this->id = $id;
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
}