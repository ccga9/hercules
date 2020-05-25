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
				

				$aceptados = array();
				$pendientes = array();
				$enviadas = array();
				foreach ($arr as $key => $valor) {//SEPARAMOS LOS ACEPTADOS Y LAS NUEVAS SOLICITUDES
					if($valor['estado'] == "aceptado"){
						$aceptados[] = $valor;
					}else if ($valor['usuario2'] == $_SESSION['usuario']->getNif() && $valor['estado'] == "pendiente"){
						$pendientes[]= $valor;
					}else{
						$enviadas[] = $valor;
					}
				}

				if(!empty($aceptados)){
					echo '<div class="amigos">';
					echo '<div class="entrenadores-all">';
					echo '<div class="elem-item" category="vari">';
						echo '<ul>';
					foreach ($aceptados as $key => $valor) {
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
					}
					echo '</ul>';
					echo '</div>';
					echo '</div>';
					echo '</div>';

				}else{
					echo 'No tienes amigos';
				}

				//PENDIENTES
				if(!empty($pendientes)){
					echo '<div class="amigos">';
					echo '<div class="entrenadores-all">';
					echo '<div class="elem-item" category="vari">';
					echo '<h2>Nuevas solicitudes </h2>';
					echo '<ul>';
					foreach ($pendientes as $key => $valor){
						echo '<li>';
							if($valor['usuario2'] == $_SESSION['usuario']->getNif()){
								$amigo = $ctrl->cargarUsuario($valor['usuario1']);	
								$estado = 'p2';	

								echo '<h4>'.$amigo->getNombre().'</h4><br>';
								echo '<img src="'.$amigo->getFoto().'" width="300" height="120" alt="Foto usuario">';
								echo 'Preferencias: '.$amigo->getPreferencias().'<br>';
								echo '<a href="miPerfilMisAmigosPerfiles.php?id='.$amigo->getNif().'&estado='.$estado.'&relacion='.$valor['id'].'">Ver Perfil</a>';	
							}
						
						echo '</li>';
					}
					echo '</ul>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
				
				//SOLICITUDES ENVIADAS
				if(!empty($enviadas)){
					echo '<div class="amigos">';
					echo '<div class="entrenadores-all">';
					echo '<div class="elem-item" category="vari">';
					echo '<h2>Solicitudes enviadas </h2>';
					echo '<ul>';
					foreach ($enviadas as $key => $valor){
						
						echo '<li>';
							if($valor['usuario1'] == $_SESSION['usuario']->getNif()){
								$amigo = $ctrl->cargarUsuario($valor['usuario2']);	
								$estado = 'p1';	

								echo '<h4>'.$amigo->getNombre().'</h4><br>';
								echo '<img src="'.$amigo->getFoto().'" width="300" height="120" alt="Foto usuario">';
								echo 'Preferencias: '.$amigo->getPreferencias().'<br>';
								echo '<a href="miPerfilMisAmigosPerfiles.php?id='.$amigo->getNif().'&estado='.$estado.'&relacion='.$valor['id'].'">Ver Perfil</a>';	
							}
						echo '</li>';
						
					}
					echo '</ul>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					
				}
				

			 }
			 else {
			     echo '<p><span class="varios">'. "Todavía no tienes amigos.".'</span></p>';
			 }

		?>
		
	</div>
			
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>