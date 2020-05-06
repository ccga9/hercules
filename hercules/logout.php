<?php  
	require_once __DIR__.'/includes/config.php';
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
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