<?php  

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../../miPerfilEntrenamientosRegistrar.php');
require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../controller.php');


class FormularioRegistrarEntrenamiento extends Form {

    private $idCliente;
	public function __construct()
    {
    	parent::__construct('registrarEntrenamiento', array());
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

    	$ret = '<div class="form-registro">';
    	$ret .= '<fieldset>';
           $ret .= '<legend>NUEVO ENTRENAMIENTO</legend>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<input type="hidden" name="cliente" value="'.$_GET['idCliente'].'"/>';
            $ret .= '</div>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<label>Nombre:</label> <input type="name" name="nombre"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Fecha:</label> <input type="date" name="fecha" min="'.date("Y-m-d",time()).'" />';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Repeticiones de cada ejercicio:</label> <input type="number" name="repeticiones"/>';
            $ret .= '</div>';
            $ctrl = controller::getInstance();
            $datos = $ctrl->listarEjercicios();
            foreach ($datos as $value) {
                    $ret .= '<label>'.$value.'</label> <input type="checkbox" name="ejercicios[]" value="'.$value.'"/>';
            }

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
       /* $hoy = date("Y-m-d");

        if ( $hoy < $datos['fecha'] ) {
            $erroresFormulario[] = "Fecha Incorrecta";
        }*/


        if ( $datos['repeticiones'] <= 0 ) {
            $erroresFormulario[] = "Numero de repeticiones incorrectas";

        }
        if(empty($datos['ejercicios']) ){
            $erroresFormulario[] = "Debes seleccionar al menos un ejercicio";
        }


         $ctrl = controller::getInstance();

         
		if (count($erroresFormulario) === 0) {
            //echo 'UserActual'.$_SESSION['usuario']->getNif()."<br>";
            //echo 'Cliente'.$datos['cliente']."<br>";
            $idUsuarioEntrenador = $ctrl->idUsuarioEntrenador($_SESSION['usuario']->getNif(), $datos['cliente']);
            //echo 'UsuEntr'.$idUsuarioEntrenador."<br>";
            $ctrl->nuevoEntrenamiento($datos, $idUsuarioEntrenador);

		}
 
		if (count($erroresFormulario) === 0) {
			$erroresFormulario = "miPerfilMisClientesPerfiles.php?id=".$datos['cliente'];
		}else{
            $erroresFormulario['idCliente'] = "miPerfilEntrenamientosRegistrar.php?idCliente=".$datos['cliente'];
        }

        return $erroresFormulario;
    }
}