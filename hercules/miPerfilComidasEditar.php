<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Mi Perfil - Comidas</title>
</head>

<body>

<div id="contenedor">

	<?php
		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');
	?>

	<div id="contenido">
	
		<div class="boton-volver">
			<a href="miPerfilComidas.php"> 🔙Volver </a>
		</div>
		
		<p>Disponible próximamente...</p>
		
	</div>
	
	<?php
	require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>