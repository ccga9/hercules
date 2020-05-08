<?php  

require_once 'includes/config.php';

$aceptado = isset($_POST['aceptar']);

$ctrl->responderSolicitud($_SESSION['usuario']->getNif(), $_POST['cliente'], $aceptado);

if ($aceptado) {
    header('Location: miPerfilMisClientesPerfiles.php?id='.$_POST['cliente']);
}
else {
    header('Location: miPerfilMisClientes.php');
}
