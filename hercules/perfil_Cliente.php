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
		
		$cliente = $ctrl->cargarUsuario($_GET['id']);
	?>

	<div id="contenido">
	
		<?php

		if ($cliente->getTipoUsuario()) {
		    echo '<h1>Perfil de Entrenador/a</h1>';
		}
		else {
		    echo '<h1>Perfil de Cliente</h1>';
		}
		
		echo '<h2>Datos personales</h2>';
		
		echo '<table>';
			echo '<tr><td>'.$cliente->getNombre().'</td></tr>';
			echo '<tr><td>'.$cliente->getEmail().'</td></tr>';
		echo '</table>';
		echo '<a href= "registrarEntrenamiento.php?idCliente='.$_GET['id'].'"> Proponer nuevo entrenamiento </a>';
		?>

		</form>
		
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>