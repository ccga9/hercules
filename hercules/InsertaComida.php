<?php 
    require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
	<head>
	<title>HERCULES</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	</head>
	
	<body>
	<div id="contenedor">
		<?php
			require('includes/comun/cabecera.php');
			require('miPerfilCabecera.php');
		?>
		
		<div id="contenido">

		<?php
		  if (!isset($_SESSION['login'])) {	
		      echo 'Entra con tu usuario para registrar comida'.'<br>';
		  }

		if (($_REQUEST['alimento_1'] != null) && ($_REQUEST['alimento_1'] != $_REQUEST['alimento_2']) && ($_REQUEST['alimento_1'] != $_REQUEST['alimento_3'])) 
		// && ($_REQUEST['alimento_2'] != $_REQUEST['alimento_3']) -> ¡OJO! los dos pueden ser null
		{
			$nif_usuario = $_SESSION['usuario']->getNif();
			$tipo_comida = $_REQUEST['tipo'];
			$primer_plato = $_REQUEST['alimento_1'];
			$segundo_plato = $_REQUEST['alimento_2'];
			$postre = $_REQUEST['alimento_3'];
			// ¿peso?

			$ctrl->registrarComida($primer_plato, $segundo_plato, $postre, $tipo_comida, $nif_usuario);

			echo "Tu comida se ha registrado con éxito, ¡Enhorabuena!";
		}
		else
			echo "ERROR: Introduzca datos válidos";

		?>

	</div>
		<?php	

		require('includes/comun/pie.php');

		?>
	</div>
	</body>
</html>