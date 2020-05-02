<?php  

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../../editarMiPerfil.php');
require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../controller.php');


class FormularioEditarPerfil extends Form {

  
	public function __construct()
    {
    	parent::__construct('editarMiPerfil', array());
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
           $ret .= '<legend>Editar Perfil</legend>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<label>Modifica </label/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<input type="hidden" name="MAX_FILE_SIZE" value="200000" />';
                $ret .= '<label>Sube foto</label><input name="uploadImage" type="file"  ';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<img src="'.$_SESSION['usuario']->getFoto().'" width="300" height="120" alt="Foto usuario">';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Tu NIF/NIE:</label> <input class="control" type="text" name="nif" value="'.$_SESSION['usuario']->getNif().'" readonly/>';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Tu nombre:</label> <input type="text" name="nombre" value="'.$_SESSION['usuario']->getNombre().'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Tu email:</label> <input type="email" name="email" value="'.$_SESSION['usuario']->getEmail().'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>¿Quieres cambiar tu contraseña? </label/>';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Tu Password:</label> <input class="control" type="password" name="passwordA"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Nueva Password:</label> <input class="control" type="password" name="password"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Vuelve a introducir la nueva password Password:</label> <input class="control" type="password" name="password2" />';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control"><button type="submit" name="Enviar">Enviar</button></div>';
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

        //NOMBRE
        $nombre = isset($datos['nombre']) ? htmlspecialchars(strip_tags(strtoupper($datos['nombre']))) : null;
        $datos['nombre'] = $nombre;

        if ( empty($nombre) || mb_strlen($nombre) < 3) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 3 caracteres";
        }

        //EMAIL 
        $email = isset($datos['email']) ? htmlspecialchars(strip_tags($datos['email'])) : null;
        $datos['email'] = $email; 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroresFormulario[] = "E-mail invalido.";
        }

        //CONTRASEÑA

        $passwordA = isset($datos['passwordA']) ? $datos['passwordA'] : null;
        $password = isset($datos['password']) ? $datos['password'] : null;
        $password2 = isset($datos['password2']) ? $datos['password2'] : null;

        if(!empty($passwordA)){
            if(!password_verify ($passwordA, $_SESSION['usuario']->getPassword())){
                $erroresFormulario[] = "Contraseña incorrecta. No se puede modificar tu contraseña";
            }else{
                if ( empty($password) || mb_strlen($password) < 8 ) {
                    $erroresFormulario[] = "La contraseña nueva tiene que tener una longitud de al menos 8 caracteres.";
                }else{
                    if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
                    $erroresFormulario[] = "Las contraseñas no coinciden.";
                    }
                }
            } 
        }

        if((empty($passwordA)) && ($password != "" || $password2 != "")){
            $erroresFormulario[] = "Debes meter tu contraseña anterior para poder cambiarla.";
        }

        if (!$this->subir_fichero("includes/img/usuarios",'uploadImage', $datos['nif']))
                 $erroresFormulario[] = "Foto incorrecta. Compruebe el formato del archivo";

        $nif = isset($datos['nif']) ? htmlspecialchars(strip_tags(strtoupper($datos['nif']))) : null;
        $datos['foto'] = "includes/img/usuarios/".$_SESSION['usuario']->getNif().".jpg";
        $ctrl = controller::getInstance();
         

		if (count($erroresFormulario) === 0) {
            $ctrl->updateUsuario2($datos);

            $_SESSION['usuario'] = $ctrl->cargarUsuario($datos['nif']);

           $erroresFormulario = "miPerfil.php";
       }
        
 
		

        return $erroresFormulario;
    }
}

?>