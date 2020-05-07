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
			<form action="miPerfilEntrenamientos.php?idCliente='.$_GET['id'].'" method="post">
				<button type="submit" name="registro">Ver Entrenamientos</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_entrenamiento.png" alt="Registrar Entrenamiento">
			<form action="registrarEntrenamiento.php?idCliente='.$_GET['id'].'" method="post">
				<button type="submit" name="registro">Registrar Entrenamiento</button>
			</form>
			</div>
			
		</div>
			
		
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>