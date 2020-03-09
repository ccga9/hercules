<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Hércules</title>
</head>

<body>

<div id="contenedor">

	<?php	

		include('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<form action="procesarRegistrar.php" method="post">
		
		<fieldset>
			<legend>Registrarte</legend>
			DNI:<br> 
			<input type="text" name="user"> <br>
			Contraseña:<br> 
			<input type="password" name="passw"> <br>

			<input type="submit" name="aceptar">
		</fieldset>

		</form>
	</div>

	<?php	

		include('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>