<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<script src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
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
		
		<div class="cab">
    		<h1>Los miembros de Hércules</h1>
    		<img src="includes/img/usuarios.png" alt="usuarios">
		</div>
		
		<div class="buscar-ejercicio">
			<!-- <label>Introduzca el nombre del usuario para encontrarlo más fácilmente</label> -->
			<form method="POST" action="usuarios.php">
				<input type="search" id="site-search" name="busqueda"/>
				<button type="submit" name="buscar">Buscar</button>
			</form>
		</div>
		
		<?php
		
		$usuarios = $ctrl->verUsuarios();
		
		if (count($usuarios) == 0)
		{
		    echo '<p>Todavía no hay ningún usuario registrado, ¡Tú puedes ser el primero!</p>';
		    exit();
		}
		if (isset($_POST['busqueda']))
		{
		    echo '<div class="boton-volver"><a href="usuarios.php">🔙Volver</a></div>';
		    
		    $busqueda = trim($_POST['busqueda']);
		    
		    if(empty($busqueda))
		    {
		        echo '<p>Introduce texto para buscar a un usuario</p>';
		        exit();
		    }
		    else
		    {
		        $usuarios = $ctrl->buscarUsuario($busqueda);
		        
		        if (count($usuarios) == 0)
		        {
		            echo '<p>No se han encontrado usuarios, intenta otro nombre</p>';
		            exit();
		        }
		    }
		}

        echo '<div class="entrenadores-all">';//<div class="busqueda-item">
        //echo '';
        echo '<ul>';
        foreach ($usuarios as $valor)
        {
            echo '<li>';
            echo '<h4>'.$valor['nombre'].'</h4>';
            echo '<img src='.$valor['foto'].' alt="Foto usuario"/>';
            
            if ($valor['tipoUsuario'] == 0)
                echo 'Tipo: cliente <br>';
            else
                echo 'Tipo: entrenador <br>';
            
            //if ($valor['ubicacion'] != "Sin especificar")
                echo 'Ubicación: '.$valor['ubicacion'].'<br>';
                
            //if ($valor['preferencias'] != "Sin especificar")
            //    echo 'Preferencias: '.$valor['preferencias'].'<br>';
            
            
            // ¿telefono?, ¿email?, ¿fechaNac?
            
            
            echo '</li>';
        }
        echo '</ul>';
        //echo '';
        echo '</div>';//</div>
		
        
		// PÁGINAS
		
        
		?>
		
	</div>
	
	<?php 
	   require('includes/comun/pie.php');
	?>
	
</div> <!-- Fin del contenedor -->

</body>
</html>
	