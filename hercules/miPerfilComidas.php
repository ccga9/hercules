<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
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

		<!--<h2>Comidas</h2>-->
		
		<?php
		if (!isset($_SESSION['login']))
		{
		    echo '<p>Entra con tu usuario para registrar comida</p>';
		}
		
		$nif_usuario = $_SESSION['usuario']->getNif();
		$comidas = $ctrl->verComidas($nif_usuario);
		?>
		<p>A continuación se muestran las comidas que usted ha registrado:</p>
		<p><table>
		<tr> <th>Fecha de registro</th> <th>Tipo</th> <th>Alimento</th> </tr>
		<!-- <th>1er plato (o plato único)</th> <th>2º plato</th> <th>Postre</th> </tr> -->
		<?php
		$i = 0;
		$aux = 0;
		$j = 0;
		foreach ($comidas as $valor)
		{
	        /*while ($comidas[$i]['dia'] == $comidas[$i + 1]['dia'])
	        {
	            ++$i;
	            $aux = $i % 3;
	        }*/
		    
		    echo "<tr>";
		    
		    /* NO FUNCIONA
		     * 
		     * while (($j == $aux) || ($i % 3 == 0))
		    {
		        echo "<td rowspan = ".$aux.">".$valor['dia']."</td>";
		        echo "<td rowspan = ".$aux.">".$valor['tipo']."</td>";
		        $j = 0;
		    }
		    ++$j;*/
		    
		    echo "<td>".$valor['dia']."</td>";
		    echo "<td>".$valor['tipo']."</td>";
		    echo "<td>".$valor['nombre']."</td>";
            echo "</tr>";
		}
		?>
		</table></p>

		<p>La siguiente opción le permitirá añadir una nueva comida a la tabla:</p>
		<form action="comida.php" method="post">
			<p><input type="submit" name="registroComida" value="Registrar comida" /></p>
		</form>

	</div>

	<?php	
		require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>