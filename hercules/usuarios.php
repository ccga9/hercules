<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<script src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
  	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
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
    		<h1>Los miembros de Hércules</h1>
    		<img src="includes/img/usuarios.png" alt="usuarios">
		</div>
		
		<div class="buscar-ejercicio">
			<label>Introduzca el nombre del usuario del que le gustaría obtener información</label>
			<form method="POST" action="usuarios.php">
				<input type="search" id="site-search" name="busqueda"/>
				<button type="submit" name="buscar">Buscar</button>
			</form>
		</div>
		
		<?php
		
		
		
		
		
		?>
		
	</div>
	
	<?php 
	   require('includes/comun/pie.php');
	?>
	
</div> <!-- Fin del contenedor -->

</body>
</html>
	