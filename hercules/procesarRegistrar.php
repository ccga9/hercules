<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>LA PAGINA</title>
</head>

<body>

	<?php

		session_start();

		$usernom = htmlspecialchars(trim(strip_tags($_POST['user'])));
		$passw = htmlspecialchars(trim(strip_tags($_POST['passw'])));

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hercules";

		//Crear conexion base de datos
		$conn = new mysqli($servername, $username, $password, $dbname);

		//Comprobar conexion
		if ($conn->connect_error){
		    die("Database connection failed: " . mysqli_connect_error());
		    session_destroy();
		}
		else {

			$p = hash("sha256", $passw);

			$q = "INSERT INTO `usuarios` (`nif`, `nombre`, `contrasenna`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`) VALUES ('" . $usernom . "', '', '" . $p . "', '', '', '', '', '', '', '', '', '')";

			$ok = $conn->query($q);
			
			if ($ok) {
				echo "Dado de alta correctamente. <br>";
			}
			else {
				echo "ERROR: Problemas al insertar.";
			}
		}
	
	?>

	<div id="contenedor">

	<?php	

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<h1>Página principal</h1>
		<p> Aquí está el contenido público, visible para todos los usuarios. </p>
	</div>

	<?php	

		require('./includes/comun/pie.php');
	?>

</body>
</html>