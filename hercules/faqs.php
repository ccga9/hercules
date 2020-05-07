<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsCabecera.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloFAQs.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
	<div class="cab">
		<h1>FAQS</h1>
		<img src="includes/img/entrenadores.png" alt="entrenadores">
		</div>
		
		<h2>Preguntas Frecuentes</h2>
		<div id= "preguntas">
		<h3>¿Cuánto cuesta registrarse en Hercules?</h3>
		</div>
		<p> Es totalmente gratuito. </p>
		<div id= "preguntas">
		<h4>¿Están cualificados los entrenadores?</h4>
		</div>
		<p>Nosotros verificamos la homologación de todos y cada uno de los entrenadores.</p>
		<div id= "preguntas">
		<h5>¿Como puedo contactarme con mi entrenador ?</h5>
		</div>
		<p>Una vez registrado y accedido a tu cuenta puedes seleccionar un entrenador y contactar con él de forma privada. </p>
		
	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>