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
		<h1>Entrenamientos</h1>
		<img src="https://i.pinimg.com/originals/d0/a2/83/d0a2839695fbbf7f760b4aeabee30957.gif" alt="quote" class= "gif" />
			
			<?php
			if($_SESSION['usuario']->getTipoUsuario()){
			    $idUsuarioEntrenador = $ctrl->idUsuarioEntrenador($_SESSION['usuario']->getNif(), $_GET['idCliente']);  

			    $entrenamientos = $ctrl->listarEntrenamientos($idUsuarioEntrenador);

				if(count($entrenamientos) > 0){
				    echo '<table class="tablaEntrenamientos">';
					
			
					foreach ($entrenamientos as $entrenamiento) {
						echo '<thead><tr>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'<th>Numero de Repeticiones</th>'.'</tr></thead>';

						echo '<tr>';
							echo '<td>'.$entrenamiento['nombre'].'</td>';
						    echo '<td>'.$entrenamiento['fecha'].'</td>';
						    echo '<td>'.$entrenamiento['repeticiones'].'</td>';
						    
						    

						    if(count($entrenamiento['ejercicios']) > 0){
								 		echo '<tr>'.'<th>Ejercicios</th>'.'</tr>';
								 foreach ($entrenamiento['ejercicios'] as $value) {
								 		echo '<tr>';

										echo '<td>'.$value['nombreEjercicio'].'</td>';
										echo '<td>'.$value['caloriasGastadas'].'</td>';
										echo '<td>'.$value['descripcion'].'</td>';
										echo '<td>'.'<img src='.$value['multimedia'].' alt="foto" class= "fotos" />'.'</td>';
									    
									    echo '</tr>';
										
						    	}
						    	
						    	
						    }else{
						    	echo "<p>No tienes ejercicios.</p>";
						    }
							
					}
					echo '</table>';
				 }
				 else {
				     echo "<p> Todavía no tienes entrenamientos.</p>";
				 }

			}else{ //si es cliente
				$idUsuarioEntrenadores = $ctrl->selectUs_Ent("id", "usuario='".$_SESSION["usuario"]->getNif()."'");
				//print_r($idUsuarioEntrenadores);
				
				foreach ($idUsuarioEntrenadores as $idUsuarioEntrenadores2) {
					//print_r($idUsuarioEntrenadores2['id']);
					$entrenamientos = $ctrl->listarEntrenamientos($idUsuarioEntrenadores2['id']);
					$idEntrenadores = $ctrl->selectUs_Ent("entrenador", "usuario='".$_SESSION["usuario"]->getNif()."' AND id ='".$idUsuarioEntrenadores2['id']."'");

				}
				if(count($entrenamientos) > 0){
				    echo '<table class="tablaEntrenamientos">';
					
			
					foreach ($entrenamientos as $entrenamiento) {
						foreach ($idEntrenadores as $idEntrenador) {
							echo '<thead><tr>'.'<th>Entrenador</th>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'<th>Numero de Repeticiones</th>'.'</tr></thead>';

							echo '<tr>';
								$nombreEntrenadores = $ctrl->selectUsuario("nombre", "nif='".$idEntrenador["entrenador"]."'");
								foreach ($nombreEntrenadores as $nombreEntrenador) {
									
									echo '<td>'.$nombreEntrenador['nombre'].'</td>';
									echo '<td>'.$entrenamiento['nombre'].'</td>';
								    echo '<td>'.$entrenamiento['fecha'].'</td>';
								    echo '<td>'.$entrenamiento['repeticiones'].'</td>';
								    
								    

								    if(count($entrenamiento['ejercicios']) > 0){
										 		echo '<tr>'.'<th>Ejercicios</th>'.'</tr>';
										 foreach ($entrenamiento['ejercicios'] as $value) {
										 		echo '<tr>';

												echo '<td>'.$value['nombreEjercicio'].'</td>';
												echo '<td>'.$value['caloriasGastadas'].'</td>';
												echo '<td>'.$value['descripcion'].'</td>';
												echo '<td>'.'<img src='.$value['multimedia'].' alt="foto" class= "fotos" />'.'</td>';
											    
											    echo '</tr>';
												
								    	}
								    	
								    	
								    }else{
								    	echo "<p>No tienes ejercicios.</p>";
								    }
								}
							echo '</tr>';
						}
					}
					echo '</table>';
				 }
				 else {
				     echo "<p> Todavía no tienes entrenamientos.</p>";
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