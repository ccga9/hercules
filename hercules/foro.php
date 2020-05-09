<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
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
	<h1>FORO</h1>
	</div>

	<div id="contenido">
		<?php 
		if(!isset($_SESSION['login'])){
		    echo "Usuario no registrado. Inicia sesión o regístrate para acceder al foro.";
		}
		else{		
    		echo "<a href= nuevoTema.php><button type=button>Nuevo tema</button></a>";
    		$temas = $ctrl->listarTemas();
    		
    		if ($temas) {
    		    echo"<ul>";
    		    while ($fila = mysqli_fetch_assoc($temas)){
    		        echo "<li><pre><a href= mensaje.php?id_msg='".$fila['id']."'>'".$fila['tema']."'</a>  
                    Autor:  ".$fila['autor'].", Fecha:  ".$fila['fecha'].", Respuestas: ".$fila['respuestas'].".</pre> </li>";
    		    }
    		    echo"</ul>";
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