<?php

require_once(__DIR__.'/DAO.php');

class mensajesDAO extends DAO
{
    public function __construct(){
        parent::__construct();
    }
    
    public function select($col, $cond){
        $query = "";
        if ($col == "") {
            $col = "*";
        }
        if ($cond == "") {
            $query = "SELECT ".$col." FROM mensajes";
        }
        else {
            $query = "SELECT ".$col." FROM mensajes WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function insert($col, $values){
        $query = "";
        $query = "INSERT INTO mensajes(".$col.") VALUES (".$values.")";
        
        return $this->consultarv2($query);
    }
    
    public function update($set, $cond){
        $query = "";
        if ($cond != "") {
            $query = "UPDATE mensajes SET ".$set." WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function delete($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM mensajes WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
}
?>
