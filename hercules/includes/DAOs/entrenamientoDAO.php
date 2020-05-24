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
    
   public function updateEntrenamiento($datos){
       $query= "UPDATE entrenamiento set nombre = '".$datos['nombre']."', fecha = '".$datos['fecha']."', repeticiones = '".$datos['repeticiones']."' where idEntrenamiento = '".$datos['idEntrenamiento']."'";

        print_r($query);
       return $this->consultar($query);
    
	}
    

    public function delete($idEntrenamiento){

        $query= "DELETE FROM entrenamiento where idEntrenamiento = ". $idEntrenamiento;
        
        $this->consultar($query);
    }
    
    public function selectEntrena($col, $cond){
        $query = "";
        if ($col == "") {
            $col = "*";
        }
        if ($cond == "") {
            $query = "SELECT ".$col." FROM entrenamiento";
        }
        else {
            $query = "SELECT ".$col." FROM entrenamiento WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function insertEntrena($col, $values){
        $query = "";
        $query = "INSERT INTO entrenamiento(".$col.") VALUES (".$values.")";
        
        return $this->consultarv2($query);
    }
    
    public function updateEntrena($set, $cond){
        $query = "";
        if ($cond != "") {
            $query = "UPDATE entrenamiento SET ".$set." WHERE ".$cond;
        }
        echo $query;
        return $this->consultarv2($query);
    }
    
    public function deleteEntrena($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM entrenamiento WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
}