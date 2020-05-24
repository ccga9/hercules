<?php  

require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../../editarEntrenamiento.php');
require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../controller.php');


class FormularioEditarEntrenamiento extends Form {

	public function __construct()
    {
    	parent::__construct('editarEntrenamiento', array());
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

        $a = stripcslashes($_GET['id']);
        $entrenamiento = unserialize($a);
    
    	$ret = '<div class="form-registro">';
    	$ret .= '<fieldset>';
           $ret .= '<legend>EDITAR ENTRENAMIENTO</legend>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<input type="hidden" name="datosEntrenamiento" value="'.$a.'"/>';
            $ret .= '</div>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<input type="hidden" name="idEntrenamiento" value="'.$entrenamiento['id'].'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<input type="hidden" name="idCliente" value="'.$_GET['cliente'].'"/>';
            $ret .= '</div>';
           $ret .= '<div class="grupo-control">';
                $ret .= '<label>Nombre:</label> <input type="name" name="nombre" value="'.$entrenamiento['nombre'].'"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Fecha:</label> <input type="date" name="fecha" min="'.date("Y-m-d",time()).'" value="'.$entrenamiento['fecha'].'" />';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Repeticiones de cada ejercicio:</label> <input type="number" name="repeticiones" value="'.$entrenamiento['repeticiones'].'"/>';
            $ret .= '</div>';
            $ctrl = controller::getInstance();
            $datos = $ctrl->listarEjercicios();
            foreach ($datos as $value) {
                $esta=false;
                foreach($entrenamiento['ejercicios'] as $ent){
                    if ($ent['nombreEjercicio'] == $value){
                         $ret .= '<label>'.$value.'</label> <input type="checkbox" name="ejercicios[]" value="'.$value.'" checked/>';
                         $esta=true;
                    }  
                }   
                if(!$esta){
                 $ret .= '<label>'.$value.'</label> <input type="checkbox" name="ejercicios[]" value="'.$value.'"/>';
                }
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
           // $idUsuarioEntrenador = $ctrl->idUsuarioEntrenador($_SESSION['usuario']->getNif(), $datos['cliente']);
            //echo 'UsuEntr'.$idUsuarioEntrenador."<br>";
            $ctrl->editarEntrenamiento($datos);

		}
 
		if (count($erroresFormulario) === 0) {
			$erroresFormulario = "miPerfilEntrenamientosVer.php?idCliente=".$datos['idCliente'];

		}else{
            $erroresFormulario[] = "editarEntrenamiento.php?id=".$datos['datosEntrenamiento']. "&cliente=".$datos['idCliente'];
        }

        return $erroresFormulario;
    }
}