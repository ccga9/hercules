<?php

/**
 * Esta clase controller tendremos que decidir si queremos que este todo aqui o se crea un Servicio de Aplicacion (SA) para cada tipo... (usuario, comida, ejercicio...)
 * @author gcarrero
 *
 */

require_once(__DIR__ . '/DAOs/usuarioDAO.php');
require_once(__DIR__ . '/DAOs/alimentoDAO.php');
require_once(__DIR__ . '/DAOs/comidaDAO.php');
require_once(__DIR__ . '/DAOs/entrenamientoDAO.php');
require_once(__DIR__ . '/DAOs/recomendacionesDAO.php');

class controller{

    private $usuarioDAO;
    private $alimentoDAO;
    private $comidaDAO;
    private $entrenamientoDAO;
    private $recomendacionesDAO;
    private $registrocomidaDAO;
    
    public function __construct(){
        $usuarioDAO = new UsuarioDAO();
        $alimentoDAO = new alimentoDAO();
        $comidaDAO = new comidaDAO();
        $entrenamientoDAO = new entrenamientoDAO();
        $recomendacionesDAO = new recomendacionesDAO();
    }
    
    //Funciones relacionadas con el usuario
    public static function consultarUsuario($nif){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->consultarUsuario($nif);
    }

/*public static function cargarUsuario($nif){
        $usuarioDAO = new UsuarioDAO();
        $consulta = $usuarioDAO->cargarUsuario($nif);
        $row = array(); 
        if ($consulta) {


        }
    }*/



    public function listarEntrenadores($nif=0){
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

    public function listarAlimentos()
    {
        $alimentoDAO = new alimentoDAO();
        $lista = $alimentoDAO->listarAlimentos();
        
        $nombres = array();
        $i = 0;
        while ($fila = mysqli_fetch_assoc($lista))
        {
            $nombres[$i] = $fila['nombre']; //i coincide con idAlimento - 1
            $i++;
        }
        return $nombres;
    }

}

