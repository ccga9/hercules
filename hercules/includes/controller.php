<?php

/**
 * Esta clase controller tendremos que decidir si queremos que este todo aqui o se crea un Servicio de Aplicacion (SA) para cada tipo... (usuario, comida, ejercicio...)
 * @author gcarrero
 *
 */

require_once('usuarioDAO.php');

class controller{
    
    public function __construct(){}
    
    //Funciones relacionadas con el usuario
    public static function cargarUsuario($nif){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->cargarUsuario($nif);
    }

    public function listarEntrenadores($nif){
        $usuarioDAO = new UsuarioDAO();
        $consulta = $usuarioDAO->listarEntrenadores($nif);

        $row = array(); 
        $entrena = array();

        if ($consulta) {
        	while ($fila = mysqli_fetch_assoc($consulta)){
                $row['nombre'] = $fila['nombre'];
                $row['titulacion'] = $fila['titulacion'];
                $row['especialidad'] = $fila['especialidad'];
                $row['experiencia'] = $fila['experiencia'];

                $entrena[$fila['nif']] = $row;
        	}
        }

        return $entrena;
    }

    public function listarSolicitudes($nif){
        $usuarioDAO = new UsuarioDAO();
        $consulta = $usuarioDAO->listarSolicitudes($nif);
 
        $entrena = array();

        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $entrena[$fila['entrenador']] = $fila['estado'];
            }
        }

        return $entrena;
    }

    public function enviarSolicitud($nif_user, $nif_entrena){

        $usuarioDAO = new UsuarioDAO();
        $consulta = $usuarioDAO->enviarSolicitud($nif_user, $nif_entrena);

        return $consulta;
    }

    public function miBuzon($nif){
        $usuarioDAO = new UsuarioDAO();
        $consulta = $usuarioDAO->miBuzon($nif);

        $clientes = array();

        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $clientes[] = $fila['usuario'];
            }
        }

        $nom_clientes = array();

        foreach ($clientes as $value) {
            $u = $usuarioDAO->cargarUsuario($value);
            $nom_clientes[$u->getNif()] = $u->getNombre();
        }

        return $nom_clientes;
    }

    public function responderSolicitud($nif_entrena, $nif_cliente, $aceptar){
        $usuarioDAO = new UsuarioDAO();
        $consulta = $usuarioDAO->responderSolicitud($nif_entrena, $nif_cliente, $aceptar);

        return $consulta;
    }
}

