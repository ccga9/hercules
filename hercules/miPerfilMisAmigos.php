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
				echo '<div class="entrenadores-all">';
				echo '<div class="elem-item" category="vari">';
				
				$aceptados = array();
				$pendientes = array();
				foreach ($arr as $key => $valor) {//SEPARAMOS LOS ACEPTADOS Y LAS NUEVAS SOLICITUDES
					if($valor['estado'] == "aceptado"){
						$aceptados[] = $valor;
					}else if ($valor['usuario2'] == $_SESSION['usuario']->getNif() && $valor['estado'] == "pendiente"){
						$pendientes[]= $valor;
					}
				}


				foreach ($aceptados as $key => $valor) {
					echo '<ul>';
					echo '<li>';
					
						if($valor['usuario1'] == $_SESSION['usuario']->getNif()){
							$amigo = $ctrl->cargarUsuario($valor['usuario2']);			
						}else{
							$amigo = $ctrl->cargarUsuario($valor['usuario1']);
						}

					echo '<h4>'.$amigo->getNombre().'</h4><br>';
					echo '<img src="'.$amigo->getFoto().'" width="300" height="120" alt="Foto usuario">';
					echo 'Preferencias: '.$amigo->getPreferencias().'<br>';
					echo '<a href="miPerfilMisAmigosPerfiles.php?id='.$amigo->getNif().'&estado=a&relacion='.$valor['id'].'">Ver Perfil</a>';
					echo '</li>';
					echo '</ul>';				
				}

				foreach ($pendientes as $key => $valor){
					echo '<h2>Nuevas solicitudes </h2>';
					echo '<ul>';
					echo '<li>';
					if($valor['usuario1'] == $_SESSION['usuario']->getNif()){
							$amigo = $ctrl->cargarUsuario($valor['usuario2']);	
							$estado = 'p1';			
						}else{
							$amigo = $ctrl->cargarUsuario($valor['usuario1']);
							$estado= 'p2';
						}
						echo '<h4>'.$amigo->getNombre().'</h4><br>';
						echo '<img src="'.$amigo->getFoto().'" width="300" height="120" alt="Foto usuario">';
						echo 'Preferencias: '.$amigo->getPreferencias().'<br>';
						echo '<a href="miPerfilMisAmigosPerfiles.php?id='.$amigo->getNif().'&estado='.$estado.'&relacion='.$valor['id'].'">Ver Perfil</a>';
						echo '</li>';
					echo '</ul>';
				}

				echo '</div>';
				echo '</div>';

			 }
			 else {
			     echo '<p><span class="varios">'. "Todavía no tiens amigos.".'</span></p>';
			 }

		?>
		
	</div>
			
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>