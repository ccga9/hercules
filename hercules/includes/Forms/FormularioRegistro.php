<?php  
require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

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
        $ret .= '<div class="form-registro">';
    	$ret .= '<fieldset>';
           $ret .= '<legend>REGISTRO DE USUARIO</legend>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<label>NIF/NIE:</label> <input class="control" type="text" placeholder="&#128100;NIF/NIE" name="nif" required autofocus/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Nombre completo:</label> <input class="control" type="text" placeholder="&#128100;Nombre y apellidos" name="nombre" required/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>E-mail:</label> <input class="control" type="text" placeholder="&#128231;Correo electrónico" name="email" required/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Password:</label> <input class="control" type="password" placeholder="&#128272;Contraseña" name="contrasenna" required/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Vuelve a introducir el Password:</label> <input class="control" type="password" placeholder="&#128272;Repita contraseña" name="contra2" required/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
            $ret .= '<input type="checkbox" name="tipoUsuario" value="ok"/><label>¿Eres entrenador/a? (Rellena los campos de abajo)</label>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Titulacion</label> <input class="control" type="text" placeholder="&#127891;Titulación" name="titulacion" />';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Especialidad</label> <input class="control" type="text" placeholder="&#127941;Especialidad" name="especialidad" />';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Experiencia</label> <input class="control" type="text" placeholder="&#9874;Experiencia" name="experiencia" />';
            $ret .= '</div>';

            $ret .= '<div class="botones"><button type="submit" name="registro">Registrar</button>';
            $ret .= '<button type="reset" name="limpiar">Limpiar</button></div>';
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

        $nif = isset($datos['nif']) ? htmlspecialchars(strip_tags(strtoupper($datos['nif']))) : null;
        $datos['nif'] = $nif;

        if ( empty($nif) || mb_strlen($nif) != 9 || !ctype_alnum($nif) ) {
            $erroresFormulario[] = "NIF/NIE invalido.";
        }

        $nombre = isset($datos['nombre']) ? htmlspecialchars(strip_tags(strtoupper($datos['nombre']))) : null;
        $datos['nombre'] = $nombre;

        if ( empty($nombre) || mb_strlen($nombre) < 3) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 3 caracteres";
        }

        $email = isset($datos['email']) ? htmlspecialchars(strip_tags($datos['email'])) : null;
        $datos['email'] = $email; 

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
        $datos['tipoUsuario'] = $rol;

        if ($rol == 1) {
            if ( !isset($datos['titulacion']) || empty($datos['titulacion']) ) {
                $erroresFormulario[] = "Como entrenador/a debes poner tu titulacion.";
            }
            if ( !isset($datos['especialidad']) || empty($datos['especialidad']) ) {
                $erroresFormulario[] = "Como entrenador/a debes poner tu especialidad.";
            }
            if ($datos['experiencia'] == 0) {
                $datos['experiencia'] == "Ninguna";
            }
            else if ( !isset($datos['experiencia']) || empty($datos['experiencia']) ) {
                $erroresFormulario[] = "Como entrenador/a debes poner tu experiencia.";
            }
        }

        if (count($erroresFormulario) === 0) {
            $ctrl = controller::getInstance();
            $us = $ctrl->registra($datos);
            
            if ($us !== 0) {
                $_SESSION['login'] = true;
                $_SESSION['usuario'] = $us;
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