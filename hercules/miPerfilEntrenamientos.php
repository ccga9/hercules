<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
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
		<h1>Entrenamientos</h1>
		<?php
	
			$idUsuarioEntrenador = $ctrl->idUsuarioEntrenador($_GET['idEntrenador'], $_SESSION['usuario']->getNif());

			$entrenamientos = $ctrl->listarEntrenamientos($idUsuarioEntrenador);

			if(count($entrenamientos) > 0){
			    echo '<table>';
				echo '<tr>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'<th>Ejercicios</th>'.'</tr>';
		
				foreach ($entrenamientos as $entrenamiento) {
					echo '<tr>';
						echo '<td>'.$entrenamiento['nombre'].'</td>';
					    echo '<td>'.$entrenamiento['fecha'].'</td>';
					    if(count($entrenamiento['ejercicios']) > 0){
					    	 echo '<table>';
							 echo '<tr>'.'<th>Nombre</th>'.'<th>Calorias Gastadas</th>'.'<th>Descripcion</th>'.'</tr>';
							 foreach ($entrenamiento['ejercicios'] as $value) {
									echo '<tr>';

									echo '<td>'.$value['nombreEjercicio'].'</td>';
					    			echo '<td>'.$value['caloriasGastadas'].'</td>';
					    			echo '<td>'.$value['descripcion'].'</td>';

					    			echo'</tr>';
					    	}

					    	echo'</tr>';
					    	echo '</table>';
					    }else{
					    	echo "No tienes ejercicios.";
					    }
					    
					echo'</tr>';
					
				}
				echo'</tr>';
				echo '</table>';
			 }
			 else {
			     echo "Todavía no tienes entrenamientos.";
			 }
			
		?>


	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>