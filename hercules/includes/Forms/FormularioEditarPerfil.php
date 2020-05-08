<?php  

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../../miPerfilEditar.php');
require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../controller.php');


class FormularioEditarPerfil extends Form {

  
	public function __construct()
    {
    	parent::__construct('miPerfilEditar', array());
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
        $ret .= '<legend>MODIFICA</legend>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<input type="hidden" name="MAX_FILE_SIZE" value="200000" />';
                $ret .= '<label>Sube foto</label><input name="uploadImage" type="file"  ';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<img src="'.$_SESSION['usuario']->getFoto().'" width="200" height="250" alt="Foto usuario">';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Tu NIF/NIE:</label> <input class="control" type="text" name="nif" value="'.$_SESSION['usuario']->getNif().'" readonly/>';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Tu nombre:</label> <input type="text" name="nombre" value="'.$_SESSION['usuario']->getNombre().'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Sexo:</label> <input type="text" name="nombre" value="'.$_SESSION['usuario']->getSexo().'"/>readonly';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Fecha de nacimiento</label> <input class="control" type="date" placeholder="&#128231;Fecha de nacimiento" name="fecha" id = "fecha" onclick="javascript:calcularEdad();" value="'.$_SESSION['usuario']->getFechaNac().'" required/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Tu email:</label> <input type="email" name="email" value="'.$_SESSION['usuario']->getEmail().'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Número de telefono</label> <input class="control" type="tel" placeholder="&#128231;(Opcional)" name="telefono" pattern="^[9|8|7|6]\d{8}$" value="'.$_SESSION['usuario']->getTelefono().'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Peso (Kgs)</label>  <input type="number"  name="peso" placeholder="0.0" step="0.01" min="40.0" max="150.0" value="'.$_SESSION['usuario']->getPeso().'" >';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Altura (cm)</label>  <input type="number"  name="altura" placeholder="0.0" step="0.01" min="100.0" max="250.0" value="'.$_SESSION['usuario']->getAltura().'">';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Preferencias</label> <input class="control" type="text" placeholder="&#128100;Introduce lo que buscas" name="preferencias" value="'.$_SESSION['usuario']->getPreferencias().'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Ubicación</label> <input class="control" type="text" placeholder="&#128100;Introduce tu ubicacion" name="preferencias" value="'.$_SESSION['usuario']->getUbicacion().'"/>';
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

        //FOTO
        if($_FILES['uploadImage']['name'] != ""){
             if (!$this->subir_fichero("includes/img/usuarios",'uploadImage', $datos['nif']))
                $erroresFormulario[] = "Foto incorrecta. Compruebe el formato del archivo";
             $datos['foto'] = "includes/img/usuarios/".$nif.".jpg";
        }else{
             $datos['foto'] = "";
        }

        
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