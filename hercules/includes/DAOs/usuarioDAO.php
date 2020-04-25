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
    
    public function select($col, $cond){
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
    
    public function insert($col, $values){
        $query = "";
        $query = "INSERT INTO usuario(".$col.") VALUES (".$values.")";
        
        return $this->consultarv2($query);
    }
    
    public function update($set, $cond){
        $query = "";
        if ($cond != "") {
            $query = "UPDATE usuario SET ".$set." WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function delete($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM usuario WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function listarMisEntrenadores($nif){
        
        $query = "SELECT entrenador FROM usuarioentrenador WHERE usuario = '".$nif."' AND estado = 'aceptado'";
       
        return $this->consultar($query);
    }
    public function listarMisClientes($nif){
        
        $query = "SELECT usuario FROM usuarioentrenador WHERE entrenador = '".$nif."' AND estado = 'aceptado'";
       
        return $this->consultar($query);
    }

    public function listarEntrenadores($nif){
        if ($nif) {
            $query = "SELECT nif, nombre, titulacion, especialidad, experiencia FROM usuario WHERE tipoUsuario = 1 AND nif != '" .$nif."'";
        }
        else {
             $query = "SELECT nif, nombre, titulacion, especialidad, experiencia FROM usuario WHERE tipoUsuario = 1";
        }
        return $this->consultar($query);
    }

    public function listarSolicitudes($nif){
        $query = "SELECT entrenador, estado FROM usuarioentrenador WHERE usuario = '".$nif."'";
        return $this->consultar($query);
    }

    public function miBuzon($nif){
        $query = "SELECT usuario FROM usuarioentrenador WHERE entrenador = '".$nif."' AND estado = 'pendiente'";
        return $this->consultar($query);
    }

    public function enviarSolicitud($nif_user, $nif_entrena){
        $query = "INSERT INTO `usuarioentrenador` (`id`, `usuario`, `entrenador`, `estado`) VALUES (0, '".
        $nif_user."',
        '" . $nif_entrena . "',
        'pendiente')";
        return $this->consultar($query);
    }

    public function getIdUsuarioEntrenador($nif_user, $nif_entrena){
         $query = "SELECT id FROM usuarioentrenador WHERE entrenador = '".$nif_entrena."' AND usuario = '".$nif_user."'";
         return $this->consultar($query);

    }

    public function eliminarIdUsuarioEntrenador($nif_user, $nif_entrena, $idUsuarioEntrenador){
        
        $query = "DELETE FROM `usuarioentrenador` WHERE entrenador = '".$nif_entrena."' AND usuario = '".$nif_user."' AND id = '".$idUsuarioEntrenador."'";
       echo $query;
        return $this->consultar($query);

    }

    public function responderSolicitud($nif_entrena, $nif_cliente, $aceptar){
        if ($aceptar) {
             $query = "UPDATE `usuarioentrenador` SET estado='aceptado' WHERE entrenador = '".$nif_entrena."' AND usuario = '".$nif_cliente."'";
        }
        else {
            $query = "DELETE FROM `usuarioentrenador` WHERE entrenador = '".$nif_entrena."' AND usuario = '".$nif_cliente."'";
        }
        
        return $this->consultar($query);
    }
   
    
    /*public function getUsuario($nif){
        $filas = SelectArray("SELECT * from usuarios where nif = '$nif'");
        $fila = $filas[0];
        
        $u = new TOUsuario();
        $u->nombre = $fila['nombre'];
        $u->contrasenna = $fila['contrasenna'];
        $u->email = $fila['email'];
        $u->sexo = $fila['sexo'];
        $u->fechaNac = $fila['fechaNac'];
        $u->telefono = $fila['telefono'];
        $u->ubicacion = $fila['ubicacion'];
        $u->peso = $fila['peso'];
        $u->altura = $fila['altura'];
        $u->preferencias = $fila['preferencias'];
        $u->tipoUsuario = $fila['tipoUsuario'];
        $u->titulacion = $fila['titulacion'];
        $u->especialidad = $fila['especialidad'];
        $u->experiencia = $fila['experiencia'];
    }*/
    
    /*public function insertarUsuario(){
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
     }*/
}

?>
