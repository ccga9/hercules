<?php
    require_once(__DIR__.'/Form.php');
    require_once(__DIR__.'/../config.php');
    
class FormEliminarComida extends Form
{
    public function __construct()
    {
        parent::__construct('miPerfilComidasEliminar', array());
    }
    
    public function gestiona()
    {
        return parent::gestiona();
    }
    
    protected function generaCamposFormulario($datosIniciales)
    {
        $ctrl = controller::getInstance();
        $comidas = $ctrl->verComidas($_SESSION['usuario']->getNif());
        

         $ret = '<div class="form-inicio">';
        $ret .= '<fieldset>';
           $ret .= '<legend>ELIMINAR COMIDA</legend>';

        $ret .=	
		'<p>Selecciona la fecha de aquella comida que quieras borrar.</p>
         <p>La fecha corresponde al momento en que registraste o modificaste una comida.</p>

        <div class="grupo-control"><label>Fecha</label>
		<select name="fecha">
			<option value = ""> </option>';
        
            $i = 0;
			foreach ($comidas as $value)
			{
			    if ((count($comidas) == $i + 1) || ($comidas[$i]['dia'] != $comidas[$i + 1]['dia']))
			        $ret .= '<option value = "'.$value['dia'].'">'.$value['dia'].'</option>';
			    
			    ++$i;
			}
			
		$ret .= '</select></div>

	    <div class="botones"><button type="submit" value="Enviar">Borrar</button>
        </div>
        ';
        $ret .= '</fieldset>';
         $ret .= '</div>';
        return $ret;
    }
    
    protected function procesaFormulario($datos)
    {
        $erroresFormulario = array();
        
        if (!isset($_SESSION['login']))
        {
            $erroresFormulario[] = 'Entra con tu usuario para borrar una comida';
        }
        
        if ((!isset($datos['fecha'])) || (trim($datos['fecha']) == ''))
        {
            $erroresFormulario[] = "El campo 'fecha' no puede estar vacío";
        }
        else
        {
            $nif_usuario = $_SESSION['usuario']->getNif();
            $fecha_registro = $datos['fecha'];
            
            $ctrl = controller::getInstance();
            $ctrl->eliminarComida($fecha_registro, $nif_usuario);
        }
        
        if (count($erroresFormulario) === 0)
        {
            $erroresFormulario = "miPerfilComidasVerTablas.php";
        }
        
        return $erroresFormulario;
    }
    
}