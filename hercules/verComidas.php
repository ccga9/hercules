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
	
		<p><a href="miPerfilComidas.php"> 🔙Volver </a></p>
	
		<?php
		if (!isset($_SESSION['login']))
		{
		    echo '<p>Entra con tu usuario para ver comidas</p>';
		}
		?>
		
        <div class="submenu-perfil">
			<div class="comidaentrena-all">
			<img src="includes/img/verTabla_comidas.png" alt="Tabla comidas">
			<form action="verTablaComidas.php" method="post">
				<button type="submit" name="tabla">Tabla comidas</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/verCalendario_comidas.png" alt="Calendario comidas">
			<form action="verCalendarioComidas.php" method="post">
				<button type="submit" name="calendario">Calendario comidas</button>
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