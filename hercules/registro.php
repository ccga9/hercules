<?php  
	require_once('includes/config.php');
	require_once('includes/FormularioRegistro.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Hércules</title>
</head>

<body>

<div id="contenedor">

	<?php	

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<?php  
			$act = new FormularioRegistro();
			$act->gestiona();
		?>
	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>