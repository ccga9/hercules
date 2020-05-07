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
						$nombreCliente = $ctrl->selectUsuario('nombre',"nif ='".$_GET['idCliente']."'");
						echo '<table class="tablaEntrenamientos">';
						echo '<thead><tr>'.'<th>Cliente</th>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'<th></th>'.'<th></th>'.'</tr></thead>';
							   	foreach ($entrenamientos as $entrenamiento) {
								echo '<tr>';
										$aux = serialize($entrenamiento);
										$aux = urlencode($aux);

										echo '<td>'.$nombreCliente[0]['nombre'].'</td>';
										echo '<td><a href="verEntrenamiento.php?entrenamiento='.$aux.'">'.$entrenamiento['nombre'].'</a></td>';
										echo '<td>'.$entrenamiento['fecha'].'</td>';
										echo '<td><a href="">Editar entrenamiento</a></td>';
										echo '<td><a href="">Eliminar entrenamiento</a></td>';

										
								echo '</tr>';
							}
						echo '</table>';
					}else {
						echo "<p> Todavía no tienes entrenamientos.</p>";
			 		}

			}else{ //si es cliente
				$idUsuarioEntrenadores = $ctrl->selectUs_Ent("id, entrenador", "usuario='".$_SESSION["usuario"]->getNif()."'");
				print_r($_SESSION["usuario"]->getNif());

					if(count($idUsuarioEntrenadores) > 0){
						echo '<table class="tablaEntrenamientos">';
							echo '<thead><tr>'.'<th>Entrenador</th>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'</tr></thead>';
						foreach ($idUsuarioEntrenadores as $idUsuarioEntrenadores2) {
							$entrenamientos = $ctrl->listarEntrenamientos($idUsuarioEntrenadores2['id']);
							$nombreEntrenador = $ctrl->selectUsuario("nombre", "nif='".$idUsuarioEntrenadores2['entrenador']."'");


								if(count($entrenamientos) > 0){
						   	 			foreach ($entrenamientos as $entrenamiento) {
											echo '<tr>';
													$aux = serialize($entrenamiento);
													$aux = urlencode($aux);

													echo '<td>'.$nombreEntrenador[0]['nombre'].'</td>';
													echo '<td><a href="verEntrenamiento.php?entrenamiento='.$aux.'">'.$entrenamiento['nombre'].'</a></td>';
												    echo '<td>'.$entrenamiento['fecha'].'</td>';
									
											echo '</tr>';
										}
										
								}else {
						    	    echo "<p> Todavía no tienes entrenamientos.</p>";
						 }
						echo '</table>';
					}
				}else{
					echo 'No tiene entrenamientos';
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