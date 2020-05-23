<div id="cabecera">
		
		<a href="index.php"> <img src="includes/img/Hercules_logo.png" width="300" height="120" alt="Logo de Hercules: la web"></a>
    	<div class="saludo">
    		
    		<?php  
    
    		if (isset($_SESSION['login'])) {
    		    if ($_SESSION['usuario']->getTipoUsuario()==2) {
    		        echo  "<p>Bienvenido Administrador " . $_SESSION['usuario']->getNombre() . "</p><a href= PR_logout.php>" . "Cerrar sesión" . "</a>";
    		    }
    		    else {
    		        echo  "<p>Has entrado como " . $_SESSION['usuario']->getNombre() . "</p><a href= PR_logout.php>" . "Cerrar sesión" . "</a>";
    		    }
    		}
    		else {
    			echo '<a href= login.php>Iniciar sesión</a>';
    			echo '<br>';
    			echo '<a href= registro.php>Regístrate</a>';
    			echo '<br>';
    		}
    
    		?>
    		
    	</div>
 
 
    	<div class="menu">
    
    		<?php 
    		if (isset($_SESSION['login']) && $_SESSION['usuario']->getTipoUsuario()==2) {
    		    echo
    		    '<ul>
        		  <li><a href= adminUsuario.php>Usuarios</a></li>
        		  <li><a href= adminAlimento.php>Alimentos</a></li>
        		  <li><a href= adminEjercicio.php>Ejercicios</a></li>
        		  <li><a href= adminLista.php>Administradores</a></li>
                  <li><a href= adminEditar.php>Editar Perfil</a></li>
                </ul>';
    		}
    		else {
    		    echo
    		    '<ul>
        		  <li><a href= index.php>Inicio</a></li>
        		  <li><a href= entrenadores.php>Nuestros entrenadores</a></li>
        		  <li><a href= foro.php>Foro</a></li>
        		  <li class="submenu"><a href= miPerfil.php>Mi Perfil</a>';
        		    
        		    if (isset($_SESSION['login'])) {
        		        if ($_SESSION['usuario']->getTipoUsuario()==1) {
        		            echo '<ul><li><a href= miPerfilMisClientes.php>Mis Clientes</a></li>';
        		            echo '<li><a href= miPerfilEditar.php>Editar Perfil</a></';
        		            echo '<li><a href= miPerfilBuzon.php>Mensajes</a></li></ul>';
        		        }
        		        else {
        		            echo '<ul><li><a href= miPerfilComidas.php>Comidas</a></li>';
        		            echo '<li><a href= miPerfilEntrenamientos.php>Entrenamientos</a></li>';
        		            echo '<li><a href= miPerfilMisEntrenadores.php>Mis Entrenadores</a></li>';
        		            echo '<li><a href= miPerfilMisAmigos.php>Mis Amigos</a></li>';
        		            echo '<li><a href= miPerfilEditar.php>Editar Perfil</a></li>';
        		            echo '<li><a href= miPerfilBuzon.php>Mensajes</a></li></ul>';
        		        }
        		    }
        		    echo
        		    '</li>
                  <li><a href= usuarios.php>Usuarios</a></li>
                  <li><a href= ejercicios.php>Ejercicios</a></li>
        		  <li><a href= quienes_somos.php>Quiénes Somos</a></li>
        		  <li><a href= faqs.php>FAQs</a></li>
        		  <li><a href= contacto.php>Contacto</a></li>
        		</ul>';
    		}

    		?>
    	</div>

</div>