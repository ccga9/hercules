<?php

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

class FormularioNuevoTema extends Form {
    
    public function __construct()
    {
        parent::__construct('nuevoTema', array());
    }
    
    /**
     * Se encarga de orquestar todo el proceso de gestiÃ³n de un formulario.
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
        $ret .= '<legend>Tema</legend>';
        $ret .= '<div class="grupo-control">';
        $ret .= '<input type="text" name="tema"/>';
        $ret .= '</div>';
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
        
        if ( empty($text) || !ctype_alnum($text) ) {
            $erroresFormulario[] = "Texto inválido.";
        }
        
        $tema = isset($datos['tema']) ? htmlspecialchars(strip_tags(strtoupper($datos['tema']))) : null;
        $datos['tema'] = $tema;
        
        if ( empty($tema) || !ctype_alnum($tema) ) {
            $erroresFormulario[] = "Tema inválido.";
        }
        
        $datos['autor'] = $_SESSION['usuario'];
        $datos['fecha'] = date_default_timezone_set();
        $datos['resp'] = "0";
        $datos['tema'] = $datos['tema'];
        
        if (count($erroresFormulario) === 0) {
            $ctrl = controller::getInstance();
            $ctrl->nuevoMensaje($datos);
        }
        if (count($erroresFormulario) === 0) {
            $erroresFormulario = "mensaje.php?id='".$_GET['id_msg']."'";
        }
        
        return $erroresFormulario;
    }
}

?>