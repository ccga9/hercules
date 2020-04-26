<?php 
	require_once 'includes/config.php';
	require_once(__DIR__.'/includes/Forms/FormularioChat.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estilo.css" />
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
	
		<?php 
		
		echo '<div id="chat">';
		$arr = $ctrl->selectMensajes('', "emisor='".$_SESSION["usuario"]->getNif()."' OR receptor='".$_SESSION["usuario"]->getNif()."' 
            GROUP BY emisor, receptor");
		
		$no_visto = array();
		$user_arr = array();
		foreach($arr as $value) {
		    if ($_SESSION['usuario']->getNif() == $value['receptor'] && $value['visto'] == 0) {
		        if (!isset($no_visto[$value['emisor']])) {
		            $no_visto[$value['emisor']] = 1;
		        }
		        else {
		            $no_visto[$value['emisor']] += 1;
		        }
		    }
		}
		
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
		
		if (isset($_GET['reciever'])) {
		    
		    echo '<div id="chat">';
		    $men_arr = $ctrl->selectMensajes('', "emisor='".$_SESSION["usuario"]->getNif()."' AND receptor='".$_GET['reciever']."' OR 
                emisor='".$_GET['reciever']."' AND receptor='".$_SESSION["usuario"]->getNif()."' ORDER BY fecha");
		    
		    $el_otro = '';
		    
		    if (count($men_arr) > 0) {
		        if ($men_arr[0]['emisor'] == $_SESSION["usuario"]->getNif()) {
		            $el_otro = $ctrl->cargarUsuario($value['receptor'])->getNombre();
		        }
		        else {
		            $el_otro = $ctrl->cargarUsuario($value['emisor'])->getNombre();
		        }
		            
	            foreach ($men_arr as $value) {
	                if ($value['emisor'] == $_SESSION["usuario"]->getNif()) {
	                    $men = "Yo: ";
	                }
	                else {
	                    $men = $el_otro . ": ";
	                }
	                
	                echo '<p><strong>'.$men.'</strong>---'.$value['fecha'].'---</p>';
	                echo '<p>'.$value['texto'].'</p>';
	            }
		    }
		    
		    $act = new FormularioChat();
		    $act->gestiona();
		    
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