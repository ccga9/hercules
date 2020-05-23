<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>Mi Perfil - Mis Entrenadores</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');

	?>

	<div id="contenido">
		<h2>Mis Amigos</h2>

		<?php  
			
			$arr = $ctrl->listarMisAmigos($_SESSION['usuario']->getNif());
			if(count($arr) > 0){
				
				echo '<ul>';
				foreach ($arr as $key => $valor) {
					echo '<li>';
					if($valor['estado']== 'aceptado'){
						$estado = 'a';
					}else{
						$estado = 'p';
					}
					if($valor['usuario1'] == $_SESSION['usuario']->getNif()){
						$amigo = $ctrl->cargarUsuario($valor['usuario2']);
						echo '<a href="miPerfilMisAmigosPerfiles.php?id='.$amigo->getNif().'estado='.$estado.'">Ver Perfil</a>';
						echo '<h4>'.$valor['usuario2'].'</h4>';
					}else{
						$amigo = $ctrl->cargarUsuario($valor['usuario1']);
						echo '<a href="miPerfilMisAmigosPerfiles.php?id='.$amigo->getNif().'&estado='.$estado.'">Ver Perfil</a>';
						echo '<h4>'.$valor['usuario1'].'</h4>';
					}
	
					echo '</li>';
				}
				echo '</ul>';

			 }
			 else {
			     echo '<p><span class="varios">'. "Todavía no tiene entrenadores.".'</span></p>';
			 }

		?>
		
	</div>
			
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>