<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
	<meta charset="utf-8">
	<title>Mi Perfil - Comidas</title>
	<style>
	table { border: 1px solid black;
	        border-collapse: collapse;
	        width: 900px; }
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
		<?php
		if (!isset($_SESSION['login']))
		{
		    echo '<p>Entra con tu usuario para registrar comida</p>';
		}
		
		$nif_usuario = $_SESSION['usuario']->getNif();
		$comidas = $ctrl->verComidas($nif_usuario);
		?>
		<p>A continuación se muestran las comidas que has registrado:</p>
		<p><table>
		<tr> <th>Fecha de registro</th> <th>Tipo</th> <th>Calorías</th> <th>Proteínas</th> <th>Grasas</th> <th>Hidratos de carbono</th> <th>Alimentos</th> </tr>
		
		<?php
		if (count($comidas) == 0)
		{
		    echo "<p> No se ha registrado ninguna comida todavía.</p>";
		}
		else
		{
    		$i = 0; $j = 0; $aux = 0;
    		$sumaCalorias = 0; $sumaProteinas = 0; $sumaGrasas = 0; $sumaHidratos = 0;
    		foreach ($comidas as $valor)
    		{
    		    echo "<tr>";
    		    if ($i == $j)
    	        {
    	            while ((count($comidas) != $i + 1) && ($comidas[$i]['dia'] == $comidas[$i + 1]['dia']))
    	            {
    	                $sumaCalorias += $comidas[$i]['caloriasConsumidas'];
    	                $sumaProteinas += $comidas[$i]['proteinas'];
    	                $sumaGrasas += $comidas[$i]['grasas'];
    	                $sumaHidratos += $comidas[$i]['carbohidratos'];
    	                ++$i;
    	                ++$aux;
    	            }
    	            $sumaCalorias += $comidas[$i]['caloriasConsumidas'];
    	            $sumaProteinas += $comidas[$i]['proteinas'];
    	            $sumaGrasas += $comidas[$i]['grasas'];
    	            $sumaHidratos += $comidas[$i]['carbohidratos'];
    	            ++$i;
    	            ++$aux;
    	            
    	            echo "<td rowspan = ".$aux.">".$valor['dia']."</td>";
    	            echo "<td rowspan = ".$aux.">".$valor['tipo']."</td>";
    	            echo "<td rowspan = ".$aux.">".$sumaCalorias."</td>";
    	            echo "<td rowspan = ".$aux.">".$sumaProteinas."</td>";
    	            echo "<td rowspan = ".$aux.">".$sumaGrasas."</td>";
    	            echo "<td rowspan = ".$aux.">".$sumaHidratos."</td>";
    	            
    	            $aux = 0;
    	            $sumaCalorias = 0; $sumaProteinas = 0; $sumaGrasas = 0; $sumaHidratos = 0;
    	        }
                ++$j;
    		    
    		    echo "<td>".$valor['nombre']."</td>";
                echo "</tr>";
    		}
        }
		?>
		</table></p>
		
		
	</div>
	
	<?php
	require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>