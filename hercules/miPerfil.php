<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
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
		if(!isset($_SESSION['login'])){
			echo "<h1>Usuario no registrado!</h1>";
			echo "<p>Debes iniciar sesión para ver el contenido.</p>";
		}
		else { //Usuario registrado
		?>
	
		<h2>Datos personales</h2>
			

		<?php
		echo '<div class ="miPerfil">';

		echo '<h2>'.$_SESSION['usuario']->getNombre().'</h2><br>';	
		echo '<img  src="'.$_SESSION['usuario']->getFoto().'" alt="Foto usuario">';
	
		 				
		 echo '<label>NIF: </label><p class = "info">'.$_SESSION['usuario']->getNif().'</p><br>';				
		 echo '<p class = "info">Correo electronico: '.$_SESSION['usuario']->getEmail().'</p><br>';	
		 echo '<p class = "info">Peso: '.$_SESSION['usuario']->getPeso().'</p><br>';		
		 echo '<p class = "info">Altura: '.$_SESSION['usuario']->getAltura().'</p><br>';
		 echo '<p class = "info">Fecha de nacimiento: '.$_SESSION['usuario']->getFechaNac().'</p><br>';
		 echo '<p class = "info">Preferencias: '.$_SESSION['usuario']->getPreferencias().'</p><br>';
		 echo '<p class = "info">Ubicacion: '.$_SESSION['usuario']->getUbicacion().'</p><br>';
		 echo '<p class = "info">Telefono: '.$_SESSION['usuario']->getAltura().'</p><br>';
		 echo '<p class = "info">Sexo: '.$_SESSION['usuario']->getSexo().'</p><br>';
		 if($_SESSION['usuario']->getTipoUsuario()==1){
		 	echo '<p class = "info">Experiencia: '.$_SESSION['usuario']->getExperiencia().'</p><br>';
		 	echo '<p class = "info">Titulacion: '.$_SESSION['usuario']->getTitulacion().'</p><br>';
		 	echo '<p class = "info">Especialidad: '.$_SESSION['usuario']->getEspecialidad().'</p><br>';
		 }
		echo '</div>';
		}

		?>

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>