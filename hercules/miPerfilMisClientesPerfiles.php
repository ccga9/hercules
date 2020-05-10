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
		
		$cliente = $ctrl->cargarUsuario($_GET['id']);
	?>

	<div id="contenido">
	
		<?php
		
		echo '<a href="miPerfilMisClientes.php">ATRAS</a>';
		
		if ($_SESSION['login'] && $_SESSION['usuario']->getTipoUsuario()) {

		    $arr = $ctrl->selectUs_Ent('', "usuario='".$_GET['id']."' AND entrenador ='".$_SESSION['usuario']->getNif()."'");
		    if (count($arr) == 1) {

		    	
			
		        if ($arr[0]['estado'] == "aceptado") {

		        	echo '<div class="submenu-perfil">
							<div class="comidaentrena-all">
							<img src="includes/img/ver_entrenamientos.png" alt="Histórico de Entrenamientos">
							<form action="miPerfilEntrenamientosVer.php?idCliente='.$_GET['id'].'" method="post">
								<button type="submit" name="registro">Ver entrenamientos</button>
							</form>
							</div>

							<div class="comidaentrena-all">
							<img src="includes/img/registrar_entrenamiento.png" alt="Registrar Entrenamiento">
							<form action="miPerfilEntrenamientosRegistrar.php?idCliente='.$_GET['id'].'" method="post">
								<button type="submit" name="registro">Proponer nuevo entrenamiento</button>
							</form>
							</div>
						</div>';

				echo '<h1>Datos personales</h1>';
		    	echo '<h2>Perfil de Cliente</h2>';
				echo '<div class ="miPerfil">';
				echo '<h2 class="nombre" >'.$cliente->getNombre().'</h2><br>';	
				echo '<img  src="'.$cliente->getFoto().'" alt="Foto usuario">';
				 				
				 echo '<label class = "eti">NIF </label> <p class = "info">'.$cliente->getNif().'</p><br>';				
				 echo '<label class = "eti">Correo electrónico </label> <p class = "info">'.$cliente->getEmail().'</p><br>';	
				 echo '<label class = "eti">Peso </label> <p class = "info"> '.$cliente->getPeso().' kgs</p><br>';		
				 echo '<label class = "eti">Altura </label> <p class = "info">'.$cliente->getAltura().' cm</p><br>';
				 echo '<label class = "eti">Fecha de nacimiento </label> <p class = "info"> '.$cliente->getFechaNac().'</p><br>';
				 echo '<label class = "eti">Preferencias </label> <p class = "info">'.$cliente->getPreferencias().'</p><br>';
				 echo '<label class = "eti">Ubicación </label> <p class = "info">'.$cliente->getUbicacion().'</p><br>';
				 echo '<label class = "eti">Teléfono </label><p class = "info">'.$cliente->getTelefono().'</p><br>';
				 echo '<label class = "eti">Sexo </label><p class = "info">'.$cliente->getSexo().'</p><br>';
				
			echo '</div>';
		

		            echo "<a href= miPerfilBuzon.php?reciever=".$_GET['id'].">Ir al chat</a>";
		        }
		        else {
		            echo '<form action="PR_miPerfilMisClientesPerfiles_buzon.php" method="post">';
		            echo '<h2>¡Te ha enviado una solicitud!</h2>';
		            echo '<input type="hidden" name="cliente" value="'.$arr[0]['usuario'].'"/>';
		  		    echo '<button type="submit" name="aceptar" value="acepta">Aceptar</button>';
		  		    echo '<button type="submit" name="rechazar" value="rechaza">Rechazar</button>'.'<br>';
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