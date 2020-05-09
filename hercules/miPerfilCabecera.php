<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

	<div class = "menu-interno">
		<ul>
			<?php  
				if ($_SESSION['usuario']->getTipoUsuario()==1) {
					echo '<li><a href= miPerfilMisClientes.php>Mis Clientes</a></li>';
					echo '<li><a href= miPerfilEditar.php>Editar Perfil</a></li>';
				}
				else if($_SESSION['usuario']->getTipoUsuario()==2){
				    echo '<li><a href= miPerfilEditar.php>Editar Perfil</a></li>';
				    echo '<li><a href= gestionarUsuario.php>Gestionar Usuarios</a></li>';
				    echo '<li><a href= gestionarEjercicios.php>Gestionar Ejercicios</a></li>';
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