<div id="cabecera">
	   
	<section class="cabecera-flex">
		
		<img src="includes/img/Hercules_logo.png" width="300" height="120" alt="Logo de Hercules: la web">
    	<div class="saludo">
    		
    		<?php  
    
    		if (isset($_SESSION['login'])) {
    			echo  "Has entrado como " . $_SESSION['usuario']->getNombre() . ". ". '<a href= logout.php>' . "Logout" . '</a>';
    		}
    		else {
    			echo '<a href= login.php>Log in</a>';
    			echo '<br>';
    			echo '<a href= registro.php>Regístrate</a>';
    			echo '<br>';
    		}
    
    		?>
    		
    	</div>
 
    	<div class="menu">
    
    		<ul>
    		  <li><a href= index.php>Inicio</a></li>
    		  <li><a href= entrenadores.php>Nuestros entrenadores</a></li>
    		  <li><a href= miPerfil.php>Mi Perfil</a></li>
    		  <li><a href= quienes_somos.php>Quienes Somos</a></li>
    		  <li><a href= faqs.php>FAQs</a></li>
    		  <li><a href= contacto.php>Contacto</a></li>
    		</ul>
    
    	</div>
	</section>

</div>