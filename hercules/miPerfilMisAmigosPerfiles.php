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
					echo "<a href= miPerfilBuzon.php?reciever=".$_GET['id']."&perfil=1>Chatea con ".$amigo->getNombre()."</a>";	
					echo '<h2 class="nombre" >'.$amigo->getNombre().' es tu amigo/a</h2><br>';
					 
				}else if($_GET['estado'] == "p1"){ //YO ENVIE LA SOLICITUD
					echo '<h2 class="nombre"> Para chatear con '.$amigo->getNombre().' tienes que esperar a que acepte tu invitación </h2>';
					echo '<h2 class="nombre" >'.$amigo->getNombre().' todavia no es tu amigo/a</h2><br>';
				
				}else{//TENGO UNA SOLICITUD PENDIENTE
					echo '<h2 class="nombre" >'.$amigo->getNombre().' quiere ser tu amigo/a</h2><br>';
					echo '<button id= "abrir" onclick="btnAbrir">Aceptar amigo </button>';
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
				
				//eliminarAmigo
				if ($_GET['estado'] == "a") {
				echo '<button id= "abrir" onclick="btnAbrir"> Eliminar amigo </button>';
				}	
				echo '</div>';

		       
		       
	

		?>

		
	</div>
		<div class="overlay" id="overlay">
			<div class = "popup" id="popup">
				<a class = "cerrar" id="cerrar" href="#bottom">Cerrar</a>
				
				
				<?php 
					if ($_GET['estado'] == "a") {//CUANDO ESTA ACEPTADO PODRÁ ELIMINAR AL USUARIO
						echo '<h2>¿Estas seguro?</h2>';
					    echo '<form action="PR_gestionaAmigo.php" method="post">';
						    echo '<input id="idEnt" type="hidden" name="id" />';
						    echo '<input type="hidden" name="id" value="'.$_GET['id'].'"/>';
						    echo '<input type="hidden" name="estado" value="'.$_GET['estado'].'"/>';
						    echo '<input type="hidden" name="relacion" value="'.$_GET['relacion'].'"/>';
						echo '<button type="submit" name="enviar" value="si">Si</button><br>';
					    echo '<button type="submit" name="enviar" value="no">No</button><br>';
					    echo '</form>';
					}else if($_GET['estado'] == "p2"){
						echo '<form action="PR_gestionaAmigo.php" method="post">';
						    echo '<input id="idEnt" type="hidden" name="id" />';
						    echo '<input type="hidden" name="id" value="'.$_GET['id'].'"/>';
						    echo '<input type="hidden" name="estado" value="'.$_GET['estado'].'"/>';
						    echo '<input type="hidden" name="relacion" value="'.$_GET['relacion'].'"/>';
						echo '<button type="submit" name="enviar" value="aceptar">Aceptar</button><br>';
					    echo '<button type="submit" name="enviar" value="rechazar">Rechazar</button><br>';
					    echo '</form>';
						
					}
				?>
			</div>
		</div>
	</div>
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
	<script type="text/javascript" src="includes/js/scripts.js" ></script>
</html>