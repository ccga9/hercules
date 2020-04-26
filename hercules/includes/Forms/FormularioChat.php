<?php  

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

class FormularioChat extends Form {

	public function __construct()
    {
    	parent::__construct('chat', array());
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
    	$ret .= '<fieldset>';
    	  
           $ret .= '<div class="grupo-control">';
                $ret .= '<textarea name="men" rows="5" cols="40" placeholder="Escribe algo para mandar"></textarea>';
            $ret .= '</div>';
            
            $ret .= '<div class="grupo-control"><button type="submit" name="send">Enviar</button></div>';
		$ret .= '</fieldset>';

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
        $str = filter_var($_POST['men'], FILTER_SANITIZE_STRING);
        
        if (trim($str) != '') {
            $ctrl = controller::getInstance();
            $values=
            $ctrl->insertMensajes('emisor, receptor, texto,', $values);
        }
		

		if (count($erroresFormulario) === 0) {
			$erroresFormulario = "index.php";
		}
        return;
		//return miPerfilBuzon.php?reciever=;
    }
}

?>