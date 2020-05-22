<?php
require_once 'includes/config.php';
require_once(__DIR__.'/includes/Forms/FormNuevoAdmin.php');

$act = new FormNuevoAdmin();
$html=$act->gestiona();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloAdmin.css" />
	
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
		    
		    if (!isset($_GET['perfil'])) {
    		    $items_page = 8;
    		    $page = isset($_GET['p'])?  $_GET['p'] : 1;
    		    
    		    if ($page < 1) {
    		        $page = 1;
    		    }
    		    
    		    $max = $ctrl->selectUsuario("count(*) as c", 'tipoUsuario = 2');
    		    $max_page = ceil($max[0]['c'] / $items_page);
    		   
    		    echo"<h2>Administradores</h2>";
    		    
    		    $aux = 1;
    		    echo '<a href= adminNuevaCuenta.php?reg='.$aux.'>Crear Nuevo Admin</a>';
    		    
    		    
    		    echo"<h3>Lista de Administradores</h3>";
    	       
    		    $arr = $ctrl->listarUsuarios("tipoUsuario = 2 AND nif != '".$_SESSION['usuario']->getNif()."' ORDER BY nombre LIMIT ".($page - 1) * $items_page. ",".$items_page);
    		    if (count($arr) > 0) {
    		        echo '<div class="entrenadores-all">';
    		        
    		        echo '<ul>';
    		        foreach ($arr as $key => $valor) {
    		            echo '<li>';
    		            echo '<h4>'.$valor['nombre'].'</h4>'.'<br>';
    		            
    		            echo '<img src="'.$valor['foto'].'"  alt="Foto usuario">';
    		            
    		            echo "<a href= adminLista.php?perfil=".$valor['nif'].">Eliminar Usuario</a>";
    		        
    		            echo '</li>';
    		        }
    		        echo '</ul>';
    		        echo '</div>'; //<!-- Fin de entrenadores-all -->
    		    }
		    }
		    else {
		        echo '<div class="boton-volver"><a href="adminLista.php">Volver</a></div>';
		        echo '<div class= "miPerfil">';
		        $us = $ctrl->cargarUsuario($_GET['perfil']);
		        if ($us->getTipoUsuario() == 2) {
		            echo '<h2>'.$us->getNombre().'</h2>';
		            echo '<img src="'.$us->getFoto().'"  alt="Foto usuario">';
		            echo '<button id= "abrir">Eliminar Usuario</button>';
		        }
		        else {
		          echo '<h2>ERROR: Algo inesperado ha pasado.</h2>';  
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
                echo "<a href= adminLista.php><<</a>";
                $aux=$page - 1;
                echo "<a href= adminLista.php?p=". $aux ."><</a>";
            }
    
            $i = $page - 3;
            $j = 0;
            while ($j < 7) {
                if ($i >= 1 && $i <= $max_page) {
                    if ($i == $page) {
                        echo '<a class="active" href= adminLista.php?p='.$i.">".$i."</a>";
                    }
                    else {
                        echo "<a href= adminLista.php?p=".$i.">".$i."</a>";
                    }
                }
                $i++;
                $j++;
            }
            
            if ($page < $max_page) {
                $aux=$page + 1;
                echo "<a href= adminLista.php?p=". $aux .">></a>";
                echo "<a href= adminLista.php?p=". $max_page .">>></a>";
            }
        }
       
        echo '</div>';
        echo '</div>'; //<!-- Fin del cont-marcador -->
	}
	
	?>

	<?php	

		require('includes/comun/pie.php');

	?>
	
	<div class="overlay" id="overlay">
			<div class ="popup" id="popup">
				<a class = "cerrar" id="cerrar" href="#bottom">Volver atras</a>
				<h2>Estas a punto de eliminar al usuario</h2>
				<h2>¿Estas seguro?</h2>
				
				<?php 
				echo '<form method="POST" action="PR_admin.php">';
				
				if (isset($us))
				    echo '<input type="hidden" name="user" value="'.$us->getNif().'">';
				
				
				echo '<button type="submit" name="admin_submit" value="elim_user">Confirmar</button>';
				echo '</form>';
				?>
				
		</div>
	</div> <!-- Fin del overlay -->
	
</div> <!-- Fin del contenedor -->
<script type="text/javascript" src="includes/js/scripts.js" ></script>

</body>
</html>