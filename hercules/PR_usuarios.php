<?php
require_once 'includes/config.php';


if (isset($_REQUEST['confirmar']))
{
    $ctrl->enviarSolicitudAmistad($_SESSION['usuario']->getNif(), $_REQUEST['id']);
    
    header('Location: usuarios.php');
    exit();
}
