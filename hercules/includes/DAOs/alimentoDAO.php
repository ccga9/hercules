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
    	$query = "SELECT nombre from alimento";

    	/*$nombres = array();
    	while ($query['nombre'])
    	{
    		array_push($nombres, $query['nombre']);
    	}*/
    	return $this->consultar($query);
    }

    /*public function consulta($idAlimento) 
    {   
        $query = "SELECT * FROM alimento WHERE idAlimento = ".$idAlimento."";

        $res = consultar($query);
        $fila = $res->fetch_assoc();

        $alimento = new alimentoTO();
        $alimento->set_idAlimento($fila['idAlimento']);
        $alimento->set_nombre($fila['nombre']);
        $alimento->set_caloríasTotales($fila['caloriasTotales']);
        $alimento->set_carbohidratos($fila['carbohidratos']);
        $alimento->set_proteínas($fila['proteínas']);
        $alimento->set_grasas($fila['grasas']);

        return $alimento;
    }*/

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
?>
