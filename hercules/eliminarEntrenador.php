<?php  

require_once 'includes/config.php';

$ctrl->eliminarEntrenador($_SESSION['usuario']->getNif(), $_GET['idEntrenador']);

header('Location: miPerfilMisEntrenadores.php');

?>