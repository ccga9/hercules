<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
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
		<?php
		echo '<div class="submenu-perfil">
			<div class="comidaentrena-all">
			<img src="includes/img/ver_entrenamientos.png" alt="Histórico de Entrenamientos">
			<form action="miPerfilEntrenamientosVer.php" method="post">
				<button type="submit" name="registro">Ver Entrenamientos</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_entrenamiento.png" alt="Registrar Entrenamiento">
			<form action="miPerfilEntrenamientosRegistrar.php" method="post">
				<button type="submit" name="registro">Registrar Entrenamiento</button>
			</form>
			</div>
			
		</div>';
			?>
		
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>