<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsCabecera.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<div class="cab">
		<h1>Todos los entrenadores disponibles</h1>
		<img src="includes/img/entrenadores.png" alt="entrenadores">
		</div>
		<?php
		
		if (!isset($_GET['perfil'])) {
		    $arr = $ctrl->listarEntrenadores( (isset($_SESSION['login']))? $_SESSION['usuario']->getNif() : 0);
		    if (count($arr) > 0) {
		    	echo '<div class="entrenadores-all">';
		    	echo '<ul>';
		        foreach ($arr as $key => $valor) {
		            echo '<li>';
		            echo '<h4>'.$valor['nombre'].'</h4>'.'<br>';
		            echo '<img src="'.$valor['foto'].'" width="300" height="120" alt="Foto usuario">';
		            echo $valor['titulacion'].'<br>';
		            echo $valor['especialidad'].'<br>';
					    echo $valor['experiencia'].'</p>';
		            echo "<a href= entrenadores.php?perfil=".$valor['nif'].">Ver Perfil</a>";
		            
		            echo '</li>';
		        }
		        echo '</ul>';
		        echo '</div>';
		    }
		    else {
		        echo "No parece haber entrenadores disponibles ahora mismo. Vuelve mas tarde.";
		    }
		}
		else {
		    echo '<a href="entrenadores.php">Volver a ver entrenadores</a>';
		    
		    if (!isset($_SESSION['login'])) {
		        echo 'Entra con tu usuario para mandar solicitudes de entrenamiento.'.'<br>';
		    }
		    else if ($_SESSION['usuario']->getTipoUsuario() == 1) {
		        echo 'Debes ser cliente para solicitar entrenadores.';
		    }
		    
		    $us = $ctrl->cargarUsuario($_GET['perfil']);
		    echo '<h2>'.$us->getNombre().'</h2>';
		    echo '<img src="'.$us->getFoto().'" width="300" height="300" alt="Foto usuario">';
		 
		    
		    echo '<br>';
		    echo $us->getTitulacion().'<br>';
		    echo $us->getEspecialidad().'<br>';
		    echo $us->getExperiencia().'<br>';
		    echo $us->getPreferencias().'<br>';
		    
	        if (!isset($_SESSION['login'])) {
	            echo 'Entra como cliente para mandar solicitudes de entrenamiento.'.'<br>';
	        }
	        else if ($_SESSION['usuario']->getTipoUsuario() == 1) {
	            echo 'Debes ser cliente para solicitar entrenadores.';
	        }
	        else {
	            $sol = $ctrl->selectUs_Ent('', "usuario='".$_SESSION["usuario"]->getNif()."' AND entrenador='".$us->getNif()."'");
	            
	            if (count($sol) == 1) {
	                if ($sol[0]['estado'] == "aceptado") {
	                    
	                }
	                else {
	                    echo 'Solicitud Enviada';
	                }
	                
	            }
	            else {
	                echo '<form method="POST" action="entrena_check.php">';
	                
	                echo '<input type="hidden" name="cliente" value="'.$_SESSION["usuario"]->getNif().'">';
	                echo '<input type="hidden" name="entrenador" value="'.$us->getNif().'">';
	                
	                echo '<button type="submit" name="solicitud">Enviar Solicitud</button>';
	                echo '</form>';
	            }
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