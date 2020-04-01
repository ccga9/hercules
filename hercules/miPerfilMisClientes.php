<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
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
			
			$arr = $ctrl->listarMisClientes($_SESSION['usuario']->getNif());
            
			if(count($arr) > 0){
			    echo '<table>';
				echo '<tr>'.'<th>Nombre</th>'.'<th>email</th>'.'<th></th>';
		
				foreach ($arr as $key => $valor) {
					echo '<tr>';
						echo '<td>'.$valor['nombre'].'</td>';
					    echo '<td>'.$valor['email'].'</td>';
					    echo '<td> <a href="perfil_Cliente.php?id='.$key.'">Mostrar Perfil</a> </td>'; 
					echo'</tr>';
					
				}
				echo '</table>';
			 }
			 else {
			     echo "Todavía no tienes clientes.";
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