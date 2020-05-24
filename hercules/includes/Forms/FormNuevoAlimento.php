<?php  
require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

class FormNuevoAlimento extends Form {

	public function __construct()
    {
    	parent::__construct('nuevoAlimento', array());
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
    	$ret .= '<fieldset>';
           $ret .= '<legend>NUEVO ALIMENTO</legend>';
           
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Nombre:</label> <input class="control" type="text" placeholder="Nombre del alimento" name="nombre" required/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Calorias:</label> <input type="number" name="cal" value="0.0" step="any" min="0" required>';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Carbohidratos:</label> <input type="number" name="car" value="0.0" step="any" min="0" required>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Proteinas</label> <input type="number" name="prot" value="0.0" step="any" min="0" required>';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Grasas</label> <input type="number" name="gras" value="0.0" step="any" min="0" required>';
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
    	
        //NOMBRE
        $nombre = isset($datos['nombre']) ? htmlspecialchars(strip_tags($datos['nombre'])) : null;
        $datos['nombre'] = $nombre;

        if ( empty($nombre) ) {
            $erroresFormulario[] = "El nombre es obigatorio.";
        }
        
        //Calorias
        if(!isset($datos['cal']) || empty($datos['cal'])){
            $erroresFormulario['atrib'] = "Los nutrientes son obligatorios.";
        }
        //Carbohidratos
        if(!isset($datos['car']) || empty($datos['car']) ){
            $erroresFormulario['atrib'] = "Los nutrientes son obligatorios.";
        }
        //Proteinas
        if(!isset($datos['prot'])|| empty($datos['prot']) ){
            $erroresFormulario['atrib'] = "Los nutrientes son obligatorios.";
        }
        //Grasas
        if(!isset($datos['gras'])|| empty($datos['gras']) ){
            $erroresFormulario['atrib'] = "Los nutrientes son obligatorios.";
        }

       
        
       if (count($erroresFormulario) === 0) {
            $ctrl = controller::getInstance();
            $ctrl->insertAlimento('nombre, caloriasConsumidas, carbohidratos, proteinas, grasas', 
                "'".$datos['nombre']."','".$datos['cal']."','".$datos['car']."','".$datos['prot']."','".$datos['gras']."'");
            $erroresFormulario = "adminAlimento.php";
           
        }
        
        return $erroresFormulario;
    }
}