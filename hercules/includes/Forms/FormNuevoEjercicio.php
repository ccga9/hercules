<?php  
require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');

class FormNuevoEjercicio extends Form {

	public function __construct()
    {
    	parent::__construct('registro', array());
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
        $ret .= '<legend>NUEVO EJERCICIO</legend>';
        
        $ret .= '<div class="grupo-control">';
        $ret .= '<label>Nombre:</label> <input class="control" type="text" placeholder="Nombre de Ejercicio" name="nombre" required/>';
        $ret .= '</div>';
        $ret .= '<div class="grupo-control">';
        $ret .= '<label>Sube foto:</label><input name="uploadImage" type="file"/>';
        $ret .= '</div>';
        $ret .= '<div class="grupo-control">';
        $ret .= '<label>Calorias que gasta:</label> <input type="number" name="cal" value="0.0" step="any" min="0" required>';
        $ret .= '</div>';
        $ret .= '<div class="grupo-control">';
        $ret .= '<label>Tipo:</label> <input class="control" type="text" placeholder="Cardio, fuerza..." name="tipo" required/>';
        $ret .= '</div>';
        $ret .= '<div class="grupo-control">';
        $ret .= '<label>Descripción:</label>';
        $ret .= '</div>';
        $ret .= '<div class="grupo-control">';
        $ret .= '<textarea placeholder="Una breve descripcion..." name="desc" rows="10" cols="100" required></textarea>';
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
    	
        //FOTO
        if($_FILES['uploadImage']['name'] != ""){
             if (!$this->subir_fichero("includes/img",'uploadImage', $datos['nombre']))
                $erroresFormulario[] = "Foto incorrecta. Compruebe el formato del archivo";
             
             $datos['foto'] = "includes/img/".$datos['nombre'].".jpg";
        }else{
             $datos['foto'] = "includes/img/default_ejerc.png";
        }
        //NOMBRE
        $nombre = isset($datos['nombre']) ? htmlspecialchars(strip_tags($datos['nombre'])) : null;
        $datos['nombre'] = $nombre;

        if ( empty($nombre) ) {
            $erroresFormulario[] = "El nombre tiene que especificarse.";
        }
        
        //CALORIAS
        if(!isset($datos['cal']) || empty($datos['cal'])){
            $erroresFormulario[] = "Debe especificar calorias gastadas.";
        }
        
        //TIPO
        $tipo = isset($datos['tipo']) ? htmlspecialchars(strip_tags($datos['tipo'])) : null;
        $datos['tipo'] = $tipo;
        
        if ( empty($tipo) ) {
            $erroresFormulario[] = "El tipo debe especificarse";
        }
        
        //DESCRIPCION
        $desc = isset($datos['desc']) ? htmlspecialchars(strip_tags($datos['desc'])) : null;
        $datos['desc'] = $desc;
        
        if ( empty($desc) ) {
            $erroresFormulario[] = "Escriba una descripcion por lo menos.";
        }
     
       if (count($erroresFormulario) === 0) {
            $ctrl = controller::getInstance();
            $values = "'".$nombre."','".$datos['cal']."','".$tipo."','".$desc."','".$datos['foto']."'";
            $us = $ctrl->insertEjercicio('`nombre`, `caloriasGastadas`, `tipo`, `descripcion`, `multimedia`', $values);
            
            $erroresFormulario = "adminEjercicio.php";
       }
        
        return $erroresFormulario;
    }
}