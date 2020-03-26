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

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<h1>Página principal</h1>
		<p> Aqui esta el contenido publico, visible para todos los usuarios. </p>
	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>