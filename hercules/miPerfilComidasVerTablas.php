<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>Mi Perfil - Comidas</title>
</head>

<body>

<div id="contenedor">

	<?php
		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');
	?>

	<div id="contenido">
	
		<div class="boton-volver">
			<a href="miPerfilComidasVer.php"> 🔙Volver </a>
		</div>
		
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
	    ?>
	    
	    <div class="primer_parrafo">
		<p>A continuación se muestran todas las comidas que has registrado:</p>
		</div>
		<div class="tabla_comidas">
		<p><table>
		<tr> <th>Fecha</th> <th>Tipo</th> <th>Calorías</th> <th>Proteínas</th>
		    <th>Grasas</th> <th>Carbohidratos</th> <th>Alimentos</th> </tr>
		    
		<?php
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
        
	</div>
	
	<?php
	require('includes/comun/pie.php');
	?>
</div> <!-- Fin del contenedor -->

</body>
</html>