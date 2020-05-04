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
		
		echo '<a href="miPerfilMisClientes.php">ATRAS</a>';
		
		if ($_SESSION['login'] && $_SESSION['usuario']->getTipoUsuario()) {
		    echo '<h1>Perfil de Cliente</h1>';
		    
		    echo '<h2>Datos personales</h2>';
		    
		    echo '<table>';
		    echo '<tr><td>'.$cliente->getNombre().'</td></tr>';
		    echo '<tr><td>'.$cliente->getEmail().'</td></tr>';
		    echo '</table>';
		    
		    $arr = $ctrl->selectUs_Ent('', "usuario='".$_GET['id']."' AND entrenador ='".$_SESSION['usuario']->getNif()."'");
		    if (count($arr) == 1) {
		        if ($arr[0]['estado'] == "aceptado") {
		            echo '<br><a href= "registrarEntrenamiento.php?idCliente='.$_GET['id'].'"> Proponer nuevo entrenamiento </a></br> ';
		            echo '<a href= "miPerfilEntrenamientos.php?idCliente='.$_GET['id'].'"> Ver entrenamientos </a><br>';
		            echo "<a href= miPerfilBuzon.php?reciever=".$_GET['id'].">Ir al chat</a>";
		        }
		        else {
		            echo '<form action="buzon.php" method="post">';
		  		    echo '<button type="submit" name="aceptar" value="'.$arr[0]['usuario'].'">Aceptar</button>';
		  		    echo '<button type="submit" name="rechazar" value="'.$arr[0]['usuario'].'">Rechazar</button>'.'<br>';
		            echo '</form>';
		        }
		    }
		    else {
		        echo 'Página no encontrada';
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