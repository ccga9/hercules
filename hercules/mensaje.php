<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
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
	</div>

	<div id="contenido">
		<?php 
		$id_mesg = $_GET['id_msg'];
		echo "<a href= respuesta.php?id_msg=$id_mesg><button type=button>Responder</button></a>";
		$fila = $ctrl->mostrarMensaje($id_mesg);
		$i = 0;
		echo "<ul>";
		echo "<li>".$fila[$i]['tema']." <pre>Autor: ".$fila[$i]['autor'].", Fecha: ".$fila[$i]['fecha'].".</pre>";
		echo "<pre>".$fila[$i]['mensaje']."</pre> </li>";
		
		
		$resp = $ctrl->mostrarRespuestas($id_mesg);
		if ($resp) {
		    while ($fila = mysqli_fetch_assoc($resp)){
		        echo "<li><pre>Autor: ".$fila['autor']." Fecha: ".$fila['fecha']."</pre>";
		        echo "<pre>".$fila['mensaje']."</pre></li>";
		    }
		    echo"</ul>";
		}
		else{
		    echo "<p>No hay respuestas...</p>";
		}
		?>
	</div>
		

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>