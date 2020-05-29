<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloForo.css" />
	<meta http-equiv=â€�Content-Typeâ€� content=â€�text/html; charset=UTF-8â€³ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>


	<div id="contenido">
	<div class="boton-volver">
            <a href="foro.php">Atrás</a>
            <br><br><br>
    </div>
		<?php 
		$id_mesg = $_GET['id_msg'];
		echo "<a class=temaf href= respuesta.php?id_msg=$id_mesg>Responder</a>";
		$fila = $ctrl->mostrarMensaje($id_mesg);
		$i = 0;
		echo "<ol class=mensaje>";
		echo "<li><p class=tema>".$fila[$i]['tema']."</p> <pre class=datos>Autor: ".$fila[$i]['autor'].", Fecha: ".$fila[$i]['fecha'].".</pre>";
		echo "<pre>".$fila[$i]['mensaje']."</pre> </li>";
		if($fila[$i]['autor'] == $_SESSION['usuario']->getNombre()){
		    echo "<a class=temaf href= editarMensaje.php?id_msg=$id_mesg>Editar</a>";
	       	echo "<a class=temaf href= borrarMensaje.php?id_msg=$id_mesg>Eliminar</a>";
		}
		
		
		$resp = $ctrl->mostrarRespuestas($id_mesg);
		if ($resp) {
		    while ($fila = mysqli_fetch_assoc($resp)){
		        echo "<li><pre class=datos>*Respuesta* Autor: ".$fila['autor']." Fecha: ".$fila['fecha']."</pre>";
		        echo "<pre class=mensaje>".$fila['mensaje']."</pre></li>";
		        if($fila['autor'] == $_SESSION['usuario']->getNombre()){
		           echo "<a class=temaf href= editarMensaje.php?id_msg=$fila[id]>Editar</a>";
		           echo "<a class=temaf href= borrarMensaje.php?id_msg=$fila[id]>Eliminar</a>";
		        }
		    }
		    echo"</ol>";
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