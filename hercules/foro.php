<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagPrincipal.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<meta charset="utf-8">
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
		if(!isset($_SESSION['login'])){
		    echo "Usuario no registrado. Inicia sesi�n o reg�strate para acceder al foro.";
		}
		else{		
    		echo "<a href= nuevoTema.php><button type=button>Nuevo tema</button></a>";
    		$temas = $ctrl->listarTemas();
    		
    		if ($temas) {
    		    while ($fila = mysqli_fetch_assoc($temas)){
    		        echo "<pre><a href= mensaje.php?id_msg='".$fila['id']."'>'".$fila['tema']."'</a>  
                    '".$fila['autor']."'  '".$fila['fecha']."'  '".$fila['respuestas']."'</pre> <br>";
    		    }
    		}
    		else{
    		    echo "<p>No hay mensajes...</p>";
    		}
		}
		?>
	</div>
		

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>