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

		        	echo '<div class="submenu-perfil">
							<div class="comidaentrena-all">
							<img src="includes/img/ver_entrenamientos.png" alt="Histórico de Entrenamientos">
							<form action="miPerfilEntrenamientos.php?idCliente='.$_GET['id'].'" method="post">
								<button type="submit" name="registro">Ver entrenamientos</button>
							</form>
							</div>

							<div class="comidaentrena-all">
							<img src="includes/img/registrar_entrenamiento.png" alt="Registrar Entrenamiento">
							<form action="registrarEntrenamiento.php?idCliente='.$_GET['id'].'" method="post">
								<button type="submit" name="registro">Proponer nuevo entrenamiento</button>
							</form>
							</div>
						</div>';

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