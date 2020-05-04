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
		if(isset($_SESSION['login'])){
			require('miPerfilCabecera.php');
		}
		
		$entrenador = $ctrl->cargarUsuario($_GET['id']);
	?>

	<div id="contenido">
	
		<?php
		
		echo '<a href="miPerfilMisEntrenadores.php">ATRAS</a>';
		
		if ($_SESSION['login'] && $_SESSION['usuario']->getTipoUsuario() == '0') {

    		echo '<h1>Perfil de Entrenador/a</h1>';
    		
    		echo '<h2>Datos personales</h2>';
    		
    		echo '<table>';
    			echo '<tr><td>Nombre: '.$entrenador->getNombre().'</td></tr>';
    			echo '<tr><td>Email: '.$entrenador->getEmail().'</td></tr>';
    			echo '<tr><td>Titulacion: '.$entrenador->getTitulacion().'</td></tr>';
    			echo '<tr><td>Especialidad: '.$entrenador->getEspecialidad().'</td></tr>';
    			echo '<tr><td>Experiencia: '.$entrenador->getExperiencia().'</td></tr>';
    		echo '</table>';
    		echo '<a href= "miPerfilEntrenamientos.php?idEntrenador='.$_GET['id'].'"> Ver entrenamientos </a>';
    		echo '<br>';
    		echo "<a href= miPerfilBuzon.php?reciever=".$_GET['id'].">Ir al chat</a>";
    		echo '<br>';
    		echo '<a href= "eliminarEntrenador.php?idEntrenador='.$_GET['id'].'"> Eliminar de mi lista </a>';
		}
		else {
		    echo 'Página no encontrada';
		}
		
		?>
		
		<div class="overlay">
			<div class = "popup">
				<a href="#">Cerrar</a>
				<?php 
				$rate = $ctrl->selectValor('', "de='".$_SESSION['usuario']->getNif()."' AND hacia='".$_GET['id']."'");
				if (count($rate) > 0) {
				    echo '<form action="procesaValoracion.php">';
				    echo '<label>Descripcion: </label><br>';
				    echo '<textarea name="texto" placeholder="Escribe tu opinion">'.$rate[0]['texto'].'</textarea>';
				    echo '<br>';
				    echo '(Anteriormente elegiste '.$rate[0]['valor'].')';
				    echo '<br>';
				    echo '<label>1</label><input type="radio" name="rate" value="1"/>';
				    echo '<label>2</label><input type="radio" name="rate" value="2"/>';
				    echo '<label>3</label><input type="radio" name="rate" value="3"/>';
				    echo '<label>4</label><input type="radio" name="rate" value="4"/>';
				    echo '<label>5</label><input type="radio" name="rate" value="5"/>';
				    echo '<br>';
				    echo '<button type="submit" name="enviar" value="enviar">Enviar</button>'.'<br>';
				    echo '</form>';
				}
				else {
				    echo '<form action="procesaValoracion.php">';
				    echo '<label>Descripcion: </label><br>';
                    echo '<textarea name="texto" placeholder="Escribe tu opinion"></textarea>';
				    echo '<br>';
				    echo '<label>1</label><input type="radio" name="rate" value="1"/>';
				    echo '<label>2</label><input type="radio" name="rate" value="2"/>';
				    echo '<label>3</label><input type="radio" name="rate" value="3"/>';
				    echo '<label>4</label><input type="radio" name="rate" value="4"/>';
				    echo '<label>5</label><input type="radio" name="rate" value="5"/>';
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

</body>
</html>