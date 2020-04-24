<?php  

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

class FormularioLogin extends Form {

	public function __construct()
    {
    	parent::__construct('login', array());
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
           $ret .= '<legend>INICIAR SESIÓN EN HÉRCULES</legend>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<label>NIF/NIE</label> <input type="text" placeholder="&#128100;NIF/NIE" Usuario name="nif"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>CONTRASEÑA</label> <input type="password" placeholder="&#128272;Contraseña" name="contrasenna" />';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control"><button type="submit" name="login">Iniciar sesión</button></div>';
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
    	$erroresFormulario = array();

        $nif = isset($datos['nif']) ? htmlspecialchars(strip_tags(strtoupper($datos['nif']))) : null;
        $datos['nif'] = $nif;

        if ( empty($nif) || mb_strlen($nif) != 9 || !ctype_alnum($nif) ) {
            $erroresFormulario[] = "NIF/NIE invalido.";
        }

		$password = isset($datos['contrasenna']) ? $datos['contrasenna'] : null;
        if ( empty($password) || mb_strlen($password) < 8 ) {
            $erroresFormulario[] = "La contraseña tiene que tener una longitud de al menos 8 caracteres.";
        }

		if (count($erroresFormulario) === 0) {
			$ctrl = controller::getInstance();
            $us = $ctrl->login($datos);

			if ($us != null) {
				$_SESSION['login'] = true;
				$_SESSION['usuario'] = $us;
			} else {
				// No se da pistas a un posible atacante
				$erroresFormulario[] = "El usuario o el password no coinciden";
			}
		}

		if (count($erroresFormulario) === 0) {
			$erroresFormulario = "index.php";
		}

        return $erroresFormulario;
    }
}

?>