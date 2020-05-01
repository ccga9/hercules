<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Mi Perfil - Comidas</title>
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

		<h2>Comidas</h2>
		
		<?php
		if (!isset($_SESSION['login']))
		{
		    echo '<p>Entra con tu usuario para registrar comida</p>';
		}
		
		$nif_usuario = $_SESSION['usuario']->getNif();
		$comidas = $ctrl->verComidas($nif_usuario);
		
		?>
		<div class="submenu-perfil">
			<div class="comidaentrena-all">
			<img src="includes/img/ver_comidas.png" alt="Histórico de comidas">
			<h3>Ver Comidas</h3>
			<a href="#"></a>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_comida.png" alt="Registrar Comida">
			<h3>Registrar Comida</h3>
			<a href="#"></a>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/editar_comida.png" alt="Editar Comida">
			<h3>Modificar Comida</h3>
			<a href="#"></a>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/borrar_comida.png" alt="Borrar comida">
			<h3>Eliminar Comida</h3>
			<a href="#"></a>
			</div>
		</div>

		<?php
		if (count($comidas) == 0)
		{
		    echo "<p> No se ha registrado ninguna comida todavía.</p>";
		}
		else
		{
		?>
		<p>A continuación se muestran las comidas que usted ha registrado:</p>
		<p><table>
		<tr> <th>Fecha de registro</th> <th>Tipo</th> <th>Alimento</th> </tr>
		<!-- <th>1er plato (o plato único)</th> <th>2º plato</th> <th>Postre</th> </tr> -->
		<?php
		
		$i = 0; $j = 0; $aux = 0;
		
		foreach ($comidas as $valor)
		{
		    echo "<tr>";
		    
		    if (($i == $j))
	        {
	            while ((count($comidas) != $i + 1) && ($comidas[$i]['dia'] == $comidas[$i + 1]['dia']))
	            {
	                ++$i;
	                ++$aux;
	            }
	            ++$i;
	            ++$aux;
	            
	            echo "<td rowspan = ".$aux.">".$valor['dia']."</td>";
	            echo "<td rowspan = ".$aux.">".$valor['tipo']."</td>";
	            
	            $aux = 0;
	        }
            ++$j;
		    
		    echo "<td>".$valor['nombre']."</td>";
            echo "</tr>";
		}
        }
		?>
		</table></p>

		<p>La siguiente opción le permitirá añadir una nueva comida a la tabla:</p>
		<form action="registroComida.php" method="post">
			<p><input type="submit" name="registroComida" value="Registrar comida" /></p>
		</form>

	</div>

	<?php	
		require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>