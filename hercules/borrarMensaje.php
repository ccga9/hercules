<?php
require_once(__DIR__.'/includes/controller.php');

$id_mesg = $_GET['id_msg'];
$ctrl = controller::getInstance();
$ctrl->borrarMensaje($id_mesg);
header('Location: foro.php?id_msg='.$id_mesg);
?>