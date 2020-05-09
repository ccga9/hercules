<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloEntrenamientos.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="includes/js/scripts.js" ></script>
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
		<h1 class="tituloEntrenamiento">Entrenamientos</h1>
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
										echo '<td><a href="miPerfilEntrenamientosVerDetalle.php?entrenamiento='.$aux.'">'.$entrenamiento['nombre'].'</a></td>';
										echo '<td>'.$entrenamiento['fecha'].'</td>';
										
										echo '<td><a href="">Editar entrenamiento</a></td>';
										echo '<td><button id= "abrir'.$entrenamiento['id'].'" onclick="eliminarEntrenami('.$entrenamiento['id'].')"> Eliminar entrenamiento </button></td>';
										
								echo '</tr>';
							}
						echo '</table>';
					}else {
						echo "<p> Todavía no tienes entrenamientos.</p>";
			 		}

			}else{ //si es cliente
				$idUsuarioEntrenadores = $ctrl->selectUs_Ent("id, entrenador", "usuario='".$_SESSION["usuario"]->getNif()."'");

					if(count($idUsuarioEntrenadores) > 0){
						foreach ($idUsuarioEntrenadores as $idUsuarioEntrenadores2) {
							$entrenamientos = $ctrl->listarEntrenamientos($idUsuarioEntrenadores2['id']);
							$nombreEntrenador = $ctrl->selectUsuario("nombre", "nif='".$idUsuarioEntrenadores2['entrenador']."'");

								if(count($entrenamientos) > 0){
									echo '<table class="tablaEntrenamientos">';
									echo '<thead><tr>'.'<th>Entrenador</th>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'</tr></thead>';
						   	 			foreach ($entrenamientos as $entrenamiento) {
											echo '<tr>';
													$aux = serialize($entrenamiento);
													$aux = urlencode($aux);

													echo '<td>'.$nombreEntrenador[0]['nombre'].'</td>';
													echo '<td><a href="miPerfilEntrenamientosVerDetalle.php?entrenamiento='.$aux.'">'.$entrenamiento['nombre'].'</a></td>';
												    echo '<td>'.$entrenamiento['fecha'].'</td>';
									
											echo '</tr>';
										}
									echo '</table>';	
								}else {
						    	    echo "<p> Todavía no tienes entrenamientos.</p>";
						 }
					}
				}else{
					echo '<p> No tiene entrenamientos </p>';
				}
			}	
	?>

	<div class="overlay" id="overlay">
			<div class = "popup" id="popup">
				<a class = "cerrar" id="cerrar" href="#bottom">Cerrar</a>
				<h2>¿Estas seguro?</h2>
				<?php 
				    echo '<form action="PR_eliminarEntrenamiento.php" method="post">';
				     echo '<input id="idEnt" type="hidden" name="id" />';
				     echo '<input type="hidden" name="idCliente" value="'.$_GET['idCliente'].'"/>';
				    echo '<p id="imprimirID"></p>';
					echo '<button type="submit" name="enviar" value="si">Si</button><br>';
				    echo '<button type="submit" name="enviar" value="no">No</button><br>';
				    echo '</form>';
				
				?>
			</div>
		</div>
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->
</body>
</html>