<?php
/**
 * Data Access Object de usuario Usuario
 * Operaciones CRUD
 */

include_once('DAO.php');
include_once('aplicacion.php');
include_once('TOUsuario.php');

class UsuarioDAO extends DAO {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function cargarUsuario($nif){
        $usuario = new TOUsuario($nif);
        $query = "SELECT * FROM usuarios WHERE nif = '". $nif ."'";
        
        $res = $this->consultar($query);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $usuario = new TOUsuario();
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
            return $usuario;
        } else{
            return null;
        }
    }

    public function login($arr = array()){
        $usuario = $this->cargarUsuario($arr['nif']);
        if ($usuario != null) {
            if (password_verify ($arr["contrasenna"], $usuario->getPassword())) {
                return $usuario;
            }
            else {
                return null;
            }
        }
        return null;
    }

    public function registra($arr = array()){
        $usuario = $this->cargarUsuario($arr['nif']);
        if ($usuario == null) {
            $usuario = new TOUsuario();
            $usuario->setNif($arr["nif"]);
            $usuario->setNombre($arr["nombre"]);
            $usuario->setPassword(password_hash($arr["contrasenna"], PASSWORD_DEFAULT));
            $usuario->setEmail($arr["email"]);
            $usuario->setTipoUsuario($arr["tipoUsuario"]);
            return  $this->add($usuario);
        }
        else {
            return null;
        }
    }
    
    public function add(TOUsuario $u){

        $query = 'INSERT INTO `usuarios` (`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`) VALUES '
        . "('" . $u->getNif() . "', 
        '" . $u->getNombre() . "',
        '" . $u->getPassword() . "',
        NULL,
        '" . $u->getEmail() . "',
        NULL,
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        '" . $u->getTipoUsuario() . "')";

        if ($this->insertar($query)) {
            return $u;
        }
        else {
            return null;
        }
    }
    
    public function update(TOUsuario $u){
        $query("UPDATE usuarios (nombre,contrasenna,email,sexo,fechaNac,telefono,ubicacion,peso,altura,preferencias,tipoUsuario,titulacion,especialidad,experiencia) values 
(" . $u->nombre . "," . $u->contrasenna . "," . $u->$email . "," . $u->sexo . "," . $u->fechaNac . "," . $u->telefono . "," . $u->ubicacion . "," . $u->peso . "," .
            $u->altura . "," . $u->preferencias . "," . $u->tipoUsuario . "," . $u->titulacion . "," . $u->especialidad . "," . $u->experiencia . ") where nif = '" . $u->nif ."'");
    }
    
    public function delete(TOUsuario $u){
        $query("DELETE usuarios where nif = '" . $u->nif . "' ");
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
