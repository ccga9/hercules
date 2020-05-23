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
			
		    echo"<h2>Gestionar Usuarios</h2>";
		    
		    if (!isset($_GET['perfil'])) {
		        
		        $arr = $ctrl->listarUsuarios("tipoUsuario != 2 ORDER BY nombre LIMIT ".($page - 1) * $items_page. ",".$items_page);
		        if (count($arr) > 0) {
		            echo '<div class="entrenadores-all">';
		          
		            echo '<ul>';
		            foreach ($arr as $key => $valor) {
		                echo '<li>';
		                echo '<h4>'.$valor['nombre'].'</h4>'.'<br>';
		                
		                echo '<img src="'.$valor['foto'].'"  alt="Foto usuario">';
		               
		                if ($valor['tipoUsuario'] == 0) {
		                    echo '<p>Cliente</p>';
		                }
		                else {
		                    echo '<p>Entrenador</p>';
		                }
		                
		                echo "<a href= adminUsuario.php?perfil=".$valor['nif'].">Ver Perfil</a>";
		                
		                echo '</li>';
		            }
		            echo '</ul>';
		            echo '</div>';
		            
		        }
		    }
		    else {
		        echo '<div class="boton-volver"><a href="adminUsuario.php">Volver</a></div>';
		        echo '<div class= "miPerfil">';
		        $us = $ctrl->cargarUsuario($_GET['perfil']);
		        
		        if ($us !== 0) {
		            echo '<h2>'.$us->getNombre().'</h2>';
		            echo '<img src="'.$us->getFoto().'"  alt="Foto usuario">';
		            
		            echo '<p class="info">E-mail: '.$us->getEmail().'</p><br>';
		            echo '<p class="info">Telefono: '.$us->getTelefono().'</p><br>';
		            echo '<p class="info">Fecha Nacimiento: '.$us->getFechaNac().'</p><br>';
		            echo '<p class="info">Ubicacion: '.$us->getUbicacion().'</p><br>';
		            echo '<p class="info">Preferencias: '.$us->getPreferencias().'</p><br>';
		            
		            if ($us->getTipoUsuario() == 1) {
		                echo '<br>';
		                echo '<p class="info"><strong>Informacion profesional</strong></p><br>';
		                echo '<p class="info">Titulacion: '.$us->getTitulacion().'</p><br>';
		                echo '<p class="info">Especialidad: '.$us->getEspecialidad().'</p><br>';
		                echo '<p class="info">Experiencia: '.$us->getExperiencia().' años</p><br>';
		            }
		            
		            echo '<button id= "abrir">Eliminar Usuario</button>';
		            
		            $media = $ctrl->selectValor('ROUND(AVG(valor),1) as media', "hacia='".$us->getNif()."'");
		            $rating = $ctrl->selectValor('', "hacia='".$us->getNif()."' ORDER BY fecha DESC");
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
		            
		            echo '</div>';
		        }
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
	
	<div class="overlay" id="overlay">
			<div class = "popup" id="popup">
				<a class = "cerrar" id="cerrar" href="#bottom">Volver atras</a>
				<h2>Estas a punto de eliminar al usuario</h2>
				<h2>¿Estas seguro?</h2>
				
				<?php 
				echo '<form method="POST" action="PR_admin.php">';
				
				if (isset($_GET['perfil']) && $us !== 0)
				    echo '<input type="hidden" name="user" value="'.$_GET['perfil'].'">';
				
				
				echo '<button type="submit" name="admin_submit" value="elim_user">Confirmar</button>';
				echo '</form>';
				?>
			
		</div>
	</div>
	

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->
<script type="text/javascript" src="includes/js/scripts.js" ></script>
</body>
</html>