<?php
require_once 'includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloAdmin.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	
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
		    
		    $max = $ctrl->selectEjercicio("count(*) as c", '');
		    
		    $max_page = ceil($max[0]['c'] / $items_page);
		    
		    echo"<h2>Gestionar Ejercicios</h2>";
		    
		    if (!isset($_GET['perfil'])) {
		        
		        echo '<a href= adminNuevoEjercicio.php>Añadir Ejercicio</a>';
		        
		        echo"<h3>Lista de Ejercicios</h3>";
		        
		        $arr = $ctrl->selectEjercicio("","1=1 ORDER BY nombre LIMIT ".($page - 1) * $items_page. ",".$items_page);
		        if (count($arr) > 0) {
		            echo '<div class="entrenadores-all">';
		            
		            echo '<ul>';
		            foreach ($arr as $key => $valor) {
		                echo '<li>';
		                echo '<h4>'.$valor['nombre'].'</h4>'.'<br>';
		                
		                echo '<img src="'.$valor['multimedia'].'"  alt="Foto usuario">';
		                
		                echo "<a href= adminEjercicio.php?perfil=".$valor['idEjercicio'].">Editar</a>";
		                
		                echo '</li>';
		            }
		            echo '</ul>';
		            echo '</div>';
		        }
		    }
		    else {
		        echo '<div class="boton-volver"><a href="adminEjericio.php">Volver</a></div>';
		        
		        $ejer = $ctrl->selectEjercicio('', "idEjercicio='".$_GET['perfil']."'");
		        
		        if (count($ejer) == 1) {
		            echo '<div class= "miPerfil">';
		            
		            echo '<img src="'.$ejer[0]['multimedia'].'"  alt="Foto ejercicio">';
		            
		            echo '<div class="form-registro">';
		            echo '<form method="POST" action="PR_admin.php" enctype="multipart/form-data">';
		            
		            echo '<input class="control" type="hidden" name="idEjer" value="'.$ejer[0]['idEjercicio'].'"/>';
		            
		            echo '<div class="grupo-control">
		                  <label>Nombre:</label> <input class="control" type="text" name="nombre" value="'.$ejer[0]['nombre'].'" required/>
		              </div>
                    <div class="grupo-control">
    		              <label>Sube foto:</label><input name="uploadImage" type="file"/>
    		        </div>
    		        <div class="grupo-control">
    		              <label>Calorias que gasta:</label> <input type="number" name="cal" value="'.$ejer[0]['caloriasGastadas'].'" step="any" min="0" required>
    		        </div>
    		        <div class="grupo-control">
    		              <label>Tipo:</label> <input class="control" type="text" name="tipo" value="'.$ejer[0]['tipo'].'" required/>
    		        </div>
    		        <div class="grupo-control">
    		              <label>Descripción:</label>
    		        </div>
		            <div class="grupo-control">
		                  <textarea name="desc" rows="10" cols="100" required>'.$ejer[0]['descripcion'].'</textarea>
		            </div>';
		            
		            echo '<div class="botones"><button type="submit" name="admin_submit" value="edit_ejer">Confirmar Cambios</button></div>';
		            echo '</form>';
		            
		            echo '</div>';
		            echo '<button id="abrir">Eliminar Ejercicio</button>';
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
	            echo "<a href= adminEjercicio.php><<</a>";
	            $aux=$page - 1;
	            echo "<a href= adminEjercicio.php?p=". $aux ."><</a>";
	        }

	        $i = $page - 3;
	        $j = 0;
	        while ($j < 7) {
	            if ($i >= 1 && $i <= $max_page) {
	                if ($i == $page) {
	                    echo '<a class="active" href= adminEjercicio.php?p='.$i.">".$i."</a>";
	                }
	                else {
	                    echo "<a href= adminEjercicio.php?p=".$i.">".$i."</a>";
	                }
	            }
	            $i++;
	            $j++;
	        }
	        
	        if ($page < $max_page) {
	            $aux=$page + 1;
	            echo "<a href= adminEjercicio.php?p=". $aux .">></a>";
	            echo "<a href= adminEjercicio.php?p=". $max_page .">>></a>";
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
				<h2>Estas a punto de eliminar el ejercicio</h2>
				<h2>¿Estas seguro?</h2>
				
				<?php 
				echo '<form method="POST" action="PR_admin.php">';
				
				if (isset($_GET['perfil']) && count($ejer) == 1)
				    echo '<input type="hidden" name="user" value="'.$_GET['perfil'].'">';
				
				echo '<button type="submit" name="admin_submit" value="elim_ejer">Confirmar</button>';
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