<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
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

		echo '<img src="'.$_SESSION['usuario']->getFoto().'" width="300" height="120" alt="Foto usuario">';
		echo '<table>';
		
		echo '<tr>';
		 echo '<td>'.$_SESSION['usuario']->getNombre().'</td>';					
		echo'</tr>';
		echo '<tr>';
		 echo '<td>'.$_SESSION['usuario']->getNif().'</td>';				
		echo'</tr>';
		echo '<tr>';
		 echo '<td>'.$_SESSION['usuario']->getEmail().'</td>';			
		echo'</tr>';	
	
		echo '</table>';
			
		}
		?>

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>