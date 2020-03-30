<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<h1>Página principal</h1>

		<!-- Prueba -->
		<h3> Lista de alimentos </h3>
		<form action='nada.php' method='POST'>
			<p><select name='alimentos'>
				<?php
				$alimentos = $ctrl->listarAlimentos();
				foreach ($alimentos as $key => $value)
				{
					echo
					"<option value = '".$value."'>".$value."</option>";
				}
				?>
			</select></p>
			<p><input type="submit" value="Enviar"></p>
		</form>
		<!-- Fin prueba -->

		<p> Aqui esta el contenido publico, visible para todos los usuarios. </p>
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>