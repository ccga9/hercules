<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<script src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
  	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<script src="includes/js/filtroEntrenadores.js"></script>
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
		<h1>Todos los entrenadores disponibles</h1>
		<img src="includes/img/entrenadores.png" alt="entrenadores">
		</div>

		<?php

		if (!isset($_GET['perfil'])) {

			/*echo '<div class="store-wrapper">
			<div class="category-list">
				<a href="#" class="categoryItem" category="all">Todos</a>
				<a href="#" class="categoryItem" category="ubic">Ubicación: Madrid</a>
				<a href="#" class="categoryItem" category="espec">Entrenador Profesional</a>
				<a href="#" class="categoryItem" category="vari">Varios</a> <!--Todos menos Madrid y Entrenadores Profesionales-->
			</div>
			</div>';*/
			
			$arr0 = $ctrl->listarEntrenadores((isset($_SESSION['login'])) ? $_SESSION['usuario']->getNif() : 0);
		    if (count($arr0) > 0) {
		    	echo '<div class="entrenadores-all">';
		    	echo '<div class="elem-item" category="vari">';
		    	echo '<ul>';
		        foreach ($arr0 as $key => $valor) {
		            echo '<li>';
		            echo '<h4>'.$valor['nombre'].'</h4>'.'<br>';
		           
		            echo '<img src="'.$valor['foto'].'" width="300" height="120" alt="Foto usuario">';
		            

		            echo $valor['titulacion'].'<br>';
		            echo $valor['especialidad'].'<br>';
					    echo $valor['experiencia'].'</p>';
		            echo "<a href= entrenadores.php?perfil=".$valor['nif'].">Ver Perfil</a>";

		            echo '</li>';
		        }
		        echo '</ul>';
		        echo '</div>';
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

		?>

	</div>

	<?php

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>
