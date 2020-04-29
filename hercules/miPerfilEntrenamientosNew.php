<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
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
	?>

	<div id="contenido">

		<h2>Entrenamientos</h2>
		
		<div class="submenu-perfil">
			<div class="comidaentrena-all">
			<img src="includes/img/ver_entrenamientos.png" alt="Histórico de Entrenamientos">
			<h3>Ver Entrenamientos</h3>
			<a href="#"></a>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_entrenamiento.png" alt="Registrar Entrenamiento">
			<h3>Registrar Entrenamiento</h3>
			<a href="#"></a>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/editar_comida.png" alt="Editar Entrenamiento">
			<h3>Modificar Entrenamiento</h3>
			<a href="#"></a>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/borrar_comida.png" alt="Borrar Entrenamiento">
			<h3>Eliminar Entrenamiento</h3>
			<a href="#"></a>
			</div>
		</div>
			
		
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>