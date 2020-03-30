<?php
class recomendacion
{
	private $entrenador; //emisor
	private $cliente; //receptor (usuario)
	private $fecha; //date
	private $recomendacion; //texto
	private $tipo; //varchar

	public function __construct()
	{
		$this->entrenador = "";
		$this->cliente = "";
		$this->fecha = "00/00/00";
		$this->recomendacion = "";
		$this->tipo = "";
	}
	/*public function __construct($entre, $clien, $fe, $reco, $t)
	{
		$this->entrenador = $entre;
		$this->cliente = $clien;
		$this->fecha = $fe;
		$this->recomendacion = $reco;
		$this->tipo = $t;
	}*/

	public function get_entrenador()
	{
		return $this->entrenador;
	}
	public function get_cliente()
	{
		return $this->cliente;
	}
	public function get_fecha()
	{
		return $this->fecha;
	}
	public function get_recomendacion()
	{
		return $this->recomendacion;
	}
	public function get_tipo()
	{
		return $this->tipo;
	}


	public function set_entrenador($entre)
	{
		$this->entrenador = $entre;
	}
	public function set_cliente($clien)
	{
		$this->cliente = $clien;
	}
	public function set_fecha($fe)
	{
		$this->fecha = $fe;
	}
	public function set_recomendacion($reco)
	{
		$this->recomendacion = $reco;
	}
	public function set_tipo($t)
	{
		$this->tipo = $t;
	}
}
?>
