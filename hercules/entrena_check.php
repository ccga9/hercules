<?php  

require_once 'includes/config.php';

foreach($_POST['check_list'] as $value) {
	$ctrl->enviarSolicitud($_SESSION['usuario']->getNif(), $value);
}

header('Location: entrenadores.php');

?>