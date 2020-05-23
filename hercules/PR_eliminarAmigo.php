<?php  

require_once 'includes/config.php';

$aceptado = $_POST['enviar'];
if ($aceptado == "si") {
  $ctrl->eliminarAmigo($_POST['relacion']);
  header("Location: miPerfilMisAmigos.php");
}else{
   header("Location: miPerfilMisAmigosPerfiles.php?id=".$_POST['id']."&estado=".$_POST['estado']."&relacion=".$_POST['relacion']."");
}
