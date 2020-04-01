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
			echo
			$idUsuarioEntrenador = $ctrl->idUsuarioEntrenador($_GET['idEntrenador'], $_SESSION['usuario']->getNif());
			echo $idUsuarioEntrenador;
			$entrenamientos = $ctrl->listarEntrenamientos($idUsuarioEntrenador);

			if(count($entrenamientos) > 0){
			    echo '<table>';
				echo '<tr>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'<th>Ejercicios</th>'.'</tr>';
		
				foreach ($entrenamientos as $entrenamiento) {
					echo '<tr>';
						echo '<td>'.$entrenamiento['nombre'].'</td>';
					    echo '<td>'.$entrenamiento['fecha'].'</td>';
					    if(count($entrenamiento) > 0){
					    	 echo '<table>';
							 echo '<tr>'.'<th>Nombre</th>'.'<th>Calorias Gastadas</th>'.'<th>Descripcion</th>'.'</tr>';
							 foreach ($entrenamiento as $ejercicios) {
									echo '<tr>';

									echo '<td>'.$ejercicios['nombre'].'</td>';
					    			echo '<td>'.$ejercicios['caloriasGastadas'].'</td>';
					    			echo '<td>'.$ejercicios['descripcion'].'</td>';

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