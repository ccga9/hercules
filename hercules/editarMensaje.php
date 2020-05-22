<?php
require_once(__DIR__.'/includes/config.php');
require_once(__DIR__.'/includes/Forms/FormularioEditarMensaje.php');

//$id_mesg = $_GET['id_msg'];

$act = new FormularioEditarMensaje();
$html=$act->gestiona();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	<meta http-equiv=â€�Content-Typeâ€� content=â€�text/html; charset=UTF-8â€³ />
	<title>HÃ©rcules</title>
</head>

<body>

<div id="contenedor">

	<?php	

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">

		<?php  
	   	    echo $html;
		?>

	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>