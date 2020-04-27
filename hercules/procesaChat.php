<?php 
	require_once 'includes/config.php';
	
	if (isset($_POST['send'])) {
	    $str = filter_var($_POST['men'], FILTER_SANITIZE_STRING);
	    
	    if (trim($str) != '') {
	        $values = '';
	        $values .= "'".$_POST['emisor']."','".$_POST['receptor']."','".$_POST['men']."'";
	        
	        $ctrl->insertMensajes('emisor, receptor, texto', $values);
	    }
	    header("Location: miPerfilBuzon.php?reciever=".$_POST['receptor']);
	}
	else if (isset($_POST['borrar'])) {
	    $ctrl->updateMensajes("del_1=1", "emisor='".$_POST['emisor']."' AND receptor='".$_POST['receptor']."'");
	    $ctrl->updateMensajes("del_2=1", "receptor='".$_POST['emisor']."' AND emisor='".$_POST['receptor']."'");
	    $ctrl->deleteMensajes("del_1=1 AND del_2=1");
	    header("Location: miPerfilBuzon.php");
	}
	else if (isset($_POST['add'])) {
	    $str = filter_var($_POST['men'], FILTER_SANITIZE_STRING);
	    
	    if (trim($str) != '') {
	        $values .= "'".$_POST['emisor']."','".$_POST['receptor']."','".$_POST['men']."'";
	    }
	    else {
	        $values .= "'".$_POST['emisor']."','".$_POST['receptor']."','¡Hola! Soy ".$_POST['emisor_n']."'";
	    }
	    $ctrl->insertMensajes('emisor, receptor, texto', $values);
	    header("Location: miPerfilBuzon.php?reciever=".$_POST['receptor']);
	}
?>
