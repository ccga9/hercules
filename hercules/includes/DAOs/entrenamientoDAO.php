<?php
/**
 * Data Access Object de entrenamiento
 * Operaciones CRUD
 */

include_once('DAO.php');
include_once('aplicacion.php');
include_once('entrenamientoTO.php');

class entrenamientoDAO extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    
    private static function buscaEntrenamiento($id){
        $query = "SELECT * FROM entrenamiento_ejecicio WHERE id = '". $id ."'";
        $app = aplicacion::getInstance();
        $conn = $app->conexionBD();

        $res = $conn->query($query);
       
        if ($res){
			if($res->num_rows == 1) {
				$row = $res->fetch_assoc();
				$entrenamiento = new entrenamientoTO($row["id"],$row["tipo"]);
				$rs->free();
				return $entrenamiento;
			}
			$rs->free();
		}	
		else{
            return null;
        }
    }
    
    private static function inserta($entrenamiento){
     
        $app = aplicacion::getInstance();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO Entrenamiento(tipo) VALUES('%s')"
            , $conn->real_escape_string($entrenamiento->tipo));
        if ( $conn->query($query) ) {
            $entrenamiento->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $entrenamiento;
    
    }
    
    private static function update($entrenamiento){
     $app = aplicacion::getInstance();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE Entrenamiento E SET tipo = '%s' WHERE E.id=%i"
            , $conn->real_escape_string($entrenamiento->tipo)
            , $usuario->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el entrenamiento: " . $entrenamiento->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $entrenamiento;
    
	}
    
    private static function delete($entrenamiento){
        $query("DELETE Entrenamientos where id = '" . $entrenamiento->id . "' ");
    }
}

?>
