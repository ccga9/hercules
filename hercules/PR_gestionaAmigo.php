<?php  

require_once 'includes/config.php';

$aceptado = $_POST['enviar'];
$estado = $_POST['estado'];

if($estado == "a"){//ELIMINAR
	if ($aceptado == "si") {
	  $ctrl->eliminarAmigo($_POST['relacion']);
	  header("Location: miPerfilMisAmigos.php");
	}else{
	   header("Location: miPerfilMisAmigosPerfiles.php?id=".$_POST['id']."&estado=".$_POST['estado']."&relacion=".$_POST['relacion']."");
	}
}else{//Aceptar o rechazar
	if ($aceptado == "aceptar") {
	  $ctrl->aceptarSolicitudAmistad($_POST['relacion']);
	  header("Location: miPerfilMisAmigos.php");
	}else{
		$ctrl->rechazarSolicitudAmistad($_POST['relacion']);
	  header("Location: miPerfilMisAmigos.php");
	}

}
