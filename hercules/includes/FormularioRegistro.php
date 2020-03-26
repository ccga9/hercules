<?php  
require('Form.php');
require('usuarioDAO.php');

class FormularioRegistro extends Form {

	public function __construct()
    {
    	parent::__construct('registro', array());
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
                $ret .= '<label>NIF/NIE:</label> <input class="control" type="text" name="nif"/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Nombre completo:</label> <input class="control" type="text" name="nombre" />';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>E-mail:</label> <input class="control" type="text" name="email" />';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Password:</label> <input class="control" type="password" name="contrasenna" />';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="contra2" />';
            $ret .= '</div>';

            $ret .= '<input type="checkbox" name="tipoUsuario" value="ok">¿Eres entrenador/a?';

            $ret .= '<div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>';
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

        $nif = isset($datos['nif']) ? strtoupper($datos['nif']) : null;

        if ( empty($nif) || mb_strlen($nif) != 9 || !ctype_alnum($nif) ) {
            $erroresFormulario[] = "NIF/NIE invalido.";
        }

        $nombre = isset($datos['nombre']) ? strtoupper($datos['nombre']) : null;

        if ( empty($nombre) || mb_strlen($nombre) < 5) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 5 caracteres";
        }

        $email = isset($datos['email']) ? $datos['email'] : null;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroresFormulario[] = "E-mail invalido.";
        }

        $password = isset($datos['contrasenna']) ? $datos['contrasenna'] : null;
        if ( empty($password) || mb_strlen($password) < 8 ) {
            $erroresFormulario[] = "La contraseña tiene que tener una longitud de al menos 8 caracteres.";
        }
        $password2 = isset($datos['contra2']) ? $datos['contra2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $erroresFormulario[] = "Las contraseñas no coinciden.";
        }

        $rol = isset($datos['tipoUsuario']) ? 1 : 0;

        if (count($erroresFormulario) === 0) {
            $us = UsuarioDAO::registra($datos);
            if ($us != null) {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $nombre;
            } else {
                $erroresFormulario[] = "Error al consultar en la BD: Puede que el usuario ya exista";
            }
        }

		if (count($erroresFormulario) === 0) {
			$erroresFormulario = "index.php";
		}

        return $erroresFormulario;
    }
}

?>