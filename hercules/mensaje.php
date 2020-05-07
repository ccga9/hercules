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
	</div>

	<div id="contenido">
		<?php 
		$id_mesg = $_GET['id_msg'];
		echo "<a href= respuesta.php?id_msg='".$id_mesg."'><button type=button>Responder</button></a>";
		$msg = $ctrl->mostrarMensaje($id_mesg);
		echo "<p>'".$msg['tema']."' '".$msg['autor']."' '".$msg['fecha']."'</p>";
		echo "<p>'".$msg['mensaje']."'</p>";
		
		if($msg['autor'] == $_SESSION['usuario']){
		    echo "Modificar";//hay que hacer esto.
		    echo "Eliminar";//hay que hacer esto.
		}
		
		$resp = $ctrl->mostrarRespuestas($id_mesg);
		if ($resp) {
		    while ($fila = mysqli_fetch_assoc($resp)){
		        echo "<p>'".$fila['autor']."' '".$fila['fecha']."'</p>";
		        if($fila['autor'] == $_SESSION['usuario']){
		            echo "Modificar";//hay que hacer esto.
		            echo "Eliminar";//hay que hacer esto.
		        }
		        echo "<p>'".$fila['mensaje']."'</p><br>";
		    }
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