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

		echo '<img  src="'.$_SESSION['usuario']->getFoto().'" alt="Foto usuario">';
	
		 echo '<h2 class= "nombre">'.$_SESSION['usuario']->getNombre().'</h2><br>';					
		 echo '<p class = "info">NIF: '.$_SESSION['usuario']->getNif().'</p><br>';				
		 echo '<p class = "info">Correo electronico: '.$_SESSION['usuario']->getEmail().'</p><br>';	
		 echo '<p>Peso: '.$_SESSION['usuario']->getPeso().'</p><br>';		
		 echo '<p>Altura: '.$_SESSION['usuario']->getAltura().'</p><br>';

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