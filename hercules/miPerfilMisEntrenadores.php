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
		require('miPerfilCabecera.php');

	?>

	<div id="contenido">
		<h1>Mis Entrenadores</h1>

		<form action="recomendacionesEntrenador.php" method="post">

		<?php  
			
			$arr = $ctrl->listarEntrenadores($_SESSION['usuario']->getNif());
			$estados = $ctrl->listarSolicitudes($_SESSION['usuario']->getNif());

			if (count($arr) > 0) {

				if(count($estados) > 1){
					echo '<table>';
					echo '<tr>'.'<th>Nombre</th>'.'<th>Titulacion</th>'.'<th>Especialidad</th>'.'<th>Experiencia</th>'.'<th>Seleccionar</th>';
			
					foreach ($arr as $key => $valor) {
						if ($estados[$key] == 'aceptado'){
							echo '<tr>';
								echo '<td>'.$valor['nombre'].'</td>';
							    echo '<td>'.$valor['titulacion'].'</td>';
							    echo '<td>'.$valor['especialidad'].'</td>';
							    echo '<td>'.$valor['experiencia'].'</td>';
							    echo '<td>'.'<input type="radio" name="radio_entrenador" value='.$key.'>'.'</td>'; 
							echo'</tr>';
							}
					}


					echo '</table>';

					if (isset($_SESSION['login'])) {
						echo '<input type="submit" name="submit" Value="Ver entrenamientos recomendados"/>';
					}
				}

				else {
					echo "Todavía no tiene entrenadores.";
				}

			}
			else {
				echo "No parece haber entrenadores ahora mismo. Vuelve mas tarde.";
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