<?php
/**
 * Data Access Object de usuario Usuario
 * Operaciones CRUD
 */

include_once('DAO.php');

class UsuarioDAO extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function insertarUsuario(){
        buscarUsuario();
    }
    
    //Falta probar y completar
    public function buscarUsuario(){
        $query = "SELECT * FROM prueba U WHERE U.nombre = 'uno'";
        $rs = $this->mysqli->query($query);
        $result = false;
        if(count($rs) == 1){
            $user = new TOUsuario($rs[0]['nombre']);
        }
        
        return $result;
    }
}

?>
