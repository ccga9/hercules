<?php 
    require_once 'includes/config.php';
    require_once(__DIR__.'/includes/Forms/FormRegistroComida.php');
    
    $form = new FormRegistroComida();
    $html=$form->gestiona();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>HERCULES</title>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ /> 
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	</head>
	
	<body>
	<div id="contenedor">
		<?php
			require('includes/comun/cabecera.php');
			require('miPerfilCabecera.php');
		?>
		
		<div id="contenido">
		
		<div class="boton-volver">
			<a href="miPerfilComidas.php"> 🔙Volver </a>
		</div>
		
		<?php
		
	    echo $html;
	    
        $alimentos = $ctrl->listarAlimentos();
        ?>
        <div class="form-inicio">
        	<legend>TABLA DE CALORIAS</legend>
        <p>Esta es una tabla con todos los alimentos de los que disponemos, acompañados de sus características.
        La cantidad resultante de cada una de estas características está medida
        cada 100 gramos del alimento:</p>
        
        <div class="tabla_alimentos">
        <p><table>
        <tr> <th>Alimento</th> <th>Calorías</th> <th>Proteínas</th> <th>Grasas</th> <th>Carbohidratos</th> </tr>
        <?php
        foreach ($alimentos as $valor)
        {
            echo
            "<tr>
            <td>".$valor['nombre']."</td>
            <td>".$valor['caloriasConsumidas']."</td>
            <td>".$valor['proteinas']."</td>
            <td>".$valor['grasas']."</td>
            <td>".$valor['carbohidratos']."</td>
            </tr>";
        }
        ?>
        
		</table>
		</div>
		
		</div>
		
		</div>
		
		<?php	
		  require('includes/comun/pie.php');
		?>
	</div>
	</body>
</html>