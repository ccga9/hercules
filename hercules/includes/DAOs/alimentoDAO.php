<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/alimentoTO.php');

class alimentoDAO extends DAO
{
	public function __construct(){
        parent::__construct();
    }

    public function listarAlimentos()
    {
    	$query = "SELECT * FROM alimento ORDER BY nombre ASC";

    	$consulta = $this->consultar($query);
    	
    	$nombres = array();
    	while ($fila = mysqli_fetch_assoc($consulta))
    	{    	    
    	    array_push($nombres, $fila);
    	}
    	return $nombres;
    }

    public function inserta(alimentoTO $a)
    {
    	$query = "INSERT into alimento (nombre, caloriasConsumidas, carbohidratos, proteínas, grasas) values ('".$a->get_nombre()."','".$a->get_caloríasConsumidas()."','".$a->get_carbohidratos()."','".$a->get_proteínas()."','".$a->get_grasas()."') where idAlimento = '".$a->get_idAlimento()."'";

    	return $this->consultar($query);
    }

    public function actualiza(alimentoTO $a)
    {
    	$query = "UPDATE alimento (nombre, caloriasConsumidas, carbohidratos, proteínas, grasas) values (".$a->get_nombre()."','".$a->get_caloríasConsumidas()."','".$a->get_carbohidratos()."','".$a->get_proteínas()."','".$a->get_grasas()."') where idAlimento = '".$a->get_idAlimento()."'";

    	return $this->consultar($query);
    }

    public function elimina(alimentoTO $a)
    {
    	$query = "DELETE alimento where idAlimento = '".$a->get_idAlimento()."'";

    	return $this->consultar($query);
    }

}