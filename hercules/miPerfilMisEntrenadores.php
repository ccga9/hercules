<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');

	?>

	<div id="contenido">
		<h1>Mis Entrenadores</h1>

		<form action="recomendacionesEntrenador.php" method="post">

		<?php  
			
			$arr = $ctrl->listarMisEntrenadores($_SESSION['usuario']->getNif());
            
			if(count($arr) > 0){
			    echo '<table>';
				echo '<tr>'.'<th>Nombre</th>'.'<th>Titulacion</th>'.'<th>Especialidad</th>'.'<th>Experiencia</th>'.'</tr>';
		
				foreach ($arr as $key => $valor) {
					echo '<tr>';
						echo '<td>'.$valor['nombre'].'</td>';
					    echo '<td>'.$valor['titulacion'].'</td>';
					    echo '<td>'.$valor['especialidad'].'</td>';
					    echo '<td>'.$valor['experiencia'].'</td>';
					    echo '<td> <a href="perfil_Entrenador.php?id='.$key.'">Mostrar Perfil</a> </td>'; 
					echo'</tr>';
					
				}
				echo '</table>';
			 }
			 else {
			     echo "Todavía no tiene entrenadores.";
			 }

		?>

		</form>
		
	</div>
			
	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>