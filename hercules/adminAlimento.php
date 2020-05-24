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
		    
		    $max = $ctrl->selectAlimento("count(*) as c", '');
		    
		    $max_page = ceil($max[0]['c'] / $items_page);
		    
		    echo"<h2>Gestionar Alimentos</h2>";
		    
		    if (!isset($_GET['perfil'])) {
		        
		        echo '<a href= adminNuevoAlimento.php>Añadir Alimento</a>';
		        
		        echo"<h3>Lista de Alimentos</h3>";
		        
		        $arr = $ctrl->selectAlimento('', "1=1 ORDER BY nombre LIMIT ".($page - 1) * $items_page. ",".$items_page);
		        
		        if (count($arr) > 0) {
		            echo '<div class="entrenadores-all">';
		            
		            echo '<table>
		            <tr> <th>Nombre</th> <th>Calorías</th> <th>Carbohidratos</th> <th>Proteínas</th> <th>Grasas</th> <th></th> </tr>';
		           
		            foreach ($arr as $key => $valor) {
		                echo '<tr>';
		                
		                echo '<td>'.$valor['nombre'].'</td>';
		                echo '<td>'.$valor['caloriasConsumidas'].'</td>';
		                echo '<td>'.$valor['carbohidratos'].'</td>';
		                echo '<td>'.$valor['proteinas'].'</td>';
		                echo '<td>'.$valor['grasas'].'</td>';
		                echo '<td>'."<a href= adminAlimento.php?perfil=".$valor['idAlimento'].">Editar</a>".'</td>';
		                
		                echo '</tr>';
		            }
		            echo '</table>';
		            echo '</div>';  
		            
		        }
		    }
		    else {
		        echo '<div class="boton-volver"><a href="adminAlimento.php">Volver</a></div>';
		        
		        $alim = $ctrl->selectAlimento('', "idAlimento='".$_GET['perfil']."'");
		        
		        if (count($alim) == 1) {
		            echo '<div class= "miPerfil">';
		            
		            echo '<div class="form-registro">';
		            echo '<form method="POST" action="PR_admin.php">';
		            
		            echo '<input class="control" type="hidden" name="idalim" value="'.$alim[0]['idAlimento'].'"/>';
		           
		            echo '<div class="grupo-control">
		                  <label>Nombre:</label> <input class="control" type="text" name="nombre" value="'.$alim[0]['nombre'].'" required/>
		              </div>
    		        <div class="grupo-control">
    		              <label>Calorias:</label> <input type="number" name="cal" value="'.$alim[0]['caloriasConsumidas'].'" step="any" min="0" required>
    		        </div>
    		        <div class="grupo-control">
    		              <label>Carbohidratos:</label> <input type="number" name="car" value="'.$alim[0]['carbohidratos'].'" step="any" min="0" required>
    		        </div>
    		        <div class="grupo-control">
    		              <label>Proteinas</label> <input type="number" name="prot" value="'.$alim[0]['proteinas'].'" step="any" min="0" required>
    		        </div>
    		        <div class="grupo-control">
    		              <label>Grasas</label> <input type="number" name="gras" value="'.$alim[0]['grasas'].'" step="any" min="0" required>
    		        </div>';
		            
		            echo '<div class="botones"><button type="submit" name="admin_submit" value="edit_alim">Confirmar Cambios</button></div>';
		            echo '</form>';
		           
		            echo '</div>';
		            echo '<button id="abrir">Eliminar Alimento</button>';
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
	            echo "<a href= adminAlimento.php><<</a>";
	            $aux=$page - 1;
	            echo "<a href= adminAlimento.php?p=". $aux ."><</a>";
	        }

	        $i = $page - 3;
	        $j = 0;
	        while ($j < 7) {
	            if ($i >= 1 && $i <= $max_page) {
	                if ($i == $page) {
	                    echo '<a class="active" href= adminAlimento.php?p='.$i.">".$i."</a>";
	                }
	                else {
	                    echo "<a href= adminAlimento.php?p=".$i.">".$i."</a>";
	                }
	            }
	            $i++;
	            $j++;
	        }
	        
	        if ($page < $max_page) {
	            $aux=$page + 1;
	            echo "<a href= adminAlimento.php?p=". $aux .">></a>";
	            echo "<a href= adminAlimento.php?p=". $max_page .">>></a>";
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
				<h2>Estas a punto de eliminar el alimento</h2>
				<h2>¿Estas seguro?</h2>
				
				<?php 
				echo '<form method="POST" action="PR_admin.php">';
				
				if (isset($_GET['perfil']) && count($alim) == 1)
				    echo '<input type="hidden" name="user" value="'.$_GET['perfil'].'">';
				
				echo '<button type="submit" name="admin_submit" value="elim_alim">Confirmar</button>';
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