<?php
require_once 'includes/config.php';
require_once(__DIR__.'/includes/Forms/FormNuevoAlimento.php');

$act = new FormNuevoAlimento();
$html=$act->gestiona();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloAdmin.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
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
		echo '<div class="boton-volver"><a href="adminAlimento.php">Volver</a></div>';
		echo $html;
		?>
			

	</div>	

	<?php	

		require('includes/comun/pie.php');

	?>

	
</div> <!-- Fin del contenedor -->

</body>
</html>