<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Mi Perfil - Comidas</title>
</head>

<body>

<div id="contenedor">

	<?php
		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');
	?>

	<div id="contenido">
		
		<?php
		if (!isset($_SESSION['login']))
		{
		    echo '<p>Entra con tu usuario para registrar comida</p>';
		}
		?>
		
		<h2>Comidas</h2>
				
		<div class="submenu-perfil">
			<div class="comidaentrena-all">
			<img src="includes/img/ver_comidas.png" alt="Histórico de comidas">
			<a href="verComidas.php"><h3>Ver Comidas</h3></a>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_comida.png" alt="Registrar Comida">
			<a href="registroComida.php"><h3>Registrar Comida</h3></a>			
			</div>

			<!-- <div class="comidaentrena-all">
			<img src="includes/img/editar_comida.png" alt="Editar Comida">
			<a href="#"><h3>Modificar Comida</h3></a>
			</div> -->

			<div class="comidaentrena-all">
			<img src="includes/img/borrar_comida.png" alt="Borrar comida">
			<a href="eliminarComida.php"><h3>Eliminar Comida</h3></a>
			</div>
		</div>
		
	</div>

	<?php	
		require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>