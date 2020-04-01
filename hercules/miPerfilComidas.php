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
		<h1>Comidas</h1>

		<p>Ver comidas (alimentos escogidos previamente):</p>
		<select name='comidas'>
			<p><?php
			$comidas = $ctrl->verComidas();
			foreach ($comidas as $key => $value)
			{
				echo "<option value = '".$value."'>".$value."</option";
			}
			?></p>
		</select>

		<p> - - - </p>

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