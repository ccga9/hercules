<?php

include_once('DAO.php');
include_once('alimentoTO.php');

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

    public function consulta($idAlimento)
    {
    	$filas = SelectArray("SELECT * from alimento where idAlimento = '\"$idAlimento\"'");
    	/*$fila = $filas[0];

    	$a = new alimento();
    	$a->get_idAlimento() = $fila['idAlimento'];
    	$a->get_nombre() = $fila['nombre'];
    	$a->get_caloríasConsumidas() = $fila['caloriasConsumidas'];
    	$a->get_carbohidratos() = $fila['carbohidratos'];
    	$a->get_proteínas() = $fila['proteínas'];
    	$a->get_grasas() = $fila['grasas'];

    	return $a;*/

    	return $this->consultar($query);
    }

    public function inserta(alimento $a)
    {
    	$query = "INSERT into alimento (nombre, caloriasConsumidas, carbohidratos, proteínas, grasas) values (\"$a->get_nombre()\"','\"$a->get_caloríasConsumidas()\"','\"$a->get_carbohidratos()\"','\"$a->get_proteínas()\"','\"$a->get_grasas()\"') where idAlimento = '\"$a->get_idAlimento()\"'";

    	return $this->insertar($query);
    }

    public function actualiza(alimento $a)
    {
    	$query = "UPDATE alimento (nombre, caloriasConsumidas, carbohidratos, proteínas, grasas) values (\"$a->get_nombre()\"','\"$a->get_caloríasConsumidas()\"','\"$a->get_carbohidratos()\"','\"$a->get_proteínas()\"','\"$a->get_grasas()\"') where idAlimento = '\"$a->get_idAlimento()\"'";

    	return $this->modificar($query);
    }

    public function elimina(alimento $a)
    {
    	$query = "DELETE alimento where idAlimento = '\"$a->get_idAlimento()\"'";

    	return $this->eliminar($query);
    }

}
?>
