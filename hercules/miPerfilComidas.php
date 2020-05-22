<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Mi Perfil - Comidas</title>
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
		
		<h2>Comidas</h2>
				
		<div class="submenu-perfil">
			<div class="comidaentrena-all">
			<img src="includes/img/ver_comidas.png" alt="Histórico de comidas">
			<form action="miPerfilComidasVer.php" method="post">
				<button type="submit" name="ver">Ver Comidas</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/registrar_comida.png" alt="Registrar Comida">
			<form action="miPerfilComidasRegistrar.php" method="post">
				<button type="submit" name="registro">Registrar Comida</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/editar_comida.png" alt="Editar Comida">
			<form action="miPerfilComidasEditar.php" method="post">
				<button type="submit" name="editar">Editar Comida</button>
			</form>
			</div>

			<div class="comidaentrena-all">
			<img src="includes/img/borrar_comida.png" alt="Borrar comida">
			<form action="miPerfilComidasEliminar.php" method="post">
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