<?php  

require('Form.php');
require('usuarioDAO.php');

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
           $ret .= '<legend>Usuario y contraseña</legend>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<label>NIF/NIE:</label> <input type="text" name="nombreUsuario"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Password:</label> <input type="password" name="password" />';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control"><button type="submit" name="login">Entrar</button></div>';
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

		$nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;

		if ( empty($nombreUsuario) ) {
			$erroresFormulario[] = "El nombre de usuario no puede estar vacío";
		}

		$password = isset($datos['password']) ? $datos['password'] : null;
		if ( empty($password) ) {
			$erroresFormulario[] = "El password no puede estar vacío.";
		
		}

		if (count($erroresFormulario) === 0) {
	
			$us = usuario::buscaUsuario($nombreUsuario);
			if ($us != false) {
				if (!$us->compruebaPassword($password)) {
					$erroresFormulario[] = "El usuario o el password no coinciden";
				}
				else {
					$_SESSION['login'] = true;
					$_SESSION['nombre'] = $nombreUsuario;
					$_SESSION['esAdmin'] = $us->isAdmin();
				}
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