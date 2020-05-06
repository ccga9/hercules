<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloPagsMiPerfil.css" />
	<!-- <script type="text/javascript" src="includes/JS/volver.js"></script> -->
	<meta charset="utf-8">
	<title>Mi Perfil - Comidas</title>
	<style>
	table { border: 1px solid black;
	        border-collapse: collapse;
	        width: 800px; }
    td { border: 1px solid black; }
	</style>
</head>

<body>

<div id="contenedor">

	<?php
		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');
	?>

	<div id="contenido">
		
		<a href="verComidas.php"> 🔙Volver </a>
		<!-- <button type="submit" onclick="goBack()">Go Back</button> -->
		
		<?php
		if (!isset($_SESSION['login']))
		{
		    echo '<p>Entra con tu usuario para ver comidas</p>';
		}
		
		$nif_usuario = $_SESSION['usuario']->getNif();
		$comidas = $ctrl->verComidas($nif_usuario);
		
		if (count($comidas) == 0)
		{
		    echo "<p> No se ha registrado ninguna comida todavía.</p>";
		}
		else
		{
		    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		    $max = $comidas[0]['dia'];
		    foreach ($comidas as $value)
		    {
		        if ($value['dia'] > $max)
		            $max = $value['dia'];
		    }
		    //$fecha_array = getdate(strtotime($max));
		    //$fecha_array = date("Y-m-d H:i:s", strtotime($max));
		    //$fecha_array = date("F", strtotime($max));
		    $mes = $meses[date('n', strtotime($max))-1];
    		?>
    		<!--<p>-->
    		<table>	
    		<caption> <h3><?php echo $mes; ?></h3> </caption>
    		<caption> <a href="#">Semana anterior</a> / <a href="#">Semana actual</a></caption>
    		<tr> <th>Lunes</th> <th>Martes</th> <th>Miércoles</th> <th>Jueves</th> <th>Viernes</th>
    			<th>Sábado</th> <th>Domingo</th> </tr>
    		
    	  	<?php
    	    
    	    
    	  	
    	  	
		}
	       ?>
        	</table>
       	    <!--</p>-->
        
	</div>
	
	<?php
	require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>