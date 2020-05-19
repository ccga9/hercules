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
		   
		    echo"<h2>Crear Nuevos Admins</h2>";
	       
		    
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
				
				echo '<input type="hidden" name="user" value="'.$us->getNif().'">';
				
				echo '<button type="submit" name="admin_submit" value="elim_user">Confirmar</button>';
				echo '</form>';
				?>
				
			</div>
		</div>
	</div>
	

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->
<script type="text/javascript" src="includes/js/scripts.js" ></script>
</body>
</html>