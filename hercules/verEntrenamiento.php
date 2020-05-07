<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloEntrenamientos.css" />
	<meta charset="utf-8">
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
				$a = stripcslashes($_GET['entrenamiento']);
				$entrenamiento = unserialize($a);

				echo '<h1>Ejercicios de tu entrenamiento: '.$entrenamiento['nombre'].' </h1>';
				echo '<img src="https://i.pinimg.com/originals/d0/a2/83/d0a2839695fbbf7f760b4aeabee30957.gif" alt="quote" class= "gif" />';

				if(count($entrenamiento['ejercicios']) > 0){
					echo '<table class="tablaEntrenamientos">';
								echo '<thead><tr>'.'<th>Nombre del ejercicio</th>'.'<th>Calorias gastadas</th>'.'<th>Descripcion</th>'.'<th>Multimedia</th>'.'</tr></thead>';
								foreach ($entrenamiento['ejercicios'] as $value) {
									echo '<tr>';

										echo '<td>'.$value['nombreEjercicio'].'</td>';
										echo '<td>'.$value['caloriasGastadas'].'</td>';
										echo '<td>'.$value['descripcion'].'</td>';
										echo '<td>'.'<img src='.$value['multimedia'].' alt="foto" class= "fotos" />'.'</td>';
																				    
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