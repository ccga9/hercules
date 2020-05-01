<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>

	<div id="contenido">
		
		<h1>Todos los entrenadores disponibles</h1>
		<?php
		
		if (!isset($_GET['perfil'])) {
		    $arr = $ctrl->listarEntrenadores( (isset($_SESSION['login']))? $_SESSION['usuario']->getNif() : 0);
		    if (count($arr) > 0) {
		        foreach ($arr as $key => $valor) {
		            echo '<div id="entrenadores">';
		            
		            echo '<img src="includes/img/Hercules_logo.png" width="100" height="100" alt="Logo de Hercules: la web"><br>';
		            echo $valor['nombre'].'<br>';
		            echo $valor['titulacion'].'<br>';
		            echo $valor['especialidad'].'<br>';
		            echo "<a href= entrenadores.php?perfil=".$valor['nif'].">Ver Perfil</a>";
		            
		            echo '</div>';
		        }
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
		    if (file_exists($us->getFoto())) {
		        echo '<img src="'.$_SESSION['usuario']->getFoto().'" width="300" height="300" alt="Foto usuario">';
		    }
		    else {
		        echo '<img src="includes/img/usuarios/default.png" width="300" height="300" alt="Foto usuario default">';
		    }
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