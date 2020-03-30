<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		if(isset($_SESSION['login'])){
			require('miPerfilCabecera.php');
		}
		
		$entrenador = $ctrl->cargarUsuario($_GET['id']);
	?>

	<div id="contenido">

		<h1>Perfil de Entrenador/a</h1>
		
		<h2>Datos personales</h2>
		<?php
		echo '<table>';
			echo '<tr><td>'.$entrenador->getNombre().'</td></tr>';
			echo '<tr><td>'.$entrenador->getEmail().'</td></tr>';
			echo '<tr><td>'.$entrenador->getTitulacion().'</td></tr>';
			echo '<tr><td>'.$entrenador->getEspecialidad().'</td></tr>';
			echo '<tr><td>'.$entrenador->getExperiencia().'</td></tr>';
		echo '</table>';
		
		?>

		</form>

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>