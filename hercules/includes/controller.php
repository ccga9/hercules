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
    
    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->alimentoDAO = new alimentoDAO();
        $this->comidaDAO = new comidaDAO();
        $this->entrenamientoDAO = new entrenamientoDAO();
        $this->recomendacionesDAO = new recomendacionesDAO();
    }
    
    //FUNCIONES USUARIODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    
    //Funciones relacionadas con el usuario
    public function consultarUsuario($nif){
        return $this->usuarioDAO->consultarUsuario($nif);
    }

    public function cargarUsuario($nif){
        return $this->usuarioDAO->cargarUsuario($nif);
    }


    public function listarEntrenadores($nif=0){
        //$usuarioDAO = new UsuarioDAO();
        $consulta = $this->usuarioDAO->listarEntrenadores($nif);

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
    
    public function listarMisEntrenadores($nif=0){
       
        $consulta = $this->usuarioDAO->listarMisEntrenadores($nif);
        
        $row = array();
        $entrena = array();
        
        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $user = $this->usuarioDAO->cargarUsuario($fila['entrenador']);
                $row['nombre'] = $user->getNombre();
                $row['titulacion'] = $user->getTitulacion();
                $row['especialidad'] = $user->getEspecialidad();
                $row['experiencia'] = $user->getExperiencia();
                
                $entrena[$fila['entrenador']] = $row;
            }
        }
        
        return $entrena;
    }

    public function listarSolicitudes($nif){
        $consulta = $this->usuarioDAO->listarSolicitudes($nif);
 
        $entrena = array();

        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $entrena[$fila['entrenador']] = $fila['estado'];
            }
        }

        return $entrena;
    }

    public function enviarSolicitud($nif_user, $nif_entrena){

        $consulta = $this->usuarioDAO->enviarSolicitud($nif_user, $nif_entrena);

        return $consulta;
    }

    public function miBuzon($nif){
        $consulta = $this->usuarioDAO->miBuzon($nif);

        $clientes = array();

        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $clientes[] = $fila['usuario'];
            }
        }

        $nom_clientes = array();

        foreach ($clientes as $value) {
            $u = $this->usuarioDAO->cargarUsuario($value);
            $nom_clientes[$u->getNif()] = $u->getNombre();
        }

        return $nom_clientes;
    }

    public function responderSolicitud($nif_entrena, $nif_cliente, $aceptar){
        $consulta = $this->usuarioDAO->responderSolicitud($nif_entrena, $nif_cliente, $aceptar);

        return $consulta;
    }
    
    //FIN FUNCIONES USUARIODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    

    //FUNCIONES ALIMENTODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    public function listarAlimentos()
    {
        $alimentoDAO = new alimentoDAO();
        $lista = $alimentoDAO->listarAlimentos();

        $nombres = array();
        $i = 0;
        while ($fila = $mysqli_fetch_assoc($lista))
        {
            $nombres[$i] = $fila['nombre']; //i coincide con idAlimento
            $i++;
        }
        return $nombres;
    }
    
    //FIN FUNCIONES ALIMENTODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    
    
}

