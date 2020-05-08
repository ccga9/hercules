<?php 
    require_once 'includes/config.php';
    require_once(__DIR__.'/includes/Forms/FormEliminarComida.php');
?>

<!DOCTYPE html>
<html>
	<head>
	<title>HERCULES</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	</head>
	
	<body>
	<div id="contenedor">
		<?php
			require('includes/comun/cabecera.php');
			require('miPerfilCabecera.php');
		?>
		
		<div id="contenido">
		
			<div class="boton-volver">
				<a href="miPerfilComidas.php"> 🔙Volver </a>
			</div>
			
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