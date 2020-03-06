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

		$users = array('user' => 'userpass', 'admin' => 'adminpass');

		$username = htmlspecialchars(trim(strip_tags($_POST['user'])));
		$password = htmlspecialchars(trim(strip_tags($_POST['passw'])));

		if ($username != '' && $password != '') {
			
			$ident = 0;
			foreach($users as $key => $val){
				if ($username == $key && $password == $val) {
					$ident = 1;
				}
			}

			if ($ident == 1) {

				if ($username == 'admin' && $password == 'adminpass') {
					$_SESSION['esAdmin'] = true;
					$_SESSION['nombre'] = "Administrador";
				}
				else{
					$_SESSION['nombre'] = "Usuario";
				}

				$_SESSION['login'] = true;
			}
			else {
				session_destroy();
			}
		}
	
	?>

	<div id="contenedor">

	<?php	

		require('./interf/cabecera.php');

		require('./interf/sidebarIzq.php');

	?>

	<div id="contenido">
		<h1>Página principal</h1>
		<p> Aquí está el contenido público, visible para todos los usuarios. </p>
	</div>

	<?php	

		require('./interf/sidebarDer.php');

		require('./interf/pie.php');
	?>

</body>
</html>