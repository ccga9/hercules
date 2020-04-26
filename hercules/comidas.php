<?php 
    require_once 'includes/config.php';
    require_once(__DIR__.'/includes/Forms/FormularioComida.php');
?>
<!DOCTYPE html>
<html>
	<head>
	<title>HERCULES</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<style>
	table { border: 1px solid black;
	        border-collapse: collapse;
	        width: 600px; }
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
		
	    $form = new FormularioComida();
	    $form->gestiona();
	    
	    
        $alimentos = $ctrl->listarAlimentos();
        
        echo"
        <p>Esta es una tabla con todos los alimentos de los que disponemos, acompañados de sus características.
        La cantidad resultante (en gramos) de cada una de estas características está medida
        cada 100 gramos del alimento:</p>
        <p><table>
        <tr><th>Alimento</th> <th>Calorías</th> <th>Proteínas</th> <th>Grasas</th> <th>Hidratos de carbono</th></tr>";
        
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
        echo "</table></p>";
        
		?>

	</div>
		<?php	
		require('includes/comun/pie.php');
		?>
	</div>
	</body>
</html>