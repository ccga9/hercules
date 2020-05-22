<?php
    require_once(__DIR__.'/Form.php');
    require_once(__DIR__.'/../config.php');
    
class FormRegistroComida extends Form
{
    public function __construct()
    {
        parent::__construct('miPerfilComidasRegistrar', array());
    }
    
    public function gestiona()
    {
        return parent::gestiona();
    }
    
    protected function generaCamposFormulario($datosIniciales)
    {
        $ctrl = controller::getInstance();
        $alimentos = $ctrl->listarAlimentos();

        $ret = '<div class="form-inicio">';
        $ret .= '<fieldset>';
           $ret .= '<legend>REGISTRO DE COMIDA</legend>';

        $ret .=	
		'<p>Escoge el tipo de comida que desees:</p>
            <label>Desayuno</label>
            <input type="radio" name="tipo" value="desayuno" checked/>

            <label>Comida</label>
    		<input type="radio" name="tipo" value="comida"/>

            <label>Cena</label>
    		<input type="radio" name="tipo" value="cena"/>

		<p>Selecciona entre 1 y 3 platos, dependiendo del tipo de comida que hayas escogido
            y la cantidad que quieras comer:</p>

	  	<div class="grupo-control"><label>Primer plato o plato único</label></div>
		<select name="alimento_1">
			<option value = ""> </option>';
			
			foreach ($alimentos as $value)
				$ret .= '<option value = "'.$value['nombre'].'">'.$value['nombre'].'</option>';
			
		$ret .= '</select>

		<div class="grupo-control"><label>Segundo plato</label></div>
		<select name="alimento_2">
			<option value = ""> </option>';
			
			foreach ($alimentos as $value)
			    $ret .= '<option value = "'.$value['nombre'].'">'.$value['nombre'].'</option>';
			
		$ret .= '</select>

		<div class="grupo-control"><label>Postre</label></div>
		<select name="alimento_3">
			<option value = ""> </option>';
			
			foreach ($alimentos as $value)
			    $ret .= '<option value = "'.$value['nombre'].'">'.$value['nombre'].'</option>';
			
		$ret .= '</select>

	    <div class="botones"><button type="submit" value="Enviar">Registrar</button>
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
            $erroresFormulario[] = 'Entra con tu usuario para registrar una comida';
        }
        
        if ((!isset($datos['alimento_1'])) || (trim($datos['alimento_1']) == ''))
        {
            $erroresFormulario[] = "El campo 'Primer plato o plato único' no puede estar vacío";
        }
        elseif (($datos['alimento_1'] == $datos['alimento_2']) || 
            ($datos['alimento_1'] == $datos['alimento_3']) ||
            (($datos['alimento_2'] != null) && ($datos['alimento_2'] == $datos['alimento_3'])))
        {
            $erroresFormulario[] = "No puede haber dos alimentos iguales. La cantidad de alimentos consumidos no se tiene en cuenta";
        }
        else
        {
            $nif_usuario = $_SESSION['usuario']->getNif();
            $tipo_comida = $datos['tipo'];
            $primer_plato = $datos['alimento_1'];
            $segundo_plato = $datos['alimento_2'];
            $postre = $datos['alimento_3'];
            
            $ctrl = controller::getInstance();
            $ctrl->registrarComida($primer_plato, $segundo_plato, $postre, $tipo_comida, $nif_usuario);
        }
        
        if (count($erroresFormulario) === 0)
        {
            $erroresFormulario = "miPerfilComidasVerTablas.php";
        }
        
        return $erroresFormulario;
    }
    
}