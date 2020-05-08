<?php  

require_once 'includes/config.php';

if (isset($_POST['solicitud'])) {
    $ctrl->enviarSolicitud($_POST['cliente'], $_POST['entrenador']);
}


header('Location: entrenadores.php?perfil='.$_POST['entrenador']);

?>