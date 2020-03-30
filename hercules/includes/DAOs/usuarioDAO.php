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

    public function consultarUsuario($nif){
        $query = "SELECT * FROM usuario WHERE nif = '". $nif ."'";
        return $this->consultar($query);
    }

    public function cargarUsuario($nif){
        $usuario = new TOUsuario($nif);
        $query = "SELECT * FROM usuario WHERE nif = '". $nif ."'";
        
        $res = $this->consultar($query);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $usuario = new TOUsuario();
            $usuario->setNif($nif);
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
            $usuario->setTitulacion($row["titulacion"]);
            $usuario->setEspecialidad($row["especialidad"]);
            $usuario->setExperiencia($row["experiencia"]);
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
            if ($arr["tipoUsuario"]) {
                $usuario->setTitulacion($arr["titulacion"]);
                $usuario->setEspecialidad($arr["especialidad"]);
                $usuario->setExperiencia($arr["experiencia"]);
            }
            return  $this->add($usuario);
        }
        else {
            return null;
        }
    }
    
    public function listarMisEntrenadores($nif){
        
        $query = "SELECT entrenador FROM usuarioentrenador WHERE usuario = '".$nif."' AND estado = 'aceptado'";
       
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
        $query = "INSERT INTO `usuarioentrenador` (`id`, `usuario`, `entrenador`, `estado`) VALUES (NULL, '".$nif_user."',
        '" . $nif_entrena . "',
        'pendiente')";
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
    

    public function add(TOUsuario $u){

        $query = 'INSERT INTO `usuario` (`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`, `titulacion`, `especialidad`, `experiencia`) VALUES '
        . "(" 
        . "'".$u->getNif()."'" 
        . ","
        . "'".$u->getNombre()."'"
        . "," 
        . "'".$u->getPassword()."'"
        . "," 
        . "NULL"
        . ","
        . "'".$u->getEmail()."'"
        . ","
        . "NULL"
        . "," 
        . "NULL"
        . "," 
        . "NULL"
        . "," 
        . "NULL"
        . "," 
        . "NULL"
        . "," 
        . "NULL"
        . "," 
        . "NULL"
        . "," 
        . "'".$u->getTipoUsuario()."'"
        . ",";
        $query .= ($u->getTitulacion() !== null)? "'".$u->getTitulacion()."'" : "NULL";
        $query .= ",";
        $query .= ($u->getEspecialidad() !== null)? "'".$u->getEspecialidad()."'" : "NULL";
        $query .= ",";
        $query .= ($u->getExperiencia() !== null)? "'".$u->getExperiencia()."'" : "NULL";
        $query .=  ")";

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
