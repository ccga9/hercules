<?php
    require_once(__DIR__.'/Form.php');
    require_once(__DIR__.'/../config.php');
    
class FormEditarComida extends Form
{
    public function __construct()
    {
        parent::__construct('miPerfilComidasEditar', array());
    }
    
    public function gestiona()
    {
        return parent::gestiona();
    }
    
    protected function generaCamposFormulario($datosIniciales)
    {
        $ctrl = controller::getInstance();
        $comidas = $ctrl->verComidas($_SESSION['usuario']->getNif());
        $alimentos = $ctrl->listarAlimentos();

        $ret = '<div class="form-inicio">';
        $ret .= '<fieldset>';
           $ret .= '<legend>EDITAR COMIDA</legend>';
           
        $ret.='
        <p>Selecciona la fecha de la comida que quieras modificar:</p>
        <p>Recuerda que una vez modifiques la comida, se le asignará la fecha actual a esa comida.</p>
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
	    
		$ret .= '</select></div>';

        $ret .=	
		'<p>Escoge el tipo de comida que desees:</p>
            <label>Desayuno</label>
            <input type="radio" name="tipo" value="desayuno" checked/>

            <label>Comida</label>
    		<input type="radio" name="tipo" value="comida"/>

            <label>Cena</label>
    		<input type="radio" name="tipo" value="cena"/>

		<p>Selecciona entre 1 y 3 platos, según la cantidad de platos que quieras modificar:</p>
        <p>Ten en cuenta que los alimentos no seleccionados se quedarán vacíos 
            aunque hubiese un alimento antes en ese campo.</p>

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

	    <div class="botones"><button type="submit" value="Enviar">Modificar</button>
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
            $erroresFormulario[] = 'Entra con tu usuario para editar una comida';
        }
        
        if ((!isset($datos['fecha'])) || (trim($datos['fecha']) == ''))
        {
            $erroresFormulario[] = "El campo 'Fecha de registro' no puede estar vacío";
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
        
        if (count($erroresFormulario) === 0)
        {
            $nif_usuario = $_SESSION['usuario']->getNif();
            $fecha_registro = $datos['fecha'];
            $tipo_comida = $datos['tipo'];
            $primer_plato = $datos['alimento_1'];
            $segundo_plato = $datos['alimento_2'];
            $postre = $datos['alimento_3'];
            
            $ctrl = controller::getInstance();
            $ctrl->editarComida($fecha_registro, $primer_plato, $segundo_plato, $postre, $tipo_comida, $nif_usuario);
        }
        
        if (count($erroresFormulario) === 0)
        {
            $erroresFormulario = "miPerfilComidasVerTablas.php";
        }
        
        return $erroresFormulario;
    }
    
}
