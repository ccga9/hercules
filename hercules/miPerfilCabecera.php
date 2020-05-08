<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

	<div class = "menu-interno">
		<ul>
			<?php  
				if ($_SESSION['usuario']->getTipoUsuario()) {
					echo '<li><a href= miPerfilMisClientes.php>Mis Clientes</a></li>';
					echo '<li><a href= miPerfilEditar.php>Editar Perfil</a></li>';
				}
				else {
				   echo '<li><a href= miPerfilComidas.php>Comidas</a></li>';
				   echo '<li><a href= miPerfilEntrenamientos.php>Entrenamientos</a></li>';
					echo '<li><a href= miPerfilMisEntrenadores.php>Mis Entrenadores</a></li>';
					echo '<li><a href= miPerfilEditar.php>Editar Perfil</a></li>';
				}
			?>
			<li><a href= miPerfilBuzon.php>Mensajes</a></li>
		</ul>
	</div>

</body>
</html>