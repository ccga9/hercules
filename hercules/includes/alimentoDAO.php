<?php

include_once('DAO.php');
include_once('alimentoTO.php');

class alimentoDAO extends DAO
{
	public function __construct(){
        parent::__construct();
    }

    public function consulta($idAlimento)
    {
    	$filas = SelectArray("SELECT * from alimento where idAlimento = '\"$idAlimento\"'");
    	$fila = $filas[0];

    	$a = new alimento();
    	$a->get_idAlimento() = $fila['idAlimento'];
    	$a->get_nombre() = $fila['nombre'];
    	$a->get_caloríasConsumidas() = $fila['caloriasConsumidas'];
    	$a->get_carbohidratos() = $fila['carbohidratos'];
    	$a->get_proteínas() = $fila['proteínas'];
    	$a->get_grasas() = $fila['grasas'];

    	return $a;
    }

    //...
    
}
?>
