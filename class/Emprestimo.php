<?php 

class Emprestimo
{
    private $id;
    private $usuario;
    private $livro;
    private $data_emprestimo;
    private $data_entrega;
    private $multa;
    private $status; 

    function __construct(Usuario $usuario, Livro $livro, $data_emprestimo, $data_entrega, $multa, $status)
    {
        $this->usuario = $usuario;
        $this->livro = $livro;
        $this->data_emprestimo = $data_emprestimo;
        $this->data_entrega = $data_entrega;
        $this->multa = $multa;
        $this->status = $status;
    }

    public function getId()
    {
    	return $this->id;
    }

    public function setId($id)
    {
    	$this->id = $id;
    }

	public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getLivro()
    {
        return $this->livro;
    }

    public function setLivro($livro)
    {
    	$this->livro = $livro;
    }

    public function getDataEmprestimo()
    {
        return $this->data_emprestimo;
    }

    public function setDataEmprestimo($data_emprestimo)
    {
    	$this->data_emprestimo = $data_emprestimo;
    }

    public function getDataEntrega()
    {
        return $this->data_entrega;
    }

    public function setDataEntrega($data_entrega)
    {
    	$this->data_entrega = $data_entrega;
    }

    public function getMulta()
    {
        return $this->multa;
    }

    public function setMulta($multa)
    {
    	$this->multa = $multa;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
    	$this->status = $status;
    }


}