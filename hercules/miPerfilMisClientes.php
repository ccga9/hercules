<?php 
	require_once 'includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsCabecera.css" />
	<meta charset="utf-8">
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
		if( $arr != "" && count($arr) > 0 ){
		    echo '<div class="entrenadores-all">';
		    
		    if ($nuevo != false) {
		        echo '<ul>';
		        foreach ($nuevo as $key => $valor) {
		            echo '<li>';
		            echo '<h4>'.$valor->getNombre().'</h4>';
		            echo '<img src="'.$valor->getFoto().'"><br>';
		            echo '<p><strong>¡Nueva Solicitud!</strong></p>';
		            echo '<p><strong>Email: </strong> '.$valor->getEmail().'</p>';
		            echo '<a href="perfil_Cliente.php?id='.$valor->getNif().'">Mostrar Perfil</a>';
		            echo '</li>';
		            
		        }
		        echo '</ul>';
		    }
		    
            echo '<ul>';
			foreach ($arr as $key => $valor) {
				echo '<li>';
					echo '<h4>'.$valor->getNombre().'</h4>';
					echo '<img src="'.$valor->getFoto().'"><br>';
				    echo '<p><strong>Email: </strong> '.$valor->getEmail().'</p>';
				    echo '<a href="perfil_Cliente.php?id='.$valor->getNif().'">Mostrar Perfil</a>';  
				echo '</li>';
	
			}
			echo '</ul>';
	        echo '</div>';
		 }
		 else {
		     echo '<p><span class="varios">'. "Todavía no tiene clientes.".'</span></p>';
		 }

		?>

	</div>
			
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>