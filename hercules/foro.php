<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloForo.css" />
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>


	<div id="contenido">
	<div class="cab">
	<h1 class="foro">FORO</h1>
	<img src="includes/img/entrenadores.png" alt="entrenadores">
	</div>
		<?php 
		if(!isset($_SESSION['login'])){
		    echo "Usuario no registrado. Inicia sesión o regí­strate para acceder al foro.";
		}
		else{		
    		echo "<a href= nuevoTema.php><button type=button>Nuevo tema</button></a>";
    		$temas = $ctrl->listarTemas();
    		
    		if ($temas) {
    		    echo"<ol class=listaTemas>";
    		    while ($fila = mysqli_fetch_assoc($temas)){
    		        echo "<li><p class=tema><a class=tema href= mensaje.php?id_msg=".$fila['id'].">'".$fila['tema']."'</a> </p> 
                   <pre class=tema> Autor:  ".$fila['autor'].", Fecha:  ".$fila['fecha'].", Respuestas: ".$fila['respuestas'].".</pre> </li>";
    		    }
    		    echo"</ol>";
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