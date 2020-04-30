<?php
/**
 * Data Access Object de usuario Usuario
 * Operaciones CRUD
 */

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/TOUsuario.php');

class UsuarioDAO extends DAO {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function selectUsuario($col, $cond){
        $query = "";
        if ($col == "") {
            $col = "*";
        }
        if ($cond == "") {
            $query = "SELECT ".$col." FROM usuario";
        }
        else {
            $query = "SELECT ".$col." FROM usuario WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function insertUsuario($col, $values){
        $query = "";
        $query = "INSERT INTO usuario(".$col.") VALUES (".$values.")";
        
        return $this->consultarv2($query);
    }
    
    public function updateUsuario($set, $cond){
        $query = "";
        if ($cond != "") {
            $query = "UPDATE usuario SET ".$set." WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function deleteUsuario($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM usuario WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function selectUs_Ent($col, $cond){
        $query = "";
        if ($col == "") {
            $col = "*";
        }
        if ($cond == "") {
            $query = "SELECT ".$col." FROM usuarioentrenador";
            echo $query;
        }
        else {
            $query = "SELECT ".$col." FROM usuarioentrenador WHERE ".$cond;
            echo $query;
        }
        
        return $this->consultarv2($query);
    }
    
    public function insertUs_Ent($col, $values){
        $query = "";
        $query = "INSERT INTO usuarioentrenador(".$col.") VALUES (".$values.")";
        
        echo $query;
        return $this->consultarv2($query);
    }
    
    public function updateUs_Ent($set, $cond){
        $query = "";
        if ($cond != "") {
            $query = "UPDATE usuarioentrenador SET ".$set." WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function deleteUs_Ent($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM usuarioentrenador WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }

    public function eliminarIdUsuarioEntrenador($nif_user, $nif_entrena, $idUsuarioEntrenador){
        
        $query = "DELETE FROM `usuarioentrenador` WHERE entrenador = '".$nif_entrena."' AND usuario = '".$nif_user."' AND id = '".$idUsuarioEntrenador."'";
       echo $query;
        return $this->consultar($query);

    }
}

?>
