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

	<div class = "menu">
		<ul>
			<li><a href= miPerfilComidas.php>Comidas</a></li>
			<li><a href= miPerfilEntrenamientos.php>Entrenamientos</a></li>
			<?php  
				if ($_SESSION['usuario']->getTipoUsuario()) {
					echo '<li><a href= miPerfilMisEntrenadores.php>Mis Clientes</a></li>';
				}
				else {
					echo '<li><a href= miPerfilMisEntrenadores.php>Mis Entrenadores</a></li>';
				}
			?>
		</ul>
	</div>

</body>
</html>