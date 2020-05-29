<?php
require_once(__DIR__.'/includes/config.php');
require_once(__DIR__.'/includes/Forms/FormularioNuevoTema.php');

$act = new FormularioNuevoTema();
$html=$act->gestiona();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>Hércules</title>
</head>

<body>

<div id="contenedor">
    
	<?php	

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">

	<div class="boton-volver">
            <a href="foro.php">Atrás</a>
    </div>
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