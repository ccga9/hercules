<?php

/**
 * Esta clase controller tendremos que decidir si queremos que este todo aqui o se crea un Servicio de Aplicacion (SA) para cada tipo... (usuario, comida, ejercicio...)
 * @author gcarrero
 *
 */

class controller{
    
    //Funciones relacionadas con el usuario
    public static function cargarUsuario($nif){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->cargarUsuario($nif);
    }
}

