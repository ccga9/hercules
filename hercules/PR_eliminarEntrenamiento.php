<?php  

require_once 'includes/config.php';

$aceptado = $_POST['enviar'];
if ($aceptado == "si") {
  $ctrl->eliminarEntrenamiento($_POST['id']);
  header("Location: miPerfilEntrenamientosVer.php?idCliente=".$_POST['idCliente']);
}else {
   header("Location: miPerfilEntrenamientosVer.php?idCliente=".$_POST['idCliente']);
}