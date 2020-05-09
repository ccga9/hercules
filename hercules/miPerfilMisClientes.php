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
	<title>Mi Perfil - Mis Clientes</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');

	?>

	<div id="contenido">
		<h2>Mis clientes</h2>

		<?php  
		
		$nuevo =  $ctrl->listarMisSolicitudes($_SESSION['usuario']->getNif());
			
		$arr = $ctrl->listarMisClientes($_SESSION['usuario']->getNif());
		echo '<div class="entrenadores-all">';
		if (count($nuevo) > 0) {
		    
		    echo '<ul>';
		    foreach ($nuevo as $key => $valor) {
		        echo '<li>';
		        echo '<h4>'.$valor->getNombre().'</h4>';
		        echo '<img src="'.$valor->getFoto().'"><br>';
		        echo '<p><strong>¡Nueva Solicitud!</strong></p>';
		        echo '<p><strong>Email: </strong> '.$valor->getEmail().'</p>';
		        echo '<a href="miPerfilMisClientesPerfiles.php?id='.$valor->getNif().'">Mostrar Perfil</a>';
		        echo '</li>';
		        
		    }
		    echo '</ul>';
		}
		if(count($arr) > 0){
		   
            echo '<ul>';
			foreach ($arr as $key => $valor) {
				echo '<li>';
					echo '<h4>'.$valor->getNombre().'</h4>';
					echo '<img src="'.$valor->getFoto().'"><br>';
				    echo '<p><strong>Email: </strong> '.$valor->getEmail().'</p>';
				    echo '<a href="miPerfilMisClientesPerfiles.php?id='.$valor->getNif().'">Mostrar Perfil</a>';  
				echo '</li>';
	
			}
			echo '</ul>';
		 }
		 if (count($nuevo) == 0 && count($arr) == 0) {
		     echo '<p><span class="varios">'. "Todavía no tiene clientes.".'</span></p>';
		 }
		 
		 echo '</div>';

		?>

	</div>
			
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>