<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
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
		
		$amigo = $ctrl->cargarUsuario($_GET['id']);
	?>

	<div id="contenido">
	
		<?php
		
		echo '<a href="miPerfilMisAmigos.php">ATRAS</a>';
		
		

				echo '<div class ="miPerfil">';

				if ($_GET['estado'] == "a") {
					echo "<a href= miPerfilBuzon.php?reciever=".$_GET['id'].">Chatea con ".$amigo->getNombre()."</a>";	
					echo '<h2 class="nombre" >'.$amigo->getNombre().' es tu amigo/a</h2><br>';
					 
				}else{
					echo '<h2> Para chatear con '.$amigo->getNombre().' tienes que esperar a que acepte tu invitación </h2>';
					echo '<h2 class="nombre" >'.$amigo->getNombre().' todavia no es tu amigo/a</h2><br>';	
					
				}
				echo '<img  src="'.$amigo->getFoto().'" alt="Foto usuario">';
			
				 				
				 echo '<label class = "eti">NIF </label> <p class = "info">'.$amigo->getNif().'</p><br>';				
				 echo '<label class = "eti">Correo electrónico </label> <p class = "info">'.$amigo->getEmail().'</p><br>';	
				 echo '<label class = "eti">Peso </label> <p class = "info"> '.$amigo->getPeso().' kgs</p><br>';		
				 echo '<label class = "eti">Altura </label> <p class = "info">'.$amigo->getAltura().' cm</p><br>';
				 echo '<label class = "eti">Fecha de nacimiento </label> <p class = "info"> '.$amigo->getFechaNac().'</p><br>';
				 echo '<label class = "eti">Preferencias </label> <p class = "info">'.$amigo->getPreferencias().'</p><br>';
				 echo '<label class = "eti">Ubicación </label> <p class = "info">'.$amigo->getUbicacion().'</p><br>';
				 echo '<label class = "eti">Teléfono </label><p class = "info">'.$amigo->getTelefono().'</p><br>';
				 echo '<label class = "eti">Sexo </label><p class = "info">'.$amigo->getSexo().'</p><br>';
				
				echo '</div>';
		       
		       
		
		

		?>

		
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>