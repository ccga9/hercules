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
		<?php
		echo
		"<h3> Lista de alimentos </h3>
		<form action='nada.php' method='POST'>
		<select name='alimentos'";
		foreach ($ctrl->listarAlimentos() as $key => $value)
		{
			echo
			"option value = \"$key\" > \"$value\"</option>";
		}
		?>
		<!-- Fin prueba -->
		
		<p> Aqui esta el contenido publico, visible para todos los usuarios. </p>
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>