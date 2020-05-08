<?php
require_once 'includes/config.php';

if (isset($_POST['enviar'])) {
    $str = filter_var($_POST['texto'], FILTER_SANITIZE_STRING);
    
    $col = 'hacia,de,texto,valor,visible';
    $values = "'".$_POST['hacia']."','".$_POST['de']."','".$_POST['texto']."','".$_POST['rate']."','".$_POST['vis']."'";
    
    $ctrl->insertValor($col, $values);
}
else if (isset($_POST['actualizar'])) {
    $str = filter_var($_POST['texto'], FILTER_SANITIZE_STRING);
    
    $set= "texto='".$_POST['texto']."', valor='".$_POST['rate']."', visible='".$_POST['vis']."'";
    $cond="hacia='".$_POST['hacia']."' AND de='".$_POST['de']."'";
    
    $ctrl->updateValor($set, $cond);
}

header("Location: miPerfilMisEntrenadoresPerfiles.php?id=".$_POST['hacia']);

?>