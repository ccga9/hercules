<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
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

		<form action="buzon.php" method="post">

		<?php
		if(!isset($_SESSION['login'])){
			echo "<h1>Usuario no registrado!</h1>";
			echo "<p>Debes iniciar sesión para ver el contenido.</p>";
		}
		else { //Usuario registrado
			?>
			<h1>Buzón de <?php echo $_SESSION['usuario']->getNombre(); ?></h1>
			<?php
			$arr = $ctrl->miBuzon($_SESSION['usuario']->getNif());
			if (count($arr) > 0) {
				foreach ($arr as $key => $value) {
					echo $value .' quiere que le entrenes!!   '.
					 '<button type="submit" name="aceptar" value="'.$key.'">Aceptar</button>///
					<button type="submit" name="rechazar" value="'.$key.'">Rechazar</button>'.'<br>';
				}
			}
			else {
				echo 'Bienvenid@' . '<br>'; ?>
				<h2>Datos personales</h2>
				<?php
				$datos = $ctrl->consultarUsuario($_SESSION['usuario']->getNif());

				echo '<table>';
				foreach ($datos as $key => $valor) {
							echo '<tr>';
								echo '<td>'.$valor['nombre'].'</td>';					
							echo'</tr>';
							echo '<tr>';
								echo '<td>'.$valor['nif'].'</td>';				
							echo'</tr>';
							echo '<tr>';
								echo '<td>'.$valor['email'].'</td>';			
							echo'</tr>';	
				}
				echo '</table>';
			}
		}
		?>

		</form>

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>