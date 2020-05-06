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
			<form action="VerComidas.php" method="post">
				<button type="submit" name="ver">Ver Comidas</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_comida.png" alt="Registrar Comida">
			<form action="registroComida.php" method="post">
				<button type="submit" name="registro">Registrar Comida</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/editar_comida.png" alt="Editar Comida">
			<form action="editarComida.php" method="post">
				<button type="submit" name="editar">Editar Comida</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/borrar_comida.png" alt="Borrar comida">
			<form action="eliminarComida.php" method="post">
				<button type="submit" name="eliminar">Eliminar Comida</button>
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