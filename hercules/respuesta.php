<?php
require_once(__DIR__.'/includes/config.php');
require_once(__DIR__.'/includes/Forms/FormularioRespuesta.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
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
		  $id_mesg = $_GET['id_msg'];
	   	    $act = new FormularioRespuesta($id_mesg);
			$act->gestiona();
		?>

	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>