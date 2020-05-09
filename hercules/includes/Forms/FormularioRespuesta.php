<?php

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

class FormularioRespuesta extends Form {
    
    private $id_r;
    
    public function __construct($id_msg)
    {
        parent::__construct('respuesta', array());
        $this->id_r = $id_msg;
    }
    
    /**
     * Se encarga de orquestar todo el proceso de gestión de un formulario.
     */
    public function gestiona()
    {
        parent::gestiona();
    }
    
    /**
     * Genera el HTML necesario para presentar los campos del formulario.
     *
     * @param string[] $datosIniciales Datos iniciales para los campos del formulario (normalmente <code>$_POST</code>).
     *
     * @return string HTML asociado a los campos del formulario.
     */
    protected function generaCamposFormulario($datosIniciales)
    {
        $ret = '';
        $ret .= '<div class="form-inicio">';
        $ret .= '<fieldset>';
        $ret .= '<legend>Responder</legend>';
        $ret .= '<div class="grupo-control">';
        $ret .= '<input type="text" name="texto"/>';
        $ret .= '</div>';
        $ret .= '<div class="grupo-control"><button type="submit" name="login">Enviar</button></div>';
        $ret .= '</fieldset>';
        $ret .= '</div>';
        
        return $ret;
    }
    
    /**
     * Procesa los datos del formulario.
     *
     * @param string[] $datos Datos enviado por el usuario (normalmente <code>$_POST</code>).
     *
     * @return string|string[] Devuelve el resultado del procesamiento del formulario, normalmente una URL a la que
     * se desea que se redirija al usuario, o un array con los errores que ha habido durante el procesamiento del formulario.
     */
    protected function procesaFormulario($datos)
    {
        $erroresFormulario = array();
        
        $text = isset($datos['texto']) ? htmlspecialchars(strip_tags(strtoupper($datos['texto']))) : null;
        $datos['texto'] = $text;
        
        if ( empty($text)) {
            $erroresFormulario[] = "Respuesta inv�lida.";
        }
        
        if ( strlen($text) > 500 ) {
            $erroresFormulario[] = "El texto no puede contener m�s de 500 caracteres.";
        }
        
        $datos['autor'] = $_SESSION['usuario']->getNombre();
        $datos['fecha'] = date_default_timezone_set('Europe/Madrid');
        $datos['id_r'] = $this->id_r;
        $datos['resp'] = "0";
        $datos['tema'] = "";
        
        if (count($erroresFormulario) === 0) {
            $ctrl = controller::getInstance();
            $ctrl->nuevoMensaje($datos);
        }
        
        if (count($erroresFormulario) === 0) {
           // $erroresFormulario = "mensaje.php?id_msg='".$datos['id_r']."'";
            $erroresFormulario = "foro.php";
        }
        
        return $erroresFormulario;
    }
}