<?php
/**
 * Data Access Object de entrenamiento
 * Operaciones CRUD
 */

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/entrenamientoTO.php');
include_once(__DIR__.'/../aplicacion.php');

class entrenamientoDAO extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    
    private static function listarEntrenamientos($id){
        $query = "SELECT * FROM entrenamiento WHERE idUsuarioEntrenador = '". $id ."'";
        
        return $this->consultar($query);
    }
    
    private static function inserta(entrenamientoTO $entrenamiento){
     
        $query= 'INSERT INTO entrenamiento (`idEntrenamiento`, `idUsuarioEntrenador`, `tipo`, `fecha`) VALUES '
        . "(" 
        . "'".$entrenamiento->getIdEntrenamiento()."'" 
        . ","
        . "'".$entrenamiento->getIdUsuarioEntrenador()."'"
        . "," 
        . "'".$entrenamiento->getTipo()."'"
        . ","
        . "'".$entrenamiento->getFecha()."'"
        . ")";

        return $this->consultar($query);
    
    }
    
    private static function update(entrenamientoTO $entrenamiento){
 
       $query= 'UPDATE entrenamiento (`idEntrenamiento`, `idUsuarioEntrenador`, `tipo`, `fecha`) VALUES '
        . "(" 
        . "'".$entrenamiento->getIdEntrenamiento()."'" 
        . ","
        . "'".$entrenamiento->getIdUsuarioEntrenador()."'"
        . "," 
        . "'".$entrenamiento->getTipo()."'"
        . ","
        . "'".$entrenamiento->getFecha()."'"
        . ")";
        
       return $this->consultar($query);
    
	}
    

    private static function delete($entrenamiento){

        $query= "DELETE entrenamiento where idEntrenamiento = '". $entrenamiento->idEntrenamiento ."'";

        return $this->consultar($query);
    }
}

?>
