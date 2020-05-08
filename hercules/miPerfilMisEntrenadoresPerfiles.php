<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		if(isset($_SESSION['login'])){
			require('miPerfilCabecera.php');
		}
	
	?>

	<div id="contenido">
	
		<?php
		
		echo '<a href="miPerfilMisEntrenadores.php">Volver a mis entrenadores</a>';
		
		if ($_SESSION['login'] && $_SESSION['usuario']->getTipoUsuario() == '0') {

    		echo '<h1>Perfil de Entrenador/a</h1>';
    		
    		echo '<h2>Datos personales</h2>';
    		
    		$entrenador = $ctrl->cargarUsuario($_GET['id']);
    		
    		echo '<table>';
    			echo '<tr><td>Nombre: '.$entrenador->getNombre().'</td></tr>';
    			echo '<tr><td>Email: '.$entrenador->getEmail().'</td></tr>';
    			echo '<tr><td>Titulacion: '.$entrenador->getTitulacion().'</td></tr>';
    			echo '<tr><td>Especialidad: '.$entrenador->getEspecialidad().'</td></tr>';
    			echo '<tr><td>Experiencia: '.$entrenador->getExperiencia().'</td></tr>';
    		echo '</table>';
    		echo '<a href= "miPerfilEntrenamientosVer.php?idEntrenador='.$_GET['id'].'"> Ver entrenamientos </a>';
    		echo '<br>';
    		echo "<a href= miPerfilBuzon.php?reciever=".$_GET['id'].">Ir al chat</a>";
    		echo '<br>';
    		echo '<a href= "PR_eliminarEntrenador.php?idEntrenador='.$_GET['id'].'"> Eliminar de mi lista </a>';
    		echo '<br>';
    		echo '<button id= "abrir"> Dejar mi reseña </button>';
		}
		else {
		    header("Location: login.php");
		}
		
		?>
		
		<div class="overlay" id="overlay">
			<div class = "popup" id="popup">
				<a class = "cerrar" id="cerrar" href="#bottom">Cerrar</a>
				<h2>DEJA TU RESEÑA</h2>
				<?php 
				$rate = $ctrl->selectValor('', "de='".$_SESSION['usuario']->getNif()."' AND hacia='".$_GET['id']."'");
				if (count($rate) > 0) {
				    echo '<form action="PR_miPerfilMisEntrenadoresPerfiles_valorar.php" method="post">';
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
				    echo '<form action="PR_miPerfilMisEntrenadoresPerfiles_valorar.php" method="post">';
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