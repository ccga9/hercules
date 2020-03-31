<?php 
    require_once'includes/config.php';
?>

<!DOCTYPE html>

<html>
	<head>
	<title>RegistrarComida</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	
	<body>
	<div id="contenedor">
		<?php
			require('includes/comun/cabecera.php');
		?>
		
		<div id="contenido">
		
		<h1> Lista de alimentos </h1>
		<?php
		  if (!isset($_SESSION['login'])) {	
		      echo 'Entra con tu usuario para registrar comida'.'<br>';
		  }
		?>
		<form action='nada.php' method='POST' id="alimentoform">
		  <label for="nombre">Alimento :</label>
		 
 			 <select id="alimentos" name="alimentos" form="alimentoform">
 			<?php
				$alimentos = $ctrl->listarAlimentos();
				foreach ($alimentos as $key => $value)
				{
					echo
					"<option value = '".$value."'>".$value."</option>";
				}
				?>
			</select>
		
 		    <label for="peso">Peso :</label>
  			<input type="text" id="lname" name="lname" value="En Gramos">
 			 
 		   <input type="submit" value="Submit">
		</form>
		  

	</div><!-- fin contenido -->
		<?php	

		require('includes/comun/pie.php');

		?>
	</div> <!--  fin contenedor -->
	</body>
</html>