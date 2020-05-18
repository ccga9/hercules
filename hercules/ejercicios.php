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
		<h1>Todos los ejercicios disponibles</h1>
		<img src="includes/img/ejercicios.png" alt="entrenadores">
		</div>

		<div class="buscar-ejercicio">
			<label for="buscar-ejer">Buscar ejercicio </label>
			<form method="POST" action="ejercicios.php">
				<input type="search" id="site-search" name="busqueda"/>
				<button type="submit" name="buscar">Buscar</button>
			</form>
		</div>

		<?php
			if (isset($_POST['busqueda'])) {
				$encontrado=$ctrl->buscarEjercicio($_POST['busqueda']);
				 foreach ($encontrado as $valor) {
					echo '<h4>'.$valor['nombre'].'</h4>';
				}
			}
		?>

		<?php
			$ejercicios= $ctrl->listarTodosEjercicios();
			echo '<div class="entrenadores-all">';
				echo '<ul>';
					foreach ($ejercicios as $valor) {
						echo '<li>';
						echo '<h4>'.$valor['nombre'].'</h4>';
						echo '<div class="ejercicio"><img src='.$valor['multimedia'].' alt="foto" class= "fotos"/></div>';
						echo 'Calorías Gastadas: '.$valor['caloriasGastadas'].'<br>';
						echo 'Tipo: '.$valor['tipo'].'<br>';
						//echo $valor['descripcion'].'<br>';
						echo '</li>';						    
					}
				echo '</ul>';
			echo '</div>';
		?>

	</div>

	<?php

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>
