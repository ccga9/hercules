<?php 
    require_once 'includes/config.php';
    require_once(__DIR__.'/includes/Forms/FormEliminarComida.php');
?>

<!DOCTYPE html>
<html>
	<head>
	<title>HERCULES</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloFormularios.css" />
	</head>
	
	<body>
	<div id="contenedor">
		<?php
			require('includes/comun/cabecera.php');
			require('miPerfilCabecera.php');
		?>
		
		<div id="contenido">
		
		<?php
	    $form = new FormEliminarComida();
	    $form->gestiona();
        ?>

		</div>
		
		<?php	
		  require('includes/comun/pie.php');
		?>
	</div>
	</body>
</html>