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
    
    public function listarEntrenamientos($id){
        $query = "SELECT * FROM entrenamiento WHERE idUsuarioEntrenador = '". $id ."'";
        
        return $this->consultar($query);
    }
    

     public function cargarEntrenamiento($idEntrenamiento){
        $entrenamiento = new entrenamientoTO($idEntrenamiento);
        $query = "SELECT * FROM entrenamientoejercicio WHERE idEntrenamiento = '". $idEntrenamiento ."'";
        
        $res = $this->consultar($query);

        if ($res) {
            $row = $res->fetch_assoc();
            $entrenamiento = new entrenamientoTO();
            $entrenamiento->setIdEntrenamiento($idEntrenamiento);
            $entrenamiento->setIdUsuarioEntrenador($row["idUsuarioEntrenador"]);
            echo $row["nombre"];
            $entrenamiento->setNombre($row["nombre"]);
            $entrenamiento->setFecha($row["fecha"]);
            return $entrenamiento;
        } else{
            echo "No entra";
            return null;
        }
    }

    
    public function inserta(entrenamientoTO $entrenamiento){
     $fecha = null;
        $query= "INSERT INTO `entrenamiento` (`idUsuarioEntrenador`, `nombre`, `fecha`) VALUES(
        ".$entrenamiento->getIdUsuarioEntrenador()."
         , 
        '".$entrenamiento->getNombre()."'
         ,
       '".$entrenamiento->getFecha()."'
        )";
  
        return $this->consultar($query);
    
    }
    
    private static function update(entrenamientoTO $entrenamiento){
 
       $query= 'UPDATE entrenamiento (`idEntrenamiento`, `idUsuarioEntrenador`, `nombre`, `fecha`) VALUES '
        . "(" 
        . "'".$entrenamiento->getIdEntrenamiento()."'" 
        . ","
        . "'".$entrenamiento->getIdUsuarioEntrenador()."'"
        . "," 
        . "'".$entrenamiento->getNombre()."'"
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
