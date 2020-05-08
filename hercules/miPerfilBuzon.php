<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloPagsMiPerfil.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');
		require('miPerfilCabecera.php');
		
	?>

	<div id="contenido">
		<h2>Mensajes</h2>
		<?php 
		
		if (!isset($_GET['reciever'])) {
			echo '<div class="chat-all">';
		    echo '<form method="POST" action="procesaChat.php">';
		    
		    echo '<input type="hidden" name="emisor_n" value="'.$_SESSION["usuario"]->getNombre().'">';
		    echo '<input type="hidden" name="emisor" value="'.$_SESSION["usuario"]->getNif().'">';
		    echo '<p><span class="texto-chat">NIF/NIE: <input type="text" name="receptor" required></span>';
		    echo '<span class="texto-chat">Saludo: </span><input type="text" name="men" value="¡Hola! Soy '.$_SESSION["usuario"]->getNombre().'."></p>';
		    
		    echo '<button type="submit" name="add">Añadir al chat</button>';
		    
		    echo '</form>';
		   
		    
		    $arr = $ctrl->selectMensajes('', "emisor='".$_SESSION["usuario"]->getNif()."' AND del_1=0 OR receptor='".$_SESSION["usuario"]->getNif()."'
            AND del_2=0 GROUP BY emisor, receptor");
		    
		    $pre_arr= $ctrl->selectMensajes('', "emisor='".$_SESSION["usuario"]->getNif()."' OR receptor='".$_SESSION["usuario"]->getNif()."'");
		    
		    $no_visto = array();
		    $user_arr = array();
		    foreach($pre_arr as $value) {
		        if ($_SESSION['usuario']->getNif() == $value['receptor'] && $value['visto'] == 0) {
		            if (!isset($no_visto[$value['emisor']])) {
		                $no_visto[$value['emisor']] = 1;
		            }
		            else {
		                $no_visto[$value['emisor']]++;
		            }
		        }
		    }
		    echo '<h4>CONVERSACIONES INICIADAS</h4>';
		    echo '<ul>';
		    foreach($arr as $value) {
		        if ($_SESSION['usuario']->getNif() == $value['emisor']) {
		            if (!in_array($value['receptor'], $user_arr)) {
		                $aux = $ctrl->cargarUsuario($value['receptor']);
		                $str = '<a href="miPerfilBuzon.php?reciever='.$value['receptor'].'">'.$aux->getNombre().'</a> ';
		                
		                if (isset($no_visto[$value['receptor']])) {
		                    $str .= " ".$no_visto[$value['receptor']];
		                }
		                
		                echo '<li>'.$str.'</li>';
		                $user_arr[] = $value['receptor'];
		            }
		        }
		        else if ($_SESSION['usuario']->getNif() == $value['receptor']) {
		            if (!in_array($value['emisor'], $user_arr)) {
		                $aux = $ctrl->cargarUsuario($value['emisor']);
		                $str = '<a href="miPerfilBuzon.php?reciever='.$value['emisor'].'">'.$aux->getNombre().'</a> ';
		                
		                if (isset($no_visto[$value['emisor']])) {
		                    $str .= " ".$no_visto[$value['emisor']];
		                }
		                
		                echo '<li>'.$str.'</li>';
		                $user_arr[] = $value['emisor'];
		            }
		        }
		    }
		    echo '</ul>';
		    echo '</div>';
		}
		
		if (isset($_GET['reciever'])) {
		    
		    echo '<a href="miPerfilBuzon.php">ATRAS</a>';
		    
		    $ctrl->updateMensajes('visto=1', "receptor='".$_SESSION["usuario"]->getNif()."' AND emisor='".$_GET['reciever']."'");
		    
		    $men_arr = $ctrl->selectMensajes('', "emisor='".$_SESSION["usuario"]->getNif()."' AND receptor='".$_GET['reciever']."' OR 
                emisor='".$_GET['reciever']."' AND receptor='".$_SESSION["usuario"]->getNif()."' ORDER BY fecha");
		    
		    $el_otro = '';
		    
		    echo '<div class="chat-all">';
		   
		    if (count($men_arr) > 0) {
		      
		        if ($men_arr[0]['emisor'] == $_SESSION["usuario"]->getNif()) {
		            $el_otro = $ctrl->cargarUsuario($men_arr[0]['receptor'])->getNombre();
		        }
		        else {
		            $el_otro = $ctrl->cargarUsuario($men_arr[0]['emisor'])->getNombre();
		        }
		        echo '<div id="chat">';
		        echo '<h4>Estas hablando con '.$el_otro.'</h4>';
		            
	            foreach ($men_arr as $value) {
	                if ($value['emisor'] == $_SESSION["usuario"]->getNif()) {
	                    $men = '<p><span class="yo">'."Yo: ";
	                    echo $men.'---'.$value['fecha'].'---</span></p>';
	                    
	                }
	                else {
	                    $men = '<p><span class="el-otro">'.$el_otro . ": ";
	                    echo $men.'---'.$value['fecha'].'---</span></p>';
	                }
	                
	               /* echo '<p><span class="yo">'.$men.'---'.$value['fecha'].'---</span></p>';*/
	                echo '<p><span class="los-dos">'.$value['texto'].'</span></p>';
	            }
		 
    		    echo '<form method="POST" action="PR_miPerfilBuzon_chat.php">';
        		        echo '<input type="hidden" name="emisor" value="'.$_SESSION["usuario"]->getNif().'">';
        		        echo '<input type="hidden" name="receptor" value="'.$_GET['reciever'].'">';
            		    echo '<textarea name="men" rows="5" cols="40" placeholder="Escribe algo para mandar"></textarea>';
            		    
            		    echo '<div class="grupo-control"><button type="submit" name="send">Enviar</button></div>';
    		    echo '</form>';

    		    
    		    echo '<br>';
    		    
    		    echo '<form method="POST" action="PR_miPerfilBuzon_chat.php">';
    		    
    		    echo '<input type="hidden" name="emisor" value="'.$_SESSION["usuario"]->getNif().'">';
    		    echo '<input type="hidden" name="receptor" value="'.$_GET['reciever'].'">';
    		    
    		    echo '<button type="submit" name="borrar">Borrar toda la conversacion</button>';
    		    
    		    echo '</form>';
    		    echo '</div>';
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