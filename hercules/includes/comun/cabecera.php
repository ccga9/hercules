<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LA PAGINA</title>
</head>
<body>

	<div id="cabecera">
		<h1>Hércules</h1>
		<div class="saludo">

		<?php  

		if (isset($_SESSION['login'])) {
			echo  "Has entrado como " . $_SESSION['nombre'] . ". ". '<a href= logout.php>' . "Logout" . '</a>';
		}
		else {

			echo '<form action="procesarLogin.php" method="post">';
		
			echo '<fieldset>';
				echo '<legend>Registrarte</legend>';
				echo 'Usuario:<br>';
				echo '<input type="text" name="user"> <br>';
				echo 'Contraseña:<br>'; 
				echo '<input type="password" name="passw"> <br>';

				echo '<input type="submit" name="aceptar">';
			echo '</fieldset>';

			echo '</form> <br>';

			echo '<a href= registrar.php>' . "O Regístrate" . '</a>';
		}

		?>

		</div>

	</div>
	
</body>
</html>