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
		require('miPerfilCabecera.php');

	?>

	<div id="contenido">
		<h1>Comidas</h1>

		<?php
		$nif_usuario = $_SESSION['usuario']->get_nif();

		// ...

		?>

		<form action="comidas.php" method="post">

			<!-- 1º dos formularios, uno para verComidas, y otro para registarComida:
				- verComidas es una lista de selección con las comidas que ha usado previamente el usuario.
			 	- registrarComida te lleva a otra página php y te propone 3 alimentos a escoger (en una lista de selección) 	además del tipo de comida que quieres.
			-->

		
			<!--<h3> Lista de alimentos </h3>
			<form action='nada.php' method='POST'>
				<p><select name='alimentos'>
					<?php
					/*$alimentos = $ctrl->listarAlimentos();
					foreach ($alimentos as $key => $value)
					{
						echo
						"<option value = '".$value."'>".$value."</option>";
					}*/
					?>
				</select></p>
				<p><input type="submit" value="Enviar"></p>
			</form>-->


		</form>

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>