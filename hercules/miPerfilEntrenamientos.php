<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloEntrenamientos.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
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
										echo '<td><a href="verEntrenamiento.php?entrenamiento='.$aux.'">'.$entrenamiento['nombre'].'</a></td>';
										echo '<td>'.$entrenamiento['fecha'].'</td>';
										echo '<td><a href="">Editar entrenamiento</a></td>';
										//echo '<td><a href="">Eliminar entrenamiento</a></td>';
										echo '<td><button id= "abrir"> Eliminar entrenamiento </button></td>';
										
								echo '</tr>';
							}
						echo '</table>';
					}else {
						echo "<p> Todavía no tienes entrenamientos.</p>";
			 		}

			}else{ //si es cliente
				$idUsuarioEntrenadores = $ctrl->selectUs_Ent("id, entrenador", "usuario='".$_SESSION["usuario"]->getNif()."'");

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

	<div class="overlay" id="overlay">
			<div class = "popup" id="popup">
				<a class = "cerrar" id="cerrar" href="#bottom">Cerrar</a>
				<h2>DEJA TU RESEÑA</h2>
				<?php 
				$rate = $ctrl->selectValor('', "de='".$_SESSION['usuario']->getNif()."' AND hacia='".$_GET['id']."'");
				if (count($rate) > 0) {
				    echo '<form action="procesaValoracion.php" method="post">';
				    echo '<input type="hidden" name="de" value="'.$_SESSION['usuario']->getNif().'"/>';
				    echo '<input type="hidden" name="hacia" value="'.$_GET['id'].'"/>';
				    echo '<textarea name="texto" placeholder="Escribe tu opinion">'.$rate[0]['texto'].'</textarea>';
				    echo '<br>';
				    echo '<label>Puntuación: </label>';
				    for ($i = 1; $i <= 5; $i++) {
				        if ($i == $rate[0]['valor']) {
				            echo '<input type="radio" checked="checked" name="rate" value="'.$i.'"/><label>'.$i.'</label>';
				        }
				        else {
				            echo '<input type="radio" name="rate" value="'.$i.'"/><label>'.$i.'</label>';
				        }
				    }
    			    echo '<br>';
    			    if ($rate[0]['visible']) {
    			        echo '<input type="radio" name="vis" value="0"/><label>No Visible</label>';
    			        echo '<input type="radio" checked="checked" name="vis" value="1"/><label>Visible</label>';
    			    }
    			    else {
    			        echo '<input type="radio" checked="checked" name="vis" value="0"/><label>No Visible</label>';
    			        echo '<input type="radio" name="vis" value="1"/><label>Visible</label>';
    			    }
				    echo '<br>';
				    echo '<button type="submit" name="actualizar" value="actualizar">Actualizar</button>'.'<br>';
				    echo '</form>';
				}
				else {
				    echo '<form action="procesaValoracion.php" method="post">';
				    echo '<input type="hidden" name="de" value="'.$_SESSION['usuario']->getNif().'"/>';
				    echo '<input type="hidden" name="hacia" value="'.$_GET['id'].'"/>';
                    echo '<textarea name="texto" placeholder="Escribe tu opinion"></textarea>';
				    echo '<br>';
				    echo '<label>Puntuación: </label>';
				    for ($i = 1; $i <= 4; $i++) {
				        echo '<input type="radio" name="rate" value="'.$i.'"/><label>'.$i.'</label>';
				    }
				    echo '<input type="radio" checked="checked" name="rate" value="5"/><label>'.$i.'</label>';
				    echo '<br>';
				    echo '<input type="radio" name="vis" value="0"/><label>No Visible</label>';
				    echo '<input type="radio" checked="checked" name="vis" value="1"/><label>Visible</label>';
				    echo '<br>';
				    echo '<button type="submit" name="enviar" value="enviar">Enviar</button>'.'<br>';
				    echo '</form>';
				}
				?>
			</div>
		</div>
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->
<script type="text/javascript" src="includes/js/scripts.js" ></script>
</body>
</html>