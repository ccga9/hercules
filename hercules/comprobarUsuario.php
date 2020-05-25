<?php
	$ctrl = controller::getInstance();
	$col=`nif`;
	$cond=$_REQUEST["user"];
    $us = $ctrl->selectUsuario($col,$cond);
    if ($us) {
        echo "disponible";
    } else {
        echo "duplicado";
    }
?>
