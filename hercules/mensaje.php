<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
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
	</div>

	<div id="contenido">
		<?php 
		$id_mesg = $_GET['id_msg'];
		echo "<a href= respuesta.php?id_msg=".$id_mesg."><button type=button>Responder</button></a>";
		$fila = $ctrl->mostrarMensaje($id_mesg);
		$i = 0;
		
		echo "<p>'".$fila[$i]['tema']."' '".$fila[$i]['autor']."' '".$fila[$i]['fecha']."'</p>";
		echo "<p>'".$fila[$i]['mensaje']."'</p>";
		
		if($fila[$i]['autor'] == $_SESSION['usuario']){
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