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

		$alimentos = $ctrl->listarAlimentos();
		?>
		<form action='InsertaComida.php' method='POST' id="alimentoform">
			
			<label for="instrucciones_tipo"> Escoge el tipo de comida que desees:</label>
			<p><input type="radio" name="tipo" value="desayuno" checked/> desayuno
			<input type="radio" name="tipo" value="comida"/> comida
			<input type="radio" name="tipo" value="cena"/> cena</p>

			<p><label for="instrucciones_alimentos">Selecciona entre 1 y 3 platos, dependiendo del tipo de comida que hayas escogido y la cantidad que quieras comer:</label></p>

		  	<label for="nombre_1">Primer plato o plato único</label>
			<select id="alimento_1" name="alimento_1" form="alimentoform">
				<option value = ""> </option>
				<?php
				foreach ($alimentos as $key => $value)
					echo "<option value = '".$value."'>".$value."</option>";
				?>
			</select>

			<label for="nombre_2">Segundo plato</label>
			<select id="alimento_2" name="alimento_2" form="alimentoform">
				<option value = ""> </option>
				<?php
				foreach ($alimentos as $key => $value)
					echo "<option value = '".$value."'>".$value."</option>";
				?>
			</select>

			<label for="nombre_3">Postre</label>
			<select id="alimento_3" name="alimento_3" form="alimentoform">
				<option value = ""> </option>
				<?php
				foreach ($alimentos as $key => $value)
					echo "<option value = '".$value."'>".$value."</option>";
				?>
			</select>
			 
		   <p><input type="submit" value="Submit"></p>
		</form>
		  

	</div><!-- fin contenido -->
		<?php	

		require('includes/comun/pie.php');

		?>
	</div> <!--  fin contenedor -->
	</body>
</html>