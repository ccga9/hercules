<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagPrincipal.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<script src="includes/js/banner.js"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>

	<!-- Banner principal -->
	<div class="main-banner" id="main-banner">
		<div class="imgban" id="imgban1">
			<div class="imgban-box">
				<h2>Bienvenido a Hércules</h2>
				<p>Comienza a navegar ya en nuestro sitio</p>
			</div>
		</div>
		<div class="imgban" id="imgban2">
			<div class="imgban-box">
				<h2>¡Regístrate o inicia sesión para disfrutar de todas las ventajas!</h2>
				<p>Consulta el histórico de tus ejercicios realizados...</p>
			</div>
		</div>
		<div class="imgban" id="imgban3">
			<div class="imgban-box">
				<h2>Conoce a nuestros Entrenadores</h2>
			</div>
		</div>
	</div>

	<div id="contenido">
		
		<p>Nuestra plataforma está especialmente diseñada para que los 
		usuarios puedan ejercitarse sin necesidad de desplazarse ni de
		quedarse a una hora en concreta  también dando la posibilidad de 
		poder realizar registro y seguimiento del entrenamiento .</p>

	</div>
		

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>