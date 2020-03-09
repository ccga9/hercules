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

		//Este codigo esta duplicado con DAO de momento.
		//Es para preguntar el lunes donde deberia ir

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

			$usernom = htmlspecialchars(strip_tags($_POST['user']));
			$passw = htmlspecialchars(strip_tags($_POST['passw']));

			$quer = $conn->query("SELECT * FROM usuarios WHERE nombre='" . $usernom . "'");
			//QUE TIPO DE USUARIO ES
			$rol = $conn->query("SELECT tipoUsuario FROM usuarios WHERE nombre='" . $usernom . "'");

			if ($row = $quer->fetch_assoc()) {

				if ($row['contrasenna'] == hash("sha256", $passw)) {
					$_SESSION['login'] = true;
					$_SESSION['nombre'] = $usernom;
					$_SESSION['rol'] = $rol;
				}
			}
			else {
				session_destroy();
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

