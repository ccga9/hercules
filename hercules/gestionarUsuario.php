<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
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
		
			if($_SESSION['usuario']->getTipoUsuario()!=2){
				echo"<h3>No tienes permiso de Administrador";
			}
			else{
			echo"<h2>GestionarUsuarios</h2>";
			$usuarios = $ctrl->listarUsuarios();
		?>
			<table>
			 <tr> <th>Nombre</th> <th>Foto</th> </tr>
			<?php
				 foreach ($usuarios as $valor)
				{
            echo
            "<tr>
            <td>".$valor['nombre']."</td>
            <td>".$valor['fotos']."</td>
            </tr>";
			 }
			  
			}
			
		}
		?>
			</table></p>

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>