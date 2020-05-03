<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsCabecera.css" />
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

		<form action="recomendacionesEntrenador.php" method="post">

		<?php  
			
			$arr = $ctrl->listarEntrenadores($_SESSION['usuario']->getNif());
			if(count($arr) > 0){
				echo '<div class="entrenadores-all">'; /*Estilo de estiloPagsCabecera*/
				echo '<ul>';
				foreach ($arr as $key => $valor) {
					echo '<li>';
						echo '<h4>'.$valor['nombre'].'</h4>';
						echo '<img src="'.$_SESSION['usuario']->getFoto().'"><br>';
					    echo '<p><strong>Titulación: </strong> '.$valor['titulacion'].'<br>';
					    echo '<strong>Especialidad: </strong> '.$valor['especialidad'].'<br>';
					    echo '<strong>Experiencia: </strong> '.$valor['experiencia'].'</p>';
					    echo '<a href="perfil_Entrenador.php?id='.$key.'">Mostrar Perfil</a>'; 
					echo '</li>';
				}
				echo '</ul>';
		        echo '</div>';
			 }
			 else {
			     echo '<p><span class="varios">'. "Todavía no tiene entrenadores.".'</span></p>';
			 }

		?>

		</form>
		
	</div>
			
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>