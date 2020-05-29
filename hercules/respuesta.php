<?php
require_once(__DIR__.'/includes/config.php');
require_once(__DIR__.'/includes/Forms/FormularioRespuesta.php');

//$id_mesg = $_GET['id_msg'];

$act = new FormularioRespuesta();
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
    		echo '<div class="boton-volver">';
    		      echo '<a href="mensaje.php?id_msg='.$_GET['id_msg'].'">Atrás</a>';
    		echo '</div>';
		
	   	    echo $html;
		?>

	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>