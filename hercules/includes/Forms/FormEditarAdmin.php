<?php  

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../../adminEditar.php');
require_once(__DIR__.'/../controller.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');



class FormEditarAdmin extends Form {

  
	public function __construct()
    {
    	parent::__construct('editarAdmin', array());
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
        
    	$ret = '';
        $ret .= '<div class="form-registro">';
        
        $ret .= '<div class="grupo-control">
                    <label>Tu NIF/NIE</label><input class="control" type="text" name="nif" value="'.$_SESSION['usuario']->getNif().'" readonly/>
                </div>';
        
        $ret .= '<div class="grupo-control">
		              <label>Sube foto</label><input name="uploadImage" type="file"/>
		          </div>';
        $ret .= '<div class="grupo-control">
		              <label>¿Quieres cambiar tu contraseña? </label/>
		          </div>';
        $ret .= '<div class="grupo-control">
		              <label>Tu Password:</label> <input class="control" type="password" name="passwordA"/>
		          </div>';
        $ret .= '<div class="grupo-control">
		              <label>Nueva Password:</label> <input class="control" type="password" name="password"/>
		          </div>';
        $ret .= '<div class="grupo-control">
		              <label>Vuelve a introducir la nueva password Password:</label> <input class="control" type="password" name="password2" />
		          </div>';
        $ret .= '<button type="submit" name="admin_submit" value="edit_user">Confirmar</button>';
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
             $datos['foto'] = "includes/img/usuarios/".$datos['nif'].".jpg";
        }else{
             $datos['foto'] = "";
        }

		if (count($erroresFormulario) === 0) {
		   $ctrl = controller::getInstance();
		   $ctrl->updateAdmin($datos);
           $_SESSION['usuario'] = $ctrl->cargarUsuario($datos['nif']);
           $erroresFormulario = "adminEditar.php";
       }
        
 
		

        return $erroresFormulario;
    }
}