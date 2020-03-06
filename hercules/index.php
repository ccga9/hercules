<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php	

		session_start();

		include('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<h1>Página principal</h1>
		<p> Aqui esta el contenido publico, visible para todos los usuarios. </p>
	</div>

	<?php	

		include('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>