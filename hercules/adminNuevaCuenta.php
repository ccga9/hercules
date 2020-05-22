<?php
require_once 'includes/config.php';
require_once(__DIR__.'/includes/Forms/FormNuevoAdmin.php');

$act = new FormNuevoAdmin();
$html=$act->gestiona();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloAdmin.css" />
	
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		
	?>

	<div id="contenido">

		<?php
		if(isset($_SESSION['login']) && $_SESSION['usuario']->getTipoUsuario()==2){
		 
	        echo '<div class="boton-volver"><a href="adminLista.php">Volver</a></div>';
	        echo $html;
		    
		}
		else { //Usuario registrado
		    echo "<h1>Usuario no registrado!</h1>";
		    echo "<p>Debes iniciar sesión para ver el contenido.</p>";
		}
		?>
			

	</div>	

	<?php	

		require('includes/comun/pie.php');

	?>
	
</div> <!-- Fin del contenedor -->

</body>
</html>