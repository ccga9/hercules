<?php
/**
 * Data Access Object de registrocomida
 * Operaciones CRUD
 */

include_once('DAO.php');

class registrocomidaDAO extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function insertaRegistro($dia, $tipo, $usuario, $comida){
        $query = "INSERT INTO registrocomida(dia, tipo, usuario, comida) VALUES
        ('".$dia."'".$tipo."'".$usuario."'".$comida."')";
        
        insertar($query);
    }
    
    public function modificaRegistro($dia, $tipo, $usuario, $comida){
        $query = "UPDATE registrocomida SET comida = '".$comida."' WHERE usuario = '".$usuario."'
        AND dia = '".$dia."' AND tipo = '".$tipo."'";
        
        modificar($query);
    }
    
    public function consultaRegistro($dia, $tipo, $usuario){
        $query = "SELECT comida FROM registrocomida WHERE dia = '".$dia."' AND tipo = '".$tipo."' 
        AND usuario = '".$usuario."'";
        
       $rs = consultar($query);
       //Hacer cosas con $rs. :))
    }
    
    public function eliminaRegistro($dia, $tipo, $usuario){
        $query = "DELETE FROM registrocomida WHERE dia = '".$dia."' AND tipo = '".$tipo."'
        AND usuario = '".$usuario."'";
        
        eliminar($query);
    }
}

?>
