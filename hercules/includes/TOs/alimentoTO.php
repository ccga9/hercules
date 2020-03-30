<?php
class alimento
{
	private $idAlimento;
	private $nombre;
	private $caloríasConsumidas;
	private $carbohidratos;
	private $proteínas;
	private $grasas;

	public function __construct()
	{
		$this->idAlimento = 0;
		$this->nombre = "";
		$this->caloríasConsumidas = 0;
		$this->carbohidratos = 0;
		$this->proteínas = 0;
		$this->grasas = 0;
	}

	public function get_idAlimento()
	{
		return $this->idAlimento;
	}
	public function get_nombre()
	{
		return $this->nombre;
	}
	public function get_caloríasConsumidas()
	{
		return $this->caloríasConsumidas;
	}
	public function get_carbohidratos()
	{
		return $this->carbohidratos;
	}
	public function get_proteínas()
	{
		return $this->proteínas;
	}
	public function get_grasas()
	{
		return $this->grasas;
	}


	public function set_idAlimento($id)
	{
		$this->idAlimento = $id;
	}
	public function set_nombre($nom)
	{
		$this->nombre = $nom;
	}
	public function set_caloríasConsumidas($cc)
	{
		$this->caloríasConsumidas = $cc;
	}
	public function set_carbohidratos($carb)
	{
		$this->carbohidratos = $carb;
	}
	public function set_proteínas($prot)
	{
		$this->proteínas = $prot;
	}
	public function set_grasas($gras)
	{
		$this->grasas = $gras;
	}
}
?>
