<?php
require_once(__DIR__.'/includes/config.php');
require_once(__DIR__.'/includes/Forms/FormularioRespuesta.php');

$id_mesg = $_GET['id_msg'];

$act = new FormularioRespuesta($id_mesg);
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

		<?php  
	
		  /*echo '<div class="form-inicio">';
		  echo '<form action="nuevoTema.php">';
		  echo '<fieldset>';
		  echo '<legend>Responder</legend>';
		  echo '<div class="grupo-control">';
		  echo '<input type="text" name="texto"/>';
		  echo '</div>';
		  echo '<div class="grupo-control"><button type="submit" name="login">Enviar</button></div>';
		  echo '</fieldset>';
		  echo '</form>';
		  echo '</div>';*/
	   	    echo $html;
		?>

	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>