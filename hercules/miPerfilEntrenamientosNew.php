<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
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
			<button type="submit" name="registro">Ver Entrenamientos</button>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_entrenamiento.png" alt="Registrar Entrenamiento">
			<button type="submit" name="registro">Registrar Entrenamiento</button>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/editar_comida.png" alt="Editar Entrenamiento">
			<button type="submit" name="registro">Editar Entrenamiento</button>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/borrar_comida.png" alt="Borrar Entrenamiento">
			<button type="submit" name="registro">Eliminar Entrenamiento</button>
			</div>
		</div>
			
		
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>