<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
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

	<?php
	if(isset($_SESSION['login']))
	{
		echo '<div class="cont-marcador">
			<div class="marcador-pagina">
			   
		        <a href= miPerfil.php?p=-2>Anteayer</a>
		        <a href= miPerfil.php?p=-1>Ayer</a>
		        <a href= miPerfil.php>Hoy</a>
		        <a href= miPerfil.php?p=1>Mañana</a>
		        <a href= miPerfil.php?p=2>Pasado Mañana</a>

			</div>
			</div>';
	}
	?>

	<div id="contenido">
	
		<?php

		if(!isset($_SESSION['login'])){
			echo "<h1>Usuario no registrado!</h1>";
			echo "<p>Debes iniciar sesión para ver el contenido.</p>";
		}
		else { //Usuario registrado

		if ($_SESSION['usuario']->getTipoUsuario() == 0) {
		    echo '<h2>Tareas de hoy</h2>';
		    if (isset($_GET['p']) && $_GET['p'] >= -2 && $_GET['p'] <= 2) {
		        $la_fecha=date('Y-m-d',strtotime($_GET['p']." days"));
		    }
		    else {
		        $la_fecha=date('Y-m-d');
		    }
		    
		    echo "<p>Viendo comidas y entrenamientos para ".$la_fecha."</p>";
		    
		    $nif_usuario = $_SESSION['usuario']->getNif();
		    
		    //Mostrar Comidas
		    $comidas_aux = $ctrl->verComidas($nif_usuario);
		    $comidas = array();
		    foreach ($comidas_aux as $valor) {
		        if (substr($valor['dia'], 0, 10) == $la_fecha) {
		            $comidas[] = $valor;
		        }
		    }
		    
		    //mostrar entrenamientos
		    $ids = $ctrl->selectUs_Ent('id', "usuario='".$_SESSION['usuario']->getNif()."'");
		    $entrena_final = array();
		    $entrena = array();
		    foreach ($ids as $valor) {
		        $aux = $ctrl->selectEntrena('', "idUsuarioEntrenador='".$valor['id']."'");
		        foreach ($aux as $valorj) {
		            $entrena[] = $valorj;
		        }
		    }
		    foreach ($entrena as $valor) {
		        if ($valor['fecha'] == $la_fecha) {
		            $entrena_final[] = $valor;
		        }
		    }
		    
		    
		    //Loop de comidas
		    if (count($comidas) == 0)
		    {
		        echo "<p>Ningún plan para comer hoy.</p>";
		    }
		    else
		    {
		        echo '<div class="tabla_comidas">
            	<p><table>
            	<tr> <th>Fecha</th> <th>Tipo</th> <th>Calorías</th> <th>Proteínas</th>
        	    <th>Grasas</th> <th>Carbohidratos</th> <th>Alimentos</th> </tr>';
		        
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
		        echo '</table></p>';
		        echo '</div>';
		    }
		    
		    //Loop eNTRENAMIENTOS
		    if (count($entrena_final) == 0) {
		        echo "<p>Ningún entrenamiento hoy.</p>";
		    }
		    else {
		        echo '<div class="tabla_comidas">';
		        echo '<p><table>';
		        echo '<tr>'.'<th>Nombre</th>'.'<th>Fecha</th>'.'<th>Reps</th>'.'</tr>';
		        //echo '<table class="tablaEntrenamientos">';
		        foreach ($entrena_final as $entrenamiento) {
		            echo '<tr>';
		            
		            echo '<td>'.$entrenamiento['nombre'].'</td>';
		            echo '<td>'.$entrenamiento['fecha'].'</td>';
		            echo '<td>'.$entrenamiento['repeticiones'].'</td>';
		            echo '</tr>';
		        }
		        echo '</table></p>';
		        echo '</div>';
		    }
		}
        ?>
        
		<h2>Datos personales</h2>
			

		<?php
		echo '<div class ="miPerfil">';

		echo '<h2 class="nombre" >'.$_SESSION['usuario']->getNombre().'</h2><br>';	
		echo '<img  src="'.$_SESSION['usuario']->getFoto().'" alt="Foto usuario">';
	
		 				
		 echo '<label class = "eti">NIF </label> <p class = "info">'.$_SESSION['usuario']->getNif().'</p><br>';				
		 echo '<label class = "eti">Correo electrónico </label> <p class = "info">'.$_SESSION['usuario']->getEmail().'</p><br>';	
		 echo '<label class = "eti">Peso </label> <p class = "info"> '.$_SESSION['usuario']->getPeso().' kgs</p><br>';		
		 echo '<label class = "eti">Altura </label> <p class = "info">'.$_SESSION['usuario']->getAltura().' cm</p><br>';
		 echo '<label class = "eti">Fecha de nacimiento </label> <p class = "info"> '.$_SESSION['usuario']->getFechaNac().'</p><br>';
		 echo '<label class = "eti">Preferencias </label> <p class = "info">'.$_SESSION['usuario']->getPreferencias().'</p><br>';
		 echo '<label class = "eti">Ubicación </label> <p class = "info">'.$_SESSION['usuario']->getUbicacion().'</p><br>';
		 echo '<label class = "eti">Teléfono </label><p class = "info">'.$_SESSION['usuario']->getTelefono().'</p><br>';
		 echo '<label class = "eti">Sexo </label><p class = "info">'.$_SESSION['usuario']->getSexo().'</p><br>';
		
		 if($_SESSION['usuario']->getTipoUsuario()==1){
		 	echo '<label class = "eti">Experiencia </label> <p class = "info">'.$_SESSION['usuario']->getExperiencia().' años</p><br>';
		 	echo '<label class = "eti">Titulacion </label> <p class = "info">'.$_SESSION['usuario']->getTitulacion().'</p><br>';
		 	echo '<label class = "eti">Especialidad</label> <p class = "info">'.$_SESSION['usuario']->getEspecialidad().'</p><br>';
		 }
		echo '</div>';
		}

		?>

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>