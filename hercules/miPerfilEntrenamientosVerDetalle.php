<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloEntrenamientos.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php
		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');
	?>

	<div id="contenido">
		
			<?php
			if(isset($_GET['entrenamiento'])){
				$entrenamiento = $ctrl->cargarEntrenamiento($_GET['entrenamiento']);
				$idEjercicio = $ctrl->listarEntrenamientoEjercicio($_GET['entrenamiento']);
				//$ejercicio = $ctrl->cargarEjercicio($idEjercicio);

				echo '<h1 class="tituloEntrenamiento">Ejercicios de: '.$entrenamiento->getNombre().' --> '.$entrenamiento->getRepeticiones().' repeticiones</h1>';
				echo '<img src="https://i.pinimg.com/originals/d0/a2/83/d0a2839695fbbf7f760b4aeabee30957.gif" alt="quote" class= "gif" />';

				if(count($idEjercicio) > 0){
					echo '<table class="tablaEntrenamientos">';
								echo '<thead><tr>'.'<th>Nombre del ejercicio</th>'.'<th>Calorías gastadas</th>'.'<th>Descripción</th>'.'<th>Multimedia</th>'.'</tr></thead>';
								foreach ($idEjercicio as $value) {
									echo '<tr>';
										$ejercicio = $ctrl->cargarEjercicio($value['idEjercicio']);
										echo '<td>'.$ejercicio->getNombre().'</td>';
										echo '<td>'.$ejercicio->getCaloriasGastadas().'</td>';
										echo '<td>'.$ejercicio->getDescripcion().'</td>';
										echo '<td>'.'<img src='.$ejercicio->getMultimedia().' alt="foto" class= "fotos" />'.'</td>';
																				    
									echo '</tr>';
								}	
					echo '</table>';
				}else{
					echo '<p>No tienes ejercicios.</p>';
				}

			}
			
			?>
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>