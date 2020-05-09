<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
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

		echo '<h2 class="nombre" >'.$_SESSION['usuario']->getNombre().'</h2><br>';	
		echo '<img  src="'.$_SESSION['usuario']->getFoto().'" alt="Foto usuario">';
	
		 				
		 echo '<label class = "eti">NIF </label> <p class = "info">'.$_SESSION['usuario']->getNif().'</p><br>';				
		 echo '<label class = "eti">Correo electrónico </label> <p class = "info">'.$_SESSION['usuario']->getEmail().'</p><br>';	
		 echo '<label class = "eti">Peso </label> <p class = "info"> '.$_SESSION['usuario']->getPeso().' kgs</p><br>';		
		 echo '<label class = "eti">Altura </label> <p class = "info">'.$_SESSION['usuario']->getAltura().' cm</p><br>';
		 echo '<label class = "eti">Fecha de nacimiento </label> <p class = "info"> '.$_SESSION['usuario']->getFechaNac().'</p><br>';
		 echo '<label class = "eti">Preferencias </label> <p class = "info">'.$_SESSION['usuario']->getPreferencias().'</p><br>';
		 echo '<label class = "eti">Ubicación </label> <p class = "info">'.$_SESSION['usuario']->getUbicacion().'</p><br>';
		 echo '<label class = "eti">Teléfono </label><p class = "info">'.$_SESSION['usuario']->getTelefono().'</p><br>';
		 echo '<label class = "eti">Sexo </label><p class = "info">'.$_SESSION['usuario']->getSexo().'</p><br>';
		
		 if($_SESSION['usuario']->getTipoUsuario()==1){
		 	echo '<label class = "eti">Experiencia </label> <p class = "info">'.$_SESSION['usuario']->getExperiencia().' años</p><br>';
		 	echo '<label class = "eti">Titulacion </label> <p class = "info">'.$_SESSION['usuario']->getTitulacion().'</p><br>';
		 	echo '<label class = "eti">Especialidad</label> <p class = "info">'.$_SESSION['usuario']->getEspecialidad().'</p><br>';
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