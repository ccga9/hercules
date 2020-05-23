<?php  
require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

class FormNuevoAdmin extends Form {

	public function __construct()
    {
    	parent::__construct('registroAdmin', array());
    }

    /**
     * Se encarga de orquestar todo el proceso de gestión de un formulario.
     */
    public function gestiona()
    {   
        return parent::gestiona();
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
        $ret ='';
        
        $ret .= '<div class="form-registro">';
        $ret .= '<fieldset>';
        $ret .= '<legend>REGISTRO DE ADMINISTRADOR</legend>';
        
        $ret.='<div class="grupo-control">
				        <label>NIF/NIE:</label> <input class="control" type="text" placeholder="&#128100;NIF/NIE" name="nif" required autofocus/>
				      </div>';
        $ret.='<div class="grupo-control">
				        <label><label>Sube foto</label><input name="uploadImage" type="file" value= "includes/img/usuarios/default.png"/>
				      </div>';
        $ret.='<div class="grupo-control">
				        <label>Nombre completo:</label> <input class="control" type="text" placeholder="&#128100;Nombre y apellidos" name="nombre" required/>
				      </div>';
        $ret.='<div class="grupo-control">
				        <label>Password:</label> <input class="control" type="password" placeholder="&#128272;Contraseña" name="contrasenna" required/>
				      </div>';
        $ret.='<div class="grupo-control">
				        <label>Vuelve a introducir el Password:</label> <input class="control" type="password" placeholder="&#128272;Repita contraseña" name="contra2" required/>
				      </div>';
        $ret .= '</fieldset>';
        $ret .= '</div>';
        
        $ret .= '<div class="botones"><button type="submit" name="registro">Registrar</button>';
        $ret.='</form>';
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
        //FOTO
        if($_FILES['uploadImage']['name'] != ""){
             if (!$this->subir_fichero("includes/img/usuarios",'uploadImage', $datos['nif']))
                $erroresFormulario[] = "Foto incorrecta. Compruebe el formato del archivo";
             $datos['foto'] = "includes/img/usuarios/".$nif.".jpg";
        }else{
             $datos['foto'] = "includes/img/usuarios/default.png";
        }
        //NOMBRE
        $nombre = isset($datos['nombre']) ? htmlspecialchars(strip_tags(strtoupper($datos['nombre']))) : null;
        $datos['nombre'] = $nombre;

        if ( empty($nombre) || mb_strlen($nombre) < 3) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 3 caracteres";
        }
     
        //CONTRASEÑA
        $password = isset($datos['contrasenna']) ? $datos['contrasenna'] : null;
        if ( empty($password) || mb_strlen($password) < 8 ) {
            $erroresFormulario[] = "La contraseña tiene que tener una longitud de al menos 8 caracteres.";
        }
        $password2 = isset($datos['contra2']) ? $datos['contra2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $erroresFormulario[] = "Las contraseñas no coinciden.";
        }

        //ROL DEL USUARIO
        $rol = 2;
        $datos['tipoUsuario'] = $rol;
       
        
       if (count($erroresFormulario) === 0) {
            $ctrl = controller::getInstance();
            $us = $ctrl->registraAdmin($datos);
            
            if ($us === 0) {
                $erroresFormulario[] = "Error al consultar en la BD: Puede que el usuario ya exista";
            } 
        }

		if (count($erroresFormulario) === 0) {
		    $erroresFormulario = "";
			$erroresFormulario = "adminLista.php";
		}
        
        return $erroresFormulario;
    }
}