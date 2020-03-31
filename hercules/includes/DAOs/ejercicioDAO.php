<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/ejercicioTO.php');

class ejercicioDAO extends DAO
{
	public function __construct(){
        parent::__construct();
    }

    public function listarEjercicios($idEntrenamiento)
    {
        $query = "SELECT * from entrenamientoejercicio WHERE $idEntrenamiento = '". $idEntrenamiento ."'";
    	
    	return $this->consultar($query);
    }

    public function cargarEjercicio($idEjercicio) 
    {   
        $query = "SELECT * FROM ejercicio WHERE idEjercicio = '". idEjercicio ."'";
        
        $res = consultar($query);
        $fila = $res->fetch_assoc();

        $ejercicio = new ejercicioTO();
        $ejercicio->setIdEjercicio($fila['idEjercicio']);
        $ejercicio->setNombre($fila['nombre']);
        $ejercicio->setCaloriasGastadas($fila['caloriasGastadas']);
        $ejercicio->setTipo($fila['tipo']);
        $ejercicio->setDescripcion($fila['descripcion']);
        $ejercicio->setMultimedia($fila['multimedia']);

        return $ejercicio;
    }

}
?>
