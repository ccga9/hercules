<?php
class comida
{
	private $dia;
	private $tipo;
	private $usuario;
	private $comida;

	public function __construct()
	{
		$this->dia = "00/00/00";
		$this->tipo = "";
		$this->usuario = "";
		$this->comida = "";
	}
	/*public function __construct($d, $t, $u, $c)
	{
		$this->dia = $d;
		$this->tipo = $t;
		$this->usuario = $u;
		$this->comida = $c;
	}*/

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
	public function get_comida()
	{
		return $this->comida;
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
	public function set_comida($c)
	{
		$this->comida = $c;
	}
}
?>
