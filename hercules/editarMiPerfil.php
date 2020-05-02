<?php 
	require_once 'includes/config.php';
	require_once(__DIR__.'/includes/Forms/FormularioEditarPerfil.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloFormularios.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php
		require('includes/comun/cabecera.php');
		if(isset($_SESSION['login'])){
			require('miPerfilCabecera.php');
		}
	?>

	<div id="contenido">
		<h2>Editar Perfil</h2>
		<?php  
			$act = new FormularioEditarPerfil();
			$act->gestiona();
		?>
			
		
	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>