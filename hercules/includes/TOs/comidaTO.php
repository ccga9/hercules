<?php
class comida
{
	private $idComida;
	private $dia;
	private $tipo;
	private $usuario;

	public function __construct()
	{
		$this->idComida = 0;
		$this->dia = "00/00/00";
		$this->tipo = "";
		$this->usuario = "";
	}

	public function get_idComida()
	{
		return $this->idComida;
	}
	public function get_dia()
	{
		return $this->dia;
	}
	public function get_tipo()
	{
		return $this->tipo;
	}
	public function get_usuario()
	{
		return $this->usuario;
	}


	public function set_idComida($id)
	{
		$this->idComida = $id;
	}
	public function set_dia($d)
	{
		$this->dia = $d;
	}
	public function set_tipo($t)
	{
		$this->tipo = $t;
	}
	public function set_usuario($u)
	{
		$this->usuario = $u;
	}
}
?>
