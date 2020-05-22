<?php
require_once 'includes/config.php';

require_once(__DIR__.'/includes/Forms/FormEditarAdmin.php');

$act = new FormEditarAdmin();
$html=$act->gestiona();
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
    		   
		    echo '<div class= "miPerfil">';
		    
		    echo '<h2>Administrador '.$_SESSION['usuario']->getNombre().'</h2>';
		    
		    echo '<img src="'.$_SESSION['usuario']->getFoto().'"  alt="Foto usuario">';
		    
		    echo $html;
		    
		    /*echo '<form method="POST" action="PR_admin.php">';
		    
		    echo '<div class="grupo-control">
		              <label>Sube foto</label><input name="uploadImage" type="file"/>
		          </div>';
		    echo '<div class="grupo-control">
		              <label>¿Quieres cambiar tu contraseña? </label/>
		          </div>';
		    echo '<div class="grupo-control">
		              <label>Tu Password:</label> <input class="control" type="password" name="passwordA"/>
		          </div>';
		    echo '<div class="grupo-control">
		              <label>Nueva Password:</label> <input class="control" type="password" name="password"/>
		          </div>';
		    echo '<div class="grupo-control">
		              <label>Vuelve a introducir la nueva password Password:</label> <input class="control" type="password" name="password2" />
		          </div>';
		    echo '<button type="submit" name="admin_submit" value="edit_user">Confirmar</button>';
		    
		    echo '</form>';*/
		    
		    echo '</div>';
		    
		}
		else { //Usuario registrado
		    echo "<h1>Usuario no registrado!</h1>";
		    echo "<p>Debes iniciar sesión para ver el contenido.</p>";
		}
		?>
			

	</div>

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>