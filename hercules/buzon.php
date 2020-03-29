<?php  

require_once 'includes/config.php';

$aceptado = isset($_POST['aceptar']);

$ctrl->responderSolicitud($_SESSION['usuario']->getNif(), ($aceptado)? $_POST['aceptar'] : $_POST['rechazar'], $aceptado);

header('Location: miPerfil.php');

?>