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
    
    public static function listarEntrenamientos($id){
        $query = "SELECT * FROM entrenamiento WHERE idUsuarioEntrenador = '". $id ."'";
        
        return $this->consultar($query);
    }
    

     public function cargarEntrenamiento($idEntrenamiento){
        $entrenamiento = new entrenamientoTO($idEntrenamiento);
        $query = "SELECT * FROM entrenamientoejercicio WHERE idEntrenamiento = '". $idEntrenamiento ."'";
        
        $res = $this->consultar($query);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $usuario = new TOUsuario();
            $usuario->setNif($nif);
            $usuario->setNombre($row["nombre"]);
            $usuario->setPassword($row["contrasenna"]);
            $usuario->setEmail($row["email"]);
            $usuario->setSexo($row["sexo"]);
            $usuario->setFechaNac($row["fechaNac"]);
            $usuario->setTelefono($row["telefono"]);
            $usuario->setUbicacion($row["ubicacion"]);
            $usuario->setPeso($row["peso"]);
            $usuario->setAltura($row["altura"]);
            $usuario->setPreferencias($row["preferencias"]);
            $usuario->setTipoUsuario($row["tipoUsuario"]);
            $usuario->setTitulacion($row["titulacion"]);
            $usuario->setEspecialidad($row["especialidad"]);
            $usuario->setExperiencia($row["experiencia"]);
            return $usuario;
        } else{
            return null;
        }
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
