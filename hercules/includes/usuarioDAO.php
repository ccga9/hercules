<?php
/**
 * Data Access Object de usuario Usuario
 * Operaciones CRUD
 */

include_once('DAO.php');
include_once('usuario.php');

class UsuarioDAO extends DAO{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function insertar(TOUsuario $u){
        
        $query("INSERT into usuarios (nombre,contrasenna,email,sexo,fechaNac,telefono,ubicacion,peso,altura,preferencias,tipoUsuario,titulacion,especialidad,experiencia) values 
(" . $u->nombre . "," . $u->contrasenna . "," . $u->$email . "," . $u->sexo . "," . $u->fechaNac . "," . $u->telefono . "," . $u->ubicacion . "," . $u->peso . "," .
            $u->altura . "," . $u->preferencias . "," . $u->tipoUsuario . "," . $u->titulacion . "," . $u->especialidad . "," . $u->experiencia . ") ");
    }
    
    public function update(TOUsuario $u){
        $query("UPDATE usuarios (nombre,contrasenna,email,sexo,fechaNac,telefono,ubicacion,peso,altura,preferencias,tipoUsuario,titulacion,especialidad,experiencia) values 
(" . $u->nombre . "," . $u->contrasenna . "," . $u->$email . "," . $u->sexo . "," . $u->fechaNac . "," . $u->telefono . "," . $u->ubicacion . "," . $u->peso . "," .
            $u->altura . "," . $u->preferencias . "," . $u->tipoUsuario . "," . $u->titulacion . "," . $u->especialidad . "," . $u->experiencia . ") where nif = '" . $u->nif ."'");
    }
    
    public function delete(TOUsuario $u){
        $query("DELETE usuarios where nif = '" . $u->nif . "' ");
    }
    
    /*public TOUsuario getUsuario($nif){
        $filas = SelectArray("SELECT * from usuarios where nif = '$nif'");
        $filas = $filas[0];
        
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
