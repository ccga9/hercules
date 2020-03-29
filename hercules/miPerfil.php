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

	?>

	<div id="contenido">
		<h1>Buzón</h1>

		<form action="buzon.php" method="post">

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
				echo 'Nada por aqui. Pero ya verás... en cualquier momento...' . '<br>';
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