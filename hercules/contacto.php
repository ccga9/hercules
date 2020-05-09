<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloContacto.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<div class="cab">
		<h1>Contacto</h1>
		<img src="includes/img/entrenadores.png" alt="entrenadores">
		</div>
		<div id="after_submit"></div>
			<form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
 		    <div class="row">
   			<label class="required" for="name"><strong>Tu Nombre:</strong></label><br />
   			 <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
 			</div>
 			
 	 		<div class="row">
  		    <label class="required" for="email"><strong>Tu Email:</strong></label><br />
            <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
 		    </div>
 		    
  			<div class="row">
  			<label class="required" for="message"><strong>Mensaje:</strong></label><br />
   			<textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
    		</div>
    
   		 <input id="submit_button" type="submit" value="Enviar"/>
		</form>
		<h2>Dónde estamos:</h2>
		
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.0165999571864!2d-3.7357053483111544!3d40.45276956126817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4229d2a9f08b1f%3A0xcf68cce94ec84cb8!2sUCM%20Facultad%20de%20Inform%C3%A1tica!5e0!3m2!1ses!2ses!4v1588168860252!5m2!1ses!2ses" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		<p><strong>Estamos en: Calle del Prof. José García Santesmases, 9, 28040 Madrid</strong></p>
	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>