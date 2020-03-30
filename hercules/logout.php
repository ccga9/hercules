<?php  
	require_once __DIR__.'/includes/config.php';
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>LA PAGINA</title>
</head>

<body>

<div id="contenedor">

	<?php	

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<p> Has cerrado tu sesion. </p>
	</div>

	<?php	

		require('./includes/comun/pie.php');	
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>