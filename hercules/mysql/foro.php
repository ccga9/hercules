<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estiloPagPrincipal.css" />
	<meta http-equiv=â€�Content-Typeâ€� content=â€�text/html; charset=UTF-8â€³ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>

	<!-- Banner principal -->
	<div class="main-banner" id="main-banner">
	<h1>FORO</h1>
	</div>

	<div id="contenido">
		<?php 
		$temas = $ctrl->listarTemas();
		
		if ($temas) {
		    while ($fila = mysqli_fetch_assoc($temas)){
		        echo "<pre><a href= mensaje.php>'".$fila['tema']."'</a>  
                '".$fila['autor']."'  '".$fila['fecha']."'  '".$fila['respuestas']."'</pre> <br>";//HACER MENSAJE.PHP!!!
		    }
		}
		else{
		    echo "<h1>No hay mensajes...</h1>";
		}
		?>
	</div>
		

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>