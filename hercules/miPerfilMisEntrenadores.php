<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>Mi Perfil - Mis Entrenadores</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');

	?>

	<div id="contenido">
		<h2>Mis Entrenadores</h2>

		<?php  
			
			$arr = $ctrl->listarMisEntrenadores($_SESSION['usuario']->getNif());
			if(count($arr) > 0){
				echo '<div class="entrenadores-all">'; /*Estilo de estiloPagsCabecera*/
				echo '<ul>';
				foreach ($arr as $key => $valor) {
					echo '<li>';
						echo '<h4>'.$valor->getNombre().'</h4>';
						echo '<img src="'.$valor->getFoto().'" width="300" height="120" alt="Foto usuario">';
					    echo '<p><strong>Titulación: </strong> '.$valor->getTitulacion().'<br>';
					    echo '<strong>Especialidad: </strong> '.$valor->getEspecialidad().'<br>';
					    echo '<strong>Experiencia: </strong> '.$valor->getExperiencia().'</p>';
					    echo '<a href="miPerfilMisEntrenadoresPerfiles.php?id='.$valor->getNif().'">Mostrar Perfil</a>'; 
					echo '</li>';
				}
				echo '</ul>';
		        echo '</div>';
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