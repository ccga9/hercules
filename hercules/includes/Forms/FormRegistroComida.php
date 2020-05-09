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
        parent::gestiona();
    }
    
    protected function generaCamposFormulario($datosIniciales)
    {
        $ctrl = controller::getInstance();
        $alimentos = $ctrl->listarAlimentos();

        $ret = '<div class="form-inicio">';
        $ret .= '<fieldset>';
           $ret .= '<legend>REGISTRO DE COMIDA</legend>';

        $ret .=	
		'<label> Escoge el tipo de comida que desees:</label>
        <div class="radio-button">
            
            <label for="desayuno">Desayuno</label>
            <input type="radio" name="tipo" value="desayuno" checked/>
            
            <label for="comida">Comida</label>
    		<input type="radio" name="tipo" value="comida"/>
           
            <label for="cena">Cena</label>
    		<input type="radio" name="tipo" value="cena"/>
        </div>

		<div class="grupo-control"><label for="instrucciones_alimentos">Selecciona entre 1 y 3 platos, 
		dependiendo del tipo de comida que hayas escogido y la cantidad que quieras comer:</label></div>

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
        
        if ((!isset($_REQUEST['alimento_1'])) || (trim($_REQUEST['alimento_1']) == ''))
        {
            $erroresFormulario[] = "El campo 'Primer plato o plato único' no puede estar vacío";
        }
        elseif (($_REQUEST['alimento_1'] == $_REQUEST['alimento_2']) || 
                ($_REQUEST['alimento_1'] == $_REQUEST['alimento_3']) ||
                (($_REQUEST['alimento_2'] != null) && ($_REQUEST['alimento_2'] == $_REQUEST['alimento_3'])))
        {
            $erroresFormulario[] = "No puede haber dos alimentos iguales. La cantidad de alimentos consumidos no se tiene en cuenta";
        }
        else
        {
            $nif_usuario = $_SESSION['usuario']->getNif();
            $tipo_comida = $_REQUEST['tipo'];
            $primer_plato = $_REQUEST['alimento_1'];
            $segundo_plato = $_REQUEST['alimento_2'];
            $postre = $_REQUEST['alimento_3'];
            
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
?>
