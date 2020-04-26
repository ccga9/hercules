<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
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
		$capacidad = count($comidas);
		?>
		<p>A continuación se muestran las comidas que usted ha registrado:</p>
		
		<!-- Hacer tabla con datos de comidas (fecha y tipo) -->
		
		<textarea name='listaComidas' rows ='4' cols='100' readonly>
		<?php
		foreach ($comidas as $key => $value)
		{
			if ($capacidad != $key + 1)
				echo $value.' - ';
			else
				echo $value;
		}
		?>
		</textarea>

		<p>La siguiente opción le permitirá añadir una nueva comida a la tabla:</p>
		<form action="comidas.php" method="post">
			<p><input type="submit" name="registroComida" value="Registrar comida" /></p>
		</form>

	</div>

	<?php	
		require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>