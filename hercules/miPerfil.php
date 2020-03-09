<?php 
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mi perfil</title>
</head>
<body>
	<?php

		session_start();
		include("cabecera.php");
		include("menu.php");

	?>




	<?php


		//DATOS EN COMÚN ENTRE TIPO DE USUARIOS REGISTRADOS
		

	
		if($_SESSION['rol'] == "cliente"){

			include("miPerfilCliente.php");

		}else if($_SESSION['rol'] == "entrenador"){

			include("miPerfilEntrenador.php");

		}


		include("pie.php");
	?>




</body>
</html>