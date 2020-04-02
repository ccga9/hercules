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

		<h3>Comidas</h3>
		<?php
		$nif_usuario = $_SESSION['usuario']->getNif();
		$comidas = $ctrl->verComidas($nif_usuario);
		$capacidad = count($comidas);
		?>
		<textarea name='comidas' rows ='4' cols='100'>
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