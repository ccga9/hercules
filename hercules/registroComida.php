<?php 
    require_once 'includes/config.php';
    require_once(__DIR__.'/includes/Forms/FormRegistroComida.php');
?>

<!DOCTYPE html>
<html>
	<head>
	<title>HERCULES</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloFormularios.css" />
	<style>
	table { border: 1px solid black;
	        border-collapse: collapse;
	        width: 520px; }
    td { border: 1px solid black; }
	</style>
	</head>
	
	<body>
	<div id="contenedor">
		<?php
			require('includes/comun/cabecera.php');
			require('miPerfilCabecera.php');
		?>
		
		<div id="contenido">
		
		<?php
		
	    $form = new FormRegistroComida();
	    $form->gestiona();
	    
        $alimentos = $ctrl->listarAlimentos();
        ?>
        <div class="form-inicio">
        	<legend>TABLA DE CALORIAS</legend>
        <p>Esta es una tabla con todos los alimentos de los que disponemos, acompañados de sus características.
        La cantidad resultante de cada una de estas características está medida
        cada 100 gramos del alimento:</p>
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
        </table></p>

		</div>
		</div>
		
		<?php	
		  require('includes/comun/pie.php');
		?>
	</div>
	</body>
</html>