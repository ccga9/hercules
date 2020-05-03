<?php
require_once(__DIR__.'/includes/config.php');
require_once(__DIR__.'/includes/Forms/FormularioRespuesta.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="includes/estiloMenu.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloFormularios.css" />
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
	   	    $act = new FormularioRespuesta($_GET['id_msg']);
			$act->gestiona();
		?>

	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>