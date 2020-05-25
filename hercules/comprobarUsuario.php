<?php
	$ctrl = controller::getInstance();
	$col='nif';
	$user=$_REQUEST["user"];
	$cond="nif = '".$user."'";
    $us = $ctrl->selectUsuario($col,$cond);
    if ($us) {
        echo "duplicado";
    } else {
        echo "disponible";
    }
?>
