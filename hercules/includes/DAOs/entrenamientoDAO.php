<?php
/**
 * Data Access Object de entrenamiento
 * Operaciones CRUD
 */

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/entrenamientoTO.php');

class entrenamientoDAO extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    

    public function listarEntrenamientos($id){
        $query = "SELECT * FROM entrenamiento WHERE idUsuarioEntrenador = '". $id ."'";
        
        return $this->consultar($query);
    }
    
    public function crearEntrenamiento($datos, $idUsuarioEntrenador){
        $to = new entrenamientoTO("", $idUsuarioEntrenador, $datos['nombre'], $datos['fecha'], $datos['repeticiones']);
       //$id = $to->getIdUsuarioEntrenador();

       $this->inserta($to);
       
       $res = $this->buscarIdEntrenamiento($idUsuarioEntrenador,  $datos['nombre'], $datos['fecha'], $datos['repeticiones'] );
       //echo $idUsuarioEntrenador."<br>";
       if($res){
            $row = $res->fetch_assoc();
            $to->setIdEntrenamiento($row['idEntrenamiento']);
       }

        return $to;
    }

    public function buscarIdEntrenamiento($idUsuarioEntrenador, $nombre, $fecha, $repeticiones){
        $query = "SELECT idEntrenamiento FROM entrenamiento WHERE idUsuarioEntrenador = '".$idUsuarioEntrenador."' AND  nombre = '".$nombre."' AND fecha = '".$fecha."'  AND  repeticiones = '".$repeticiones."' ";

        return $this->consultar($query);
    }

     public function cargarEntrenamiento($idEntrenamiento){
        $entrenamiento = new entrenamientoTO($idEntrenamiento);
        $query = "SELECT * FROM entrenamiento WHERE idEntrenamiento = '". $idEntrenamiento ."'";
        
        $res = $this->consultar($query);

        if ($res) {
            $row = $res->fetch_assoc();
            $entrenamiento->setIdEntrenamiento($idEntrenamiento);
            $entrenamiento->setIdUsuarioEntrenador($row["idUsuarioEntrenador"]);
            $entrenamiento->setNombre($row["nombre"]);
            $entrenamiento->setFecha($row["fecha"]);
            $entrenamiento->setRepeticiones($row["repeticiones"]);
            return $entrenamiento;
        } else{
            echo "No entra";
            return null;
        }
    }

    
    public function inserta(entrenamientoTO $entrenamiento){
     $fecha = null;
    

        $query= "INSERT INTO `entrenamiento` (`idUsuarioEntrenador`, `nombre`, `fecha`, `repeticiones`) VALUES(
        '".$entrenamiento->getIdUsuarioEntrenador()."'
         , 
        '".$entrenamiento->getNombre()."'
         ,
       '".$entrenamiento->getFecha()."'
         , 
       '".$entrenamiento->getRepeticiones()."'
        )";

    
  
    return $this->consultar($query);
    
    }
    
    private static function update(entrenamientoTO $entrenamiento){
 
       $query= "UPDATE entrenamiento set nombre = '".$entrenamiento->getNombre()."', fecha = '".$entrenamiento->getFecha()."', repeticiones = '".$entrenamiento->getRepeticiones()."' where idEntrenamiento = '".$entrenamiento->getIdEntrenamiento()."'";
        
       return $this->consultar($query);
    
	}
    

    private static function delete($entrenamiento){

        $query= "DELETE entrenamiento where idEntrenamiento = '". $entrenamiento->idEntrenamiento ."'";

        return $this->consultar($query);
    }
}

?>
