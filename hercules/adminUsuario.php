<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloAdmin.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		
	?>

	<div id="contenido">

		<?php
		if(isset($_SESSION['login']) && $_SESSION['usuario']->getTipoUsuario()==2){
		    
		    $items_page = 8;
		    $page = isset($_GET['p'])?  $_GET['p'] : 1;
		    
		    if ($page < 1) {
		        $page = 1;
		    }
		    
		    $max = $ctrl->selectUsuario("count(*) as c", '');
		    
		    $max_page = ceil($max[0]['c'] / $items_page);
			
		    echo"<h2>GestionarUsuarios</h2>";
		    
		    if (!isset($_GET['perfil'])) {
		        
		        $arr = $ctrl->listarUsuarios("tipoUsuario != 2 ORDER BY nombre LIMIT ".($page - 1) * $items_page. ",".$items_page);
		        if (count($arr) > 0) {
		            echo '<div class="entrenadores-all">';
		          
		            echo '<ul>';
		            foreach ($arr as $key => $valor) {
		                echo '<li>';
		                echo '<h4>'.$valor['nombre'].'</h4>'.'<br>';
		                
		                echo '<img src="'.$valor['foto'].'"  alt="Foto usuario">';
		                
		                
		                echo $valor['titulacion'].'<br>';
		                echo $valor['especialidad'].'<br>';
		                echo $valor['experiencia'].' años </p>';
		                echo "<a href= entrenadores.php?perfil=".$valor['nif'].">Ver Perfil</a>";
		                
		                echo '</li>';
		            }
		            echo '</ul>';
		            echo '</div>';
		            
		        }
		    }
		    else {
		        echo '<div class="boton-volver"><a href="entrenadores.php">Volver</a></div>';
		        echo '<div class= "miPerfil">';
		        $us = $ctrl->cargarUsuario($_GET['perfil']);
		        echo '<h2>'.$us->getNombre().'</h2>';
		        echo '<img src="'.$us->getFoto().'"  alt="Foto usuario">';
		        
		        
		        echo '<br>';
		        echo '<p class="info">Titulacion: '.$us->getTitulacion().'</p><br>';
		        echo '<p class="info">Especialidad: '.$us->getEspecialidad().'</p><br>';
		        echo '<p class="info">Experiencia: '.$us->getExperiencia().' años</p><br>';
		        echo '<p class="info">Preferencias: '.$us->getPreferencias().'</p><br>';
		        
		        
		        if (!isset($_SESSION['login'])) {
		            echo '<h3 class="aviso"> ¡Entra como cliente para mandar solicitudes de entrenamiento!</h3><br>';
		        }
		        else if ($_SESSION['usuario']->getTipoUsuario() == 1) {
		            echo '<h3 class="aviso"> ¡Debes ser cliente para solicitar entrenadores!</h3>';
		        }
		        else {
		            $media = $ctrl->selectValor('ROUND(AVG(valor),1) as media', "hacia='".$us->getNif()."'");
		            $rating = $ctrl->selectValor('', "hacia='".$us->getNif()."' ORDER BY fecha DESC");
		            
		            $sol = $ctrl->selectUs_Ent('', "usuario='".$_SESSION["usuario"]->getNif()."' AND entrenador='".$us->getNif()."'");
		            
		            if (count($sol) == 1) {
		                if ($sol[0]['estado'] == "aceptado") {
		                    echo '<p>Solicitud aceptada</p>';
		                    echo "<a href=miPerfilMisEntrenadoresPerfiles.php?id=".$us->getNif().">Ir a Mis Entrenadores</a>";
		                }
		                else {
		                    echo '<p>Solicitud Enviada</p>';
		                }
		                
		            }
		            else {
		                echo '<form method="POST" action="PR_entrenadores_check.php">';
		                
		                echo '<input type="hidden" name="cliente" value="'.$_SESSION["usuario"]->getNif().'">';
		                echo '<input type="hidden" name="entrenador" value="'.$us->getNif().'">';
		                
		                echo '<button type="submit" name="solicitud">Enviar Solicitud</button>';
		                echo '</form>';
		            }
		            $c = count($rating);
		            
		            echo '<h2>Puntuación: '.$media[0]['media'].' ('.$c.')</h2>';
		            
		            if ($c > 0) {
		                echo '<div class="valoraciones">';
		                foreach ($rating as $valor) {
		                    if ($valor['visible']) {
		                        echo '<p>---'.$valor['fecha'].'---</p>';
		                        echo '<p class="valor">'.$valor['valor'].' estrellas</p>';
		                        echo '<p> <label>De: </label>'.$valor['de'].'</p>';
		                        echo '<p>'.$valor['texto'].'</p>';
		                    }
		                }
		                echo '</div>';
		            }
		        }
		        echo '</div>';
		    }
		}
		else { //Usuario registrado
		    echo "<h1>Usuario no registrado!</h1>";
		    echo "<p>Debes iniciar sesión para ver el contenido.</p>";
		}
		?>
			

	</div>
	
	<?php	

	if (!isset($_GET['perfil'])) {
	    echo '<div class="cont-marcador">';
	    echo '<div class="marcador-pagina">';
	    
	    if ($max_page > 0) {
	        if ($page > 1) {
	            echo "<a href= adminUsuario.php><<</a>";
	            $aux=$page - 1;
	            echo "<a href= adminUsuario.php?p=". $aux ."><</a>";
	        }

	        $i = $page - 3;
	        $j = 0;
	        while ($j < 7) {
	            if ($i >= 1 && $i <= $max_page) {
	                if ($i == $page) {
	                    echo '<a class="active" href= adminUsuario.php?p='.$i.">".$i."</a>";
	                }
	                else {
	                    echo "<a href= adminUsuario.php?p=".$i.">".$i."</a>";
	                }
	            }
	            $i++;
	            $j++;
	        }
	        
	        if ($page < $max_page) {
	            $aux=$page + 1;
	            echo "<a href= adminUsuario.php?p=". $aux .">></a>";
	            echo "<a href= adminUsuario.php?p=". $max_page .">>></a>";
	        }
	    }
	    else {
	        echo "No se encontraron resultados";
	    }
	   
	    echo '</div>';
	    echo '</div>';
	}

	?>
	

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>