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

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>

	<div id="contenido">

		<form action="entrena_check.php" method="post">

		<?php  

			if (!isset($_SESSION['login'])) {
				echo "<h1>Usuario no registrado!</h1>";
				echo "<p>Debes iniciar sesión para realizar solicitudes de entrenamiento.</p>";
			}
			else {
				?>
				<h1>Todos los entrenadores disponibles</h1>
				<?php
				$arr = $ctrl->listarEntrenadores($_SESSION['usuario']->getNif());
			if (count($arr) > 0) {
				echo '<table>';
				  echo '<tr>'.'<th>Nombre</th>'.'<th>Titulacion</th>'.'<th>Especialidad</th>'.'<th>Experiencia</th>';
				  if (isset($_SESSION['login'])) {
				  	echo '<th>¿Solicitar entrenamiento?</th>';
				  }
				  echo '</tr>';

				  if (isset($_SESSION['login'])) {
				  	$estados = $ctrl->listarSolicitudes($_SESSION['usuario']->getNif());
				  	foreach ($arr as $key => $valor) {
						echo '<tr>';
							echo '<td>'.$valor['nombre'].'</td>';
						    echo '<td>'.$valor['titulacion'].'</td>';
						    echo '<td>'.$valor['especialidad'].'</td>';
						    echo '<td>'.$valor['experiencia'].'</td>';
						    if (!isset($estados[$key])) {
								echo '<td>'.'<input type="checkbox" name="check_list[]" value='.$key.'>'.'</td>';
							}
							else if ($estados[$key] == 'pendiente'){
								echo '<td>'.'Solicitud enviada'.'</td>';
							}
							else if ($estados[$key] == 'aceptado'){
								echo '<td>'.'Ya soy tu entrenador/a'.'</td>';
							}
					 	echo'</tr>';
					}
				  }
				  else {
				  	foreach ($arr as $key => $valor) {
						echo '<tr>';
							echo '<td>'.$valor['nombre'].'</td>';
						    echo '<td>'.$valor['titulacion'].'</td>';
						    echo '<td>'.$valor['especialidad'].'</td>';
						    echo '<td>'.$valor['experiencia'].'</td>';
					 	echo'</tr>';
					}
				  }
				  	
				echo '</table>';

				if (isset($_SESSION['login'])) {
					echo '<input type="submit" name="submit" Value="Enviar petición"/>';
				}
				
			}
			else {
				echo "No parece haber entrenadores disponibles ahora mismo. Vuelve mas tarde.";
			}
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