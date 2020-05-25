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
        
		
		<?php
		
		$usuarios = $ctrl->verUsuarios();
		
		if (count($usuarios) == 0)
		{
		    echo '<p>Todavía no hay ningún usuario registrado... ¡Tú puedes ser el primero!</p>';
		    exit();
		}
		else
		{
            echo
            '<div class="buscar-ejercicio">
                <form method="POST" action="usuarios.php">
                    <input type="search" id="site-search" name="busqueda"/>
                    <button type="submit" name="buscar">Buscar</button>
                </form>
            </div>';

		    if ((isset($_SESSION['usuario'])) && ($_SESSION['usuario']->getTipoUsuario() == 0))
		    {
		        echo
		        '<div class="boton-volver">
                    <div class="enlace-amigos">
                        <a href="miPerfilMisAmigos.php">ver Mis Amigos</a>
                    </div>
                </div>';
		    }
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
		
		
        echo '<div class="entrenadores-all">';
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
            
            echo 'Sexo: '.$valor['sexo'].'<br>';
            echo 'Ubicación: '.$valor['ubicacion'].'<br>';
            
            echo '<p />';
            
            if ((isset($_SESSION['usuario']))
                && ($_SESSION['usuario']->getTipoUsuario() == 0) && ($valor['tipoUsuario'] == 0)
                && ($valor['nif'] != $_SESSION['usuario']->getNif()))
            {   
                $amigos = $ctrl->listarMisAmigos($_SESSION['usuario']->getNif());
                $ok = true;
                
                if ((count($amigos) == 0) || (!in_array($valor['nif'], $amigos)))
                {
                    foreach ($amigos as $value)
                    {
                        if ((($valor['nif'] == $value['usuario1'])
                            || ($valor['nif'] == $value['usuario2']))
                            && ($value['estado'] == 'aceptado'))
                        {
                            echo '<div class="texto-amigos">
                                    Ver más en Mis Amigos <br>
                                 </div>';
                            $ok = false;
                            break;
                        }
                        elseif (($valor['nif'] == $value['usuario1'])
                            && ($value['estado'] == 'pendiente'))
                        {
                            echo '<div class="texto-amigos">
                                    Solicitud recibida <br>
                                 </div>';
                            $ok = false;
                            break;
                        }
                        elseif (($valor['nif'] == $value['usuario2'])
                            && ($value['estado'] == 'pendiente'))
                        {
                            echo '<div class="texto-amigos">
                                    Solicitud enviada <br>
                                 </div>';
                            $ok = false;
                            break;
                        }
                    }
                }
                
                if ($ok)
                {   
                    echo '<form action="PR_usuarios.php" method="post">';
                    echo '<input type="hidden" name="id" value="'.$valor['nif'].'">';
                    echo '<button type="submit" name="confirmar">Enviar solicitud</button>';
                    echo '</form>';
                }
            }
            else
            {
                echo '<p />';
            }
            
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
        
		?>
		
	</div>
	
	<?php 
	   require('includes/comun/pie.php');
	?>
	
</div> <!-- Fin del contenedor -->

</body>
</html>
	