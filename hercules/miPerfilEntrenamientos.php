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
		require('miPerfilCabecera.php');

	?>

	<div id="contenido">
		<h1>Entrenamientos</h1>
		<?php
			$idUsuarioEntrenador = $ctrl->idUsuarioEntrenador($_GET['idEntrenador'], $_SESSION['usuario']->getNif());
			$entrenamientos = $ctrl->listarEntrenamientos($idUsuarioEntrenador);
		?>
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>