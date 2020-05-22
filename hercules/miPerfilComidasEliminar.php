<?php 
    require_once 'includes/config.php';
    require_once(__DIR__.'/includes/Forms/FormEliminarComida.php');
    
    $form = new FormEliminarComida();
    $html=$form->gestiona();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Mi Perfil - Comidas</title>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
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
		      echo $html;
	        ?>

		</div>
		
		<?php	
		  require('includes/comun/pie.php');
		?>
	</div>
	</body>
</html>