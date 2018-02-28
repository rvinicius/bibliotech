<?php 

class Emprestimo
{
    private $id;
    private $id_usuario;
    private $id_livro;
    private $data_emprestimo;
    private $data_entrega;
    private $multa;
    private $status; 

    function __construct($id_usuario, $id_livro, $data_emprestimo, $data_entrega, $multa, $status )
    {
        $this->id_usuario = $id_usuario;
        $this->id_livro = $id_livro;
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

	public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getId_livro()
    {
        return $this->id_livro;
    }

    public function setId_livro($id_livro)
    {
    	$this->id_livro = $id_livro;
    }

    public function getData_emprestimo()
    {
        return $this->data_emprestimo;
    }

    public function setData_emprestimo($data_emprestimo)
    {
    	$this->data_emprestimo = $data_emprestimo;
    }

    public function getData_entrega()
    {
        return $this->data_entrega;
    }

    public function setData_entrega($data_entrega)
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